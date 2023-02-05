<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>会員登録</h1>
  <form method="POST" action="/register">
    @csrf
    
    <label for="name">お名前</label>
    <input id="name" type="text" name="name">

    <label for="email">メールアドレス</label>
    <input id="email" type="text" name="email">

    <label for="password">パスワード</label>
    <input id="password" type="password" name="password">

    <label for="password_confirmation">確認用パスワード</label>
    <input id="password_confirmation" type="password" name="password_confirmation">

    <button>
      会員登録
    </button>

  </form>

  <p>アカウントをお持ちの方はこちらから</p>
  <a href="/login">ログイン</a>
</body>
</html>