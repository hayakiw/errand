@extends('layout.master')

<?php

    $layout = [
        'title' => 'ユーザー情報',
    ];

?>

@section('content')
  <h2><span>ユーザー詳細</span></h2>

  <div class="panel panel-default">
    <div class="panel-heading">
    </div>

    <div class="panel-body">
      <div class="form-horizontal">
        <div class="form-group">
          <label for="" class="col-md-4 control-label">名前</label>
          <div class="col-md-8 form-control-static">
            {{ $user->getName() }}
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-md-4 control-label">都道府県</label>
          <div class="col-md-8 form-control-static">
            {{ $user->getPrefecture() }}
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-md-4 control-label">市区町村</label>
          <div class="col-md-8 form-control-static">
            {{ $user->city }}
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-md-4 control-label">地名・番地</label>
          <div class="col-md-8 form-control-static">
            ****
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-md-4 control-label">建物名</label>
          <div class="col-md-8 form-control-static">
            ****
          </div>
        </div>
      </div>
    </div>

    <div class="panel-footer">
    </div>
  </div>
@endsection
