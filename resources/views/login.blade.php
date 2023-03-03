@extends('layouts.default')
<style>

</style>


@section('content')

@section('title', 'ログイン')

  <p></p>

  <form method="POST" action="/login">
    @csrf
    
    <input id="email" type="text" name="email" placeholder="メールアドレス">
    <br>
    <input id="password" type="password" name="password" placeholder="パスワード">
    <br>
    <button>
      ログイン
    </button>

  </form>

  <p>アカウントをお持ちでない方はこちらから</p>
  <a href="/register">会員登録</a>
  
@endsection