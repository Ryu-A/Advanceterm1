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
    <a href="/">ホーム</a>
    <a href="/attendance">日付一覧</a>
    <a href="/logout">ログアウト</a>
  @else
    <p>ログインしてください。（<a href="/login">ログイン</a>
    <a href="/register">登録</a>）</p>
  @endif

  <form action=" /start" method="post">
  @csrf
    <!-- <imput type="hidden" value=""> -->
    <button>
      勤務開始
    </button>
  </form>

  <form action=" /finish" method="post">
  @csrf
    <button>
      勤務終了
    </button>
  </form>

  <form action=" /breakin" method="post">
  @csrf
    <button>
      休憩開始
    </button>
  </form>

  <form action=" /breakout" method="post">
  @csrf
    <button>
      休憩終了
    </button>
  </form>

</body>
</html>