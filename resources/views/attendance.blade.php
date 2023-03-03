@extends('layouts.default')
<style>
  svg.w-5.h-5 {
    width: 30px;
    height: 15px;
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
    margin: 10px 10px 10px 10px;
  }
  .tomorrow {
    margin: 10px 10px 10px 10px;
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
    <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p>
  @else
    <p>ログインしてください。（<a href="/login">ログイン</a>
    <a href="/register">登録</a>）</p>
  @endif

  <div class="day">
    <form action="/attendance/yesterday" class="yesterday" method="post">
      @csrf
      <input type="hidden" name="today" value="{{ $today }}">
      <input type="submit" name="" value="<">
    </form>
    <h1 class="today">{{ $today }}</h1>

      <form action="/attendance/tomorrow" class="tomorrow" method="post">
      @csrf
      <input type="hidden" name="today" value="{{ $today }}">
      <input type="submit" name="" value=">">
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
        {{ $total_break_time->where('attendance_id',$attendance->id)}}
      </td>
      <!-- <td>
        @foreach($total_break_time as $total_bt)
        @if ($total_bt->total_break_time != null)
        {{ $total_bt->total_break_time }}
        @endif
        @endforeach
      </td> -->
      <!-- <td>
          @foreach($attendance->breakings as $breaking)
          @if ($breaking != null)
            {{ $breaking->getTotalBreakTime() }}
          @else
          @endif
          @endforeach
      </td> -->
      <!-- @foreach($attendance->breakings as $breaking)
        <td>
          @if ($breaking != null)
            {{ $breaking->break_time }}

          @endif
        </td>
      @endforeach
      @foreach($breakings as $breaking)
        <td>
          @if ($breaking != null)
            {{ $breaking->getId() }}
            {{ $breaking->getTotalBreakTime() }}
          @endif
        </td>
      @endforeach -->
      <td>
        {{ $attendance->work_time }}
      </td>
    </tr>
    @endforeach
  </table>
{{ $attendances->onEachSide(15)->links() }}

@endsection