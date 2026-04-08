@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css') }}">
@endsection

@section('content')
<div>
  <div>
    <h2>目標体重設定</h2>
  </div>
  <form action="/weight_logs/goal_setting" method="post">
    @csrf
    <div>
      <input type="text" name="target_weight" value="{{ $target->target_weight ?? '' }}"><span>kg</span>
      <p class="weight_log-form__error-message">
      @error('target_weight')
      {{ $message }}
      @enderror
      </p>
    </div>
    <div>
      <a href="/weight_logs" class="back" >戻る</a>
      <button type="submit" class="button-change">更新</button>
    </div>
  </form>
</div>
@endsection