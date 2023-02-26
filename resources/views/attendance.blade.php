<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  svg.w-5.h-5 {
    width: 30px;
    height: 15px;
}
</style>
<body>
  <h1>日付別勤怠ページ</h1>
  @if (Auth::check())
    <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p>
    <a href="/">ホーム</a>
    <a href="/attendance">日付一覧</a>
    <a href="/logout">ログアウト</a>
  @else
    <p>ログインしてください。（<a href="/login">ログイン</a>
    <a href="/register">登録</a>）</p>
  @endif

  <p>{{ $today }}</p>
  <table>
    <tr>
      <th>名前</th>
      <th>勤務開始</th>
      <th>勤務終了</th>
      <th>休憩時間</th>
      <th>勤務時間</th>
    </tr>
    @foreach($attendances as $attendance)
    <tr>
      <td>
        {{ $attendance->getTitle() }}
      </td>
      <td>
        {{ $attendance->start_time }}
      </td>
      <td>
        {{ $attendance->end_time }}
      </td>
      <td>
        {{ $attendance->start_time }}
      </td>
      <td>
        {{ $attendance->start_time }}
      </td>
    </tr>
    @endforeach
  </table>
{{ $attendances->onEachSide(15)->links() }}
</body>
</html>