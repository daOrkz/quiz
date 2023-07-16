@extends('layouts.content')

@section('quiz-content')

  <h3>Здравствуйте, {{ $data['userName'] }}</h3>

  <p>У вас всего {{ $data['quizes'] }} тестов</p>

@endsection
