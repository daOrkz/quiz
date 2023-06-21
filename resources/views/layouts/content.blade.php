@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">

        <div class="col-2">
          @include('includes.content.sidebar')
        </div>

        <div class="col-10">
          @yield('quiz-content')
        </div>

      </div>
@endsection
