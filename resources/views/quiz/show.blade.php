@extends('layouts.content')

@section('quiz-content')

  <h3>Пройти тест</h3>

  <div style= "border: 2px solid black; border-radius: 7px;">
    <p class="lead m-2"> {{ $question['question'] }} </p>
  </div>

  <form action="{{ route('quiz.check', $question->id) }}" method="GET">
    @csrf

    <div class="mt-3">
      <p class="lead">Выберете ответ:</p>
      
    @foreach ($answers as $answer)
      {!! $answer !!}
    @endforeach

    @error('UserAnswer')
      <div class="alert alert-info" role="alert">
        {{ $message }}
      </div>
    @enderror
        
    </div>

   

    

    <button type="submit" class="btn btn-primary">Проверить</button>
    <a class="btn btn-info" href="{{ route('quiz.show') }}">Следующий</a>
  </form>

@endsection