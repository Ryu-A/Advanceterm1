@extends('layouts.default')
<style>

</style>

@section('content')

@section('title', '打刻ページ１')

  <form method="POST" action="/register">
    @csrf
    
    <input id="name" type="text" name="name" placeholder="名前">
    <br>

    <input id="email" type="text" name="email" placeholder="メールアドレス">
    <br>

    <input id="password" type="password" name="password" placeholder="パスワード">
    <br>

    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="確認用パスワード">
    <br>

    <button>
      会員登録
    </button>

  </form>

  <p>アカウントをお持ちの方はこちらから</p>
  <a href="/login">ログイン</a>
@endsection