@extends('layout.master')

<?php
    $layout = [
        'title' => '',
        'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
    <section class="main-visual">
      <div class="container">
        <div class="logo">
          <h1 class="text-center"><img src="img/logo.png" alt=""></h1>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- / .main-visual -->
    <section class="about">
      <div class="headline">
        <h2>買い物代行とは?</h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4"><img src="img/about_point_01.jpg" alt=""></div>
          <div class="col-sm-4"><img src="img/about_point_02.jpg" alt=""></div>
          <div class="col-sm-4"><img src="img/about_point_03.jpg" alt=""></div>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- / .about -->
    {{-- <section class="service-list">
      <div class="headline">
        <h2>サービス一覧</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Category::topCategories() as $category)
          <div class="survice-column">
            <div class="text-center">
              <h3>{{ $category->name }}</h3>
            </div>
            <ul>
              @foreach($category->children as $child)
              <li><a href="{{ route('request.index', ['category' => $child->id ]) }}">{{ $child->name }}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- / .survice-column -->
          @endforeach
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>
    <!-- / .service-list --> --}}

    <section class="staff-list">
      <div class="headline">
        <h2>リクエスト一覧</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Request::All() as $request)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> {{-- <img src="{{ $request->imageUrl() }}" alt="" > --}}
              <div class="caption">
                <h3>{{ $request->city }}</h3>
                <p>申込期限: {{ $request->timeLimit() }}</p>
                <p>{!! nl2br(e(mb_strim($request->note, 0, 80))) !!}</p>
                <p><a href="{{ route('request.show', $request) }}" class="btn btn-primary" role="button">Button</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
          @endforeach
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>
@endsection
