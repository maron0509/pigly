@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div>
  <div>
    <h2>Weight Log</h2>
  </div>
  <div class="all-contents">
    <form class="detail-form" action="/weight_logs/{:weightLogId}/update" method="POST">
      <div class="detail-form__group">
        <label class="detail-form__label" for="">日付</label>
        <input type="date" name="date" value="{{ old('date', $weightLog->date) }}">
        <p class="detail-form__error-message">
        @error('date')
        {{ $message }}
        @enderror
        </p>
      </div>
      <div class="detail-form__group">
        <label class="detail-form__label" for="">体重</label>
        <input type="text" name="weight" value="{{ old('weight', $weightLog->weight) }}"><span>kg</span>
        <p class="detail-form__error-message">
        @error('weight')
        {{ $message }}
        @enderror
        </p>
      </div>
      <div class="detail-form__group">
        <label class="detail-form__label" for="">摂取カロリー</label>
        <input type="text" name="calorie" value="{{ old('calorie', $weightLog->calorie) }}"><span>cal</span>
        <p class="detail-form__error-message">
        @error('calorie')
        {{ $message }}
        @enderror
        </p>
      </div>
      <div class="detail-form__group">
        <label class="detail-form__label" for="">運動時間</label>
        <input type="time" name="exercise_time" value="{{ old('exercise_time', $weightLog->exercise_time) }}">
        <p class="detail-form__error-message">
        @error('exercise_time')
        {{ $message }}
        @enderror
        </p>
      </div>
      <div class="detail-form__group">
        <label class="detail-form__label" for="">運動内容</label>
        <textarea name="exercise_content" cols="30" rows="3">{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>
        <p class="detail-form__error-message">
        @error('exercise_content')
        {{ $message }}
        @enderror
        </p>
      </div>
      <div>
        <a href="/" class="back" >戻る</a>
        <button type="submit" class="button-change">更新</button>
        <div class="trash-can-content">
          <a href="/weight_logs/{:weightLogId}/delete">
            <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can" />
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection