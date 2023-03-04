@extends('layouts.default')
<style>
  ::placeholder {
    color:#AAAAAA;
  }
  .name {
    font-size: 12px;
    background-color: #EEEEEE;
    color:;
    text-align:left;
    border-width:2px;
    border-radius: 5px;
    border-color:#AAAAAA;
    width: 230px;
    margin: 5px 0px 10px 0px;
    padding: 7px 7px 7px 7px;
  }
  .address {
    font-size: 12px;
    background-color: #EEEEEE;
    color:;
    border-width:2px;
    border-radius: 5px;
    border-color:#AAAAAA;
    width: 230px;
    margin: 10px;
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
    margin: 10px;
    padding: 7px 7px 7px 7px;
  }
  .confirm {
    font-size: 12px;
    background-color: #EEEEEE;
    color:;
    border-width:2px;
    border-radius: 5px;
    border-color:#AAAAAA;
    width: 230px;
    margin: 10px;
    padding: 7px 7px 7px 7px;
  }
  .button {
    font-size: 12px;
    font-weight:;
    background-color: blue;
    color:white;
    border-radius: 5px;
    border:none;
    margin: 10px;
    padding: 8px 90px 6px 90px;
    text-decoration: none;
  }
  .login {
    text-transform: none;
    color: blue;
    text-decoration: none;
    font-size:12px;
    font-weight:bold;
    margin: 0px;
    padding: 0px;
  }
  .account {
    font-size:10;
    font-weight:bold;
    color:#999999;
    margin: 0px;
    padding: 1px;
  }

</style>

@section('content')

@section('title', '会員登録')

  <form method="POST" action="/register">
    @csrf
    
    <input id="name" class="name" type="text" name="name" placeholder="名前">
    <br>

    <input id="email" class="address" type="text" name="email" placeholder="メールアドレス">
    <br>

    <input id="password" class="pass" type="password" name="password" placeholder="パスワード">
    <br>

    <input id="password_confirmation" class="confirm" type="password" name="password_confirmation" placeholder="確認用パスワード">
    <br>

    <button class="button">
      会員登録
    </button>

  </form>

  <p class="account">アカウントをお持ちの方はこちらから</p>
  <a href="/login" class="login">ログイン</a>
@endsection