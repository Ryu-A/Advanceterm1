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
  .startbutton {
    justify-content: center;
    margin: 10px 10px 10px 10px;
  }
  .endbutton {
    justify-content: center;
    margin: 10px 10px 10px 10px;
  }
  .button {
    font-size: 18px;
    font-weight:bold;
    background-color: white;
    border-radius: 5px;
    border:none;
    margin: 5px;
    padding: 45px 90px;
    text-decoration: none;
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
    <p class="messege">ログインしてください。</p>
    <a href="/login" class="login">ログイン</a>
    <a href="/register" class="register">登録</a>
  @endif

  @auth
  <div class="box">
    <div class="startbutton">
      <form action=" /start" method="post">
      @csrf
        <button class="button">
          勤務開始
        </button>
      </form>

      <form action=" /breakin" method="post">
      @csrf
        <button class="button">
          休憩開始
        </button>
      </form>
    </div>

    <div class="endbutton">
      <form action=" /finish" method="post">
      @csrf
        <button class="button">
          勤務終了
        </button>
      </form>

      <form action=" /breakout" method="post">
      @csrf
        <button class="button">
          休憩終了
        </button>
      </form>
      </div>
  </div>
  @endauth

@endsection
