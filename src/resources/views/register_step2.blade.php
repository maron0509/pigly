<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register_step2.css') }}" />
</head>
<body>
  <div class="register-form">
    <h2 class="register-form__heading content__heading">PiGLy</h2>
    <h3>新規会員登録</h3>
    <p>STEP２　体重データの入力</p>
    <div class="register-form__inner">
      <form class="register-form__form" action="/register/step2" method="post">
      @csrf
        <div class="register-form__group">
          <label class="register-form__label" >現在の体重</label>
          <input class="register-form__input" type="text" name="weight" id="weight" placeholder="現在の体重を入力" value="{{ old('weight') }}">kg
          <p class="register-form__error-message">
          @error('weight')
          {{ $message }}
          @enderror
          </p>
        </div>
        <div class="register-form__group">
          <label class="register-form__label" >目標の体重</label>
          <input class="register-form__input" type="text" name="target_weight" id="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}">kg
          <p class="register-form__error-message">
          @error('target_weight')
          {{ $message }}
          @enderror
          </p>
        </div>
        <input class="register-form__btn" type="submit" value="アカウント作成">
      </form>
    </div>
  </div>
</body>
</html>