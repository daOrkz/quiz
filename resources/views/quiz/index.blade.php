@extends('layouts.content')

@section('quiz-content')

  @foreach ($questions as $question)
    <p>{{ $question }}</p>
    <p><a href="{{ route('quiz.show', $question->id) }}">More</a></p>
  @endforeach

@endsection
