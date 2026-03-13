<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        PiGLy
      </a>
      <a href="/weight_logs/goal_setting">目標体重設定</a>
      <form action="/logout" method="POST">
    @csrf
    <button type="submit">ログアウト</button>
</form>
    </div>
  </header>
  <main>
    @yield('content')
</main>
</body>
</html>