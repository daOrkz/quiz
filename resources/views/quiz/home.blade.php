@extends('layouts.content')

@section('quiz-content')

  <h2>Hello page and Statistic</h2>

  <h3>Hello, {{ $data['userName'] }}</h3>

  <p>You have are: {{ $data['quizes'] }} quizes</p>

@endsection
