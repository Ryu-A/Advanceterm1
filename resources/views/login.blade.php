@extends('layouts.default')
<style>
  ::placeholder {
    color:#AAAAAA;
  }
  .address {
    font-size: 12px;
    background-color: #EEEEEE;
    color:;
    text-align:left;
    border-width:2px;
    border-radius: 5px;
    border-color:#AAAAAA;
    width: 230px;
    margin: 5px;
    padding: 7px 7px 7px 7px;
  }
  .pass {
    font-size: 12px;
    background-color: #EEEEEE;
    color:;
    border-width:2px;
    border-radius: 5px;
    border-color:#AAAAAA;
    width: 230px;
    margin: 15px;
    padding: 7px 7px 7px 7px;
  }
  .button {
    font-size: 12px;
    font-weight:;
    background-color: blue;
    color:white;
    border-radius: 5px;
    border:none;
    margin: 5px;
    padding: 8px 90px 6px 90px;
    text-decoration: none;
  }
  .register {
    text-transform: none;
    color: blue;
    text-decoration: none;
    font-size:12px;
    font-weight:bold;
    margin: 0px;
    padding: 0px;
  }
  .noaccount {
    font-size:10;
    font-weight:bold;
    color:#999999;
    margin: 0px;
    padding: 1px;
  }
</style>


@section('content')

@section('title', 'ログイン')

  <form method="POST" action="/login">
    @csrf
    
    <input class="address" id="email" type="text" name="email" placeholder="メールアドレス">
    <br>
    <input class="pass" id="password" type="password" name="password" placeholder="パスワード">
    <br>
    <button class="button">
      ログイン
    </button>

  </form>

  <p class="noaccount">アカウントをお持ちでない方はこちらから</p>
  <a href="/register" class="register">会員登録</a>
  
@endsection