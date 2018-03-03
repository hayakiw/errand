@extends('layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')
  <h2><span>新規会員登録</span></h2>
  <p class="lead">下記の項目を入力して「登録する」を押してください。</p>

  {{-- @if ($errors->count())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif --}}

  <div class="col-md-8">
    {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
      <div class="form-group">
        <label for="input_email" class="col-md-4 control-label">メールアドレス（※非公開） <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="mail" name="email" class="form-control" id="input_email" placeholder="半角英数字で入力" value="{{ old('email') ? old('email') : '' }}">
          @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_password" class="col-md-4 control-label">パスワード <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="password" name="password" class="form-control" id="input_password" placeholder="半角英数字6～20文字で入力">
          @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_lastname" class="col-md-4 control-label">姓 <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="text" name="last_name" class="form-control" id="input_lastname" placeholder="姓" value="{{ old('last_name') ? old('last_name') : '' }}">
          @if ($errors->has('last_name'))
            <div class="text-danger">{{ $errors->first('last_name') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_firstname" class="col-md-4 control-label">名 <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="text" name="first_name" class="form-control" id="input_firstname" placeholder="名" value="{{ old('first_name') ? old('first_name') : '' }}">
          @if ($errors->has('first_name'))
            <div class="text-danger">{{ $errors->first('first_name') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_zipcode" class="col-md-4 control-label">郵便番号 <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="text" name="zip_code" class="form-control" id="input_zipcode" placeholder="半角数字、ハイフン（-）なしで入力" value="{{ old('zip_code') ? old('zip_code') : '' }}">
          {{-- TODO: 住所自動入力 --}}
          @if ($errors->has('zip_code'))
            <div class="text-danger">{{ $errors->first('zip_code') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_prefecture" class="col-md-4 control-label">都道府県 <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <select class="form-control" name="prefecture" id="input_prefecture">
            <option value="">都道府県を選択</option>
            @foreach (config('my.prefectures') as $key => $value)
              <option value="{{ $key }}"{{ old('prefecture') == $key ? ' selected="selected"' : '' }}>{{ $value }}</option>
            @endforeach
          </select>
          @if ($errors->has('prefecture'))
            <div class="text-danger">{{ $errors->first('prefecture') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_city" class="col-md-4 control-label">市区町村 <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="text" name="city" class="form-control" id="input_city" placeholder="市区町村" value="{{ old('city') ? old('city') : '' }}">
          @if ($errors->has('city'))
            <div class="text-danger">{{ $errors->first('city') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_address" class="col-md-4 control-label">地名・番地 <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="text" name="address" class="form-control" id="input_address" placeholder="地名・番地" value="{{ old('address') ? old('address') : '' }}">
          @if ($errors->has('address'))
            <div class="text-danger">{{ $errors->first('address') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_building" class="col-md-4 control-label">建物名 <span class="">&nbsp;</span></label>
        <div class="col-md-8">
          <input type="text" name="building" class="form-control" id="input_building" placeholder="○○マンション3階" value="{{ old('building') ? old('building') : '' }}">
          @if ($errors->has('building'))
            <div class="text-danger">{{ $errors->first('building') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="input_tel" class="col-md-4 control-label">電話番号 <span class="text-danger">*</span></label>
        <div class="col-md-8">
          <input type="text" name="tel" class="form-control" id="input_tel" placeholder="半角数字、ハイフン（-）なしで入力" value="{{ old('tel') ? old('tel') : '' }}">
          @if ($errors->has('tel'))
            <div class="text-danger">{{ $errors->first('tel') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-offset-4 col-md-8">
          <button type="submit" name="submit" id="btn_regist" class="btn btn-primary">登録する</button>
        </div>
      </div>

    {!! Form::close() !!}
  </div>

@endsection
