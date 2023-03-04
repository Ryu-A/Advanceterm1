@extends('layouts.default')
<style>
  table {
    border-collapse:  collapse;
    width:  90%;
    table-layout: fixed;
    text-align:  center;
    border-style: solid;
    border-width: 1px 0px;
    margin: 15px 10px 10px 30px;
  }
  th {
    padding: 10px;
  }
  td {
    border-style: solid;
    border-width: 1px 0px;
    padding: 15px;
  }
  .title {
    display:none;
  }
  .day {
    display: flex;
    text-align: center;
    justify-content: center;
  }
  .today {
    text-align: center;
    justify-content: center;
    margin: 10px 10px 10px 10px;
    font-weight:bold;
  }
  .yesterday {
    margin: 13px 15px 10px 10px;
  }
  .tomorrow {
    margin: 13px 10px 10px 15px;
  }
  .button {
    background-color: white;
    color:blue;
    border-radius: 3px;
    border: solid 1px;
    border-color: blue;
  }
  .messege {
    font-size:16;
    font-weight:bold;
    color:#999999;
    margin: 0px;
    padding: 20px;
  }
  .login {
    text-transform: none;
    color: blue;
    text-decoration: none;
    font-size:16px;
    font-weight:bold;
    margin: 10px;
    padding: 0px;
  }
  .register {
    text-transform: none;
    color: blue;
    text-decoration: none;
    font-size:16px;
    font-weight:bold;
    margin: 30px;
    padding: 0px;
  }
  .Pagination {
    display: flex;
    align-items: center;
    border: none;
  }
  .Page-item {
    text-decoration: none;
    list-style: none;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width: 25px;
    height: 25px;
    font-size: 14px;
    margin: 1px;
    color: #111;
    font-weight: bold;
    transition: all 0.15s linear;
  }
  .Page-item.disabled {
    pointer-events: none;
    background: white;
    color: #111;
    }
  .Page-item.active {
    pointer-events: none;
    background: blue;
    color: #fff;
    }
  .Page-Link:not(.isActive):hover {
    background: blue;
    color: #fff;
  }
</style>
@section('header')
  <nav>
    <ul class="navigation">
      <li><a href="/">ホーム</a></li>
      <li><a href="/attendance">日付一覧</a></li>
      <li><a href="/logout">ログアウト</a></li>
    </ul>
  </nav>
@endsection

@section('content')

@section('title', '日付別勤怠ページ')

  @if (Auth::check())
    <!-- <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p> -->
  @else
    <p class="messege">ログインしてください。</p>
    <a href="/login" class="login">ログイン</a>
    <a href="/register" class="register">登録</a>
  @endif

  @auth
  <div class="day">
    <form action="/attendance/yesterday" class="yesterday" method="post">
      @csrf
      <input type="hidden" name="today" value="{{ $today }}">
      <input type="submit" class="button" name="" value="<">
    </form>
    <h1 class="today">{{ $today }}</h1>

      <form action="/attendance/tomorrow" class="tomorrow" method="post">
      @csrf
      <input type="hidden" name="today" value="{{ $today }}">
      <input type="submit" class="button" name="" value=">">
    </form>
  </div>

  <table>
    <tr>
      <th>名前</th>
      <th>勤務開始</th>
      <th>勤務終了</th>
      <th>休憩時間</th>
      <th>勤務時間</th>
    </tr>
    @foreach($attendances as $attendance)
    <tr>
      <td>
        {{ $attendance->getTitle() }}
      </td>
      <td>
        {{ $attendance->start_time }}
      </td>
      <td>
        {{ $attendance->end_time }}
      </td>
      <td>
        @if($total_break_time != null)
          <?php 
            $tbt = $total_break_time->where('attendance_id',$attendance->id); 
          ?>
          @foreach($tbt as $total_bt)
            {{$total_bt->total_break_time}}
          @endforeach
        @endif
      </td>
      <td>
        <?php 
          $start_time = \Carbon\Carbon::create($today.$attendance->start_time);
          $end_time = \Carbon\Carbon::create($today.$attendance->end_time);
          $tbt = $total_break_time->where('attendance_id',$attendance->id); 
          foreach($tbt as $total_bt){
            $breaking = \Carbon\Carbon::create($total_bt->total_break_time);
            

          }
          ?>
      </td>
    </tr>
    @endforeach
  </table>
{{ $attendances->onEachSide(15)->appends(request()->input())->links('vendor.pagination.custom') }}
  @endauth

@endsection