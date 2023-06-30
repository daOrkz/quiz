@extends('layouts.content')

@section('quiz-content')

<div class="container text-center">
  <div class="row">

    @foreach ($questions as $question)
    <div class="col-4">
      <div class="card border-info  mb-3" style="width: 18rem;">
        <div class="card-header">Tag</div>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">{{ $question['question'] }}</p>
          <a href="{{ route('quiz.show', $question->id) }}" class="btn btn-primary">Редактировать</a>
        </div>
      </div> 
    </div>
    @endforeach

  </div>
</div>

@endsection
