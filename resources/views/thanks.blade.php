@extends('layouts.default')
<style>
  .title {
    display:none;
  }
  .tologin {
    text-transform: none;
    color: blue;
    text-decoration: none;
    font-size:16px;
    font-weight:bold;
    margin: 10px;
    padding: 10px;
  }

</style>
@section('title', 'サンクスページ')

@section('content')
  <h1>ご登録ありがとうございます。</h1>
  <a href="/login" class="tologin">ログインページへ</a>
@endsection