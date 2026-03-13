<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
  <div class="login-form">
    <h2 class="login-form__heading content__heading">PiGLy</h2>
    <h3>ログイン</h3>
    <div class="login-form__inner">
    <form class="login-form__form" action="/login" method="post">
      @csrf
      <div class="login-form__group">
        <label class="login-form__label" >メールアドレス</label>
        <input class="login-form__input" type="email" name="email" id="email" placeholder="メールアドレスを入力" value="{{ old('email') }}">
        <p class="login-form__error-message">
          @error('email')
          {{ $message }}
          @enderror
        </p>
      </div>
      <div class="login-form__group">
        <label class="login-form__label" >パスワード</label>
        <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
        <p class="login-form__error-message">
          @error('password')
          {{ $message }}
          @enderror
        </p>
      </div>
      <input class="login-form__btn" type="submit" value="ログイン">
    </form>
    <a href="/register/step1">アカウント作成はこちら</a>
  </div>
  </div>
</body>
</html>