<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>打刻ページ</h1>
@if (Auth::check())
  <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p>
@else
  <p>ログインしてください。（<a href="/login">ログイン</a>
  <a href="/register">登録</a>）</p>
@endif
</body>
</html>