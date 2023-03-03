@extends('layouts.default')
<style>
  .title {
    display:none;
  }
  .box {
    display: flex;
    justify-content: center;
    margin: 10px 10px 10px 10px;
  }
  .workbutton {
    justify-content: center;
    margin: 10px 10px 10px 10px;
  }
  .breakingbutton {
    justify-content: center;
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

@section('title', 'ホーム')

  @if (Auth::check())
    <h1>{{$user->name}}さんおつかれさまです！</h1>
  @else
    <p>ログインしてください。（<a href="/login">ログイン</a>
    <a href="/register">登録</a>）</p>
  @endif

  <div class="box">
    <div class="workbutton">
      <form action=" /start" method="post">
      @csrf
        <button >
          勤務開始
        </button>
      </form>

      <form action=" /finish" method="post">
      @csrf
        <button >
          勤務終了
        </button>
      </form>
    </div>

    <div class="breakingbutton">
      <form action=" /breakin" method="post">
      @csrf
        <button >
          休憩開始
        </button>
      </form>

      <form action=" /breakout" method="post">
      @csrf
        <button >
          休憩終了
        </button>
      </form>
      </div>
  </div>

@endsection
