@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div>
  <div>
    <div>
      <p>目標体重</p>
      <p>{{ $targetWeight }} kg</p>

    </div>
    <div>
      <p>目標まで</p>
      <p>{{ $remainingWeight }} kg</p>

    </div>
    <div>
      <p>最新体重</p>
      <p>{{ $latestWeight }} kg</p>

    </div>
  </div>
  <div>
    <form action="/weight_logs/search" class="weight-logs__form" method="get">
      <div>
        <input type="date" name="start_date" value="{{ request('start_date') }}">～
        <input type="date" name="end_date" value="{{ request('end_date') }}">
        <button class="search-form__search-btn bt" type="submit">検索</button>
      </div>
    </form>
    <div>
      <a class="modal__create" href="#create-modal">データ追加</a>
    </div>
    
      <table class="admin__table">
        <tr class="admin__row">
          <th class="admin__label">日付</th>
          <th class="admin__label">体重</th>
          <th class="admin__label">食事摂取カロリー</th>
          <th class="admin__label">運動時間</th>
        </tr>
        @foreach($weightLogs as $weightLog)
        <tr class="admin__row">
          <td class="admin__data">{{$weightLog->date}}</td>
          <td class="admin__data">{{$weightLog->weight}}</td>
          <td class="admin__data">{{$weightLog->calorie}}</td>
          <td class="admin__data">{{$weightLog->exercise_time}}</td>
          <td class="admin__data">
            <a href="{{ route('weight_logs.show', $weightLog) }}" class="admin__detail-btn">
            詳細</a>
          </td>
        </tr>
        @endforeach
      </table>
    
      
    <div class="modal" id="create-modal">
      <a href="#" class="modal-overlay"></a>
      <div class="modal__inner">
        <h2>Weight Logを追加</h2>
        <div class="modal__detail">
          <form class="modal__detail-form" action="/weight_logs" method="post">
          @csrf
            <div class="modal-form__group">
              <label class="modal-form__label" for="date">日付<span class="modal-form__required">必須</span></label>
              <input type="date" name="date" value="{{ old('date') }}">
              <p class="weight_log-form__error-message">
              @error('date')
              {{ $message }}
              @enderror
              </p>
            </div>

            <div class="modal-form__group">
              <label class="modal-form__label" for="weight">体重<span class="modal-form__required">必須</span></label>
              <input type="text" name="weight" value="{{ old('weight') }}"><span>kg</span>
              <p class="weight_log-form__error-message">
              @error('weight')
              {{ $message }}
              @enderror
              </p>
            </div>

            <div class="modal-form__group">
              <label class="modal-form__label" for="calorie">摂取カロリー<span class="modal-form__required">必須</span></label>
              <input type="text" name="calorie"value="{{ old('calorie') }}"><span>cal</span>
              <p class="weight_log-form__error-message">
              @error('calorie')
              {{ $message }}
              @enderror
              </p>
            </div>

            <div class="modal-form__group">
              <label class="modal-form__label" for="time">運動時間<span class="modal-form__required">必須</span></label>
              <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
              <p class="weight_log-form__error-message">
              @error('exercise_time')
              {{ $message }}
              @enderror
              </p>
            </div>

            <div class="modal-form__group">
              <label class="modal-form__label" for="">運動内容<span class="modal-form__required">必須</span></label>
              <textarea name="exercise_content" cols="30" rows="4">{{ old('exercise_content') }}</textarea>
              < class="weight_log-form__error-message">
              @error('exercise_content')
              {{ $message }}
              @enderror
              </p>
            </div>

            <input class="modal-form__create-btn" type="submit" value="登録">
          </form>
        </div>
      </div> 
    </div>
      {{ $weightLogs->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
  </div>
</div>
@endsection