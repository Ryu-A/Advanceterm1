<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>ログインページ</h1>
  <p></p>

  <form method="POST" action="/login">
    @csrf
    
    <label for="email">メールアドレス</label>
    <input id="email" type="text" name="email">

    <label for="password">パスワード</label>
    <input id="password" type="password" name="password">

    <button>
      ログイン
    </button>

  </form>

  <p>アカウントをお持ちでない方はこちらから</p>
  <a href="/register">会員登録</a>
  
</body>
</html>