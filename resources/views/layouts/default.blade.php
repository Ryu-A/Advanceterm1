<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <style>
    body {
      font-size:16px;
      margin: 0;
    }
    input {
      box-shadow: none;
      border: solid;
      border-width: 1px;
      border-radius: 5px;
    }
    h1 {
      font-size:18px;
      text-align:center;
      padding: 0px 0px 5px 0px;
    }
    .title {
      font-size:18px;
      text-align:center;
      padding: 0px 0px 10px 0px;
    }
    .header {
      display: flex;
      width:100%px;
      border-radius: 0px;
      padding: 0px 10px 0px 10px;
      margin: 0px 10px 0px 10px;
      background-color: white;
      justify-content: space-between;
    }
    .content {
      width:100%px;
      min-height: 400px;
      border-radius: 0px;
      padding: 40px 0px 50px 0px;
      margin: 0px;
      background-color: #EEEEEE;
      text-align:center;
    }
    .footer {
      width:100%px;
      border-radius: 0px;
      padding: 5px;
      margin: 10px;
      background-color: white;
      text-align:center;
      font-weight:bold;
    }
    .logo {
      font-size:20px;
      font-weight:bold;
      height:20px;
    }
    .navigation {
      display: flex;
      font-size: 14px;
      margin: 25px 10px 0px 0px;
      list-style: none;
    }
    .navigation li {
      margin: 0px 0px 0px 30px;
    }
    .navigation li a {
      text-transform: none;
      color: black;
      text-decoration: none;
      font-weight:bold;
    }

  </style>
</head>
<body>
  <header class="header">
    <p class="logo">Atte</p>
    @yield('header')
  </header>

  <main class="content">
    <h1 class="title">@yield('title')</h1>
    @yield('content')
  </main>

  <footer class=footer>
    <small>Atte,inc.</small>
  </footer>
</body>
</html>