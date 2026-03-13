<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register_step1.css') }}" />
</head>
<body>
  <div class="register-form">
    <h2 class="register-form__heading content__heading">PiGLy</h2>
    <h3>新規会員登録</h3>
    <p>STEP１　アカウント情報の登録</p>
    <div class="register-form__inner">
      <form class="register-form__form" action="/register/step1" method="post">
      @csrf
        <div class="register-form__group">
          <label class="register-form__label" >お名前</label>
          <input class="register-form__input" type="text" name="name" id="name" placeholder="名前を入力" value="{{ old('name') }}">
          <p class="register-form__error-message">
          @error('name')
          {{ $message }}
          @enderror
          </p>
        </div>
        <div class="register-form__group">
          <label class="register-form__label" >メールアドレス</label>
          <input class="register-form__input" type="email" name="email" id="email" placeholder="例：メールアドレスを入力" value="{{ old('email') }}">
          <p class="register-form__error-message">
          @error('email')
          {{ $message }}
          @enderror
          </p>
        </div>
        <div class="register-form__group">
          <label class="register-form__label" for="password">パスワード</label>
          <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
          <p class="register-form__error-message">
          @error('password')
          {{ $message }}
          @enderror
          </p>
        </div>
        <button class="register-form__btn" type="submit" value="">次に進む</button>
      </form>
      <a href="/login">ログインはこちら</a>
    </div>
  </div>
</body>
</html>
