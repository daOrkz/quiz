@extends('layouts.content')

@section('quiz-content')

<div class="container text-center">
  <div class="row">

  <form action="{{ route('quiz.index') }}" method="get">
    <div class="container text-center">
      <div class="row justify-content-md-center" >
        <div class="col-6">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Поиск по вопросам" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button">Искать</button>
          </div>
        </div>
      </div>
    </div>
  </form>

    @foreach ($questions as $question)
    <div class="col-4">
      <div class="card border-info  mb-3" style="width: 18rem;">
        <div class="card-header">Tag</div>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">{{ $question->question }}</p>
          <a href="{{ route('quiz.edit', $question->id) }}" class="btn btn-primary mb-3">Редактировать</a>

          <form action="{{ route('quiz.destroy', $question->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Удалить">
          </form>
        </div>
      </div> 
    </div>
    @endforeach

  </div>

  <div class="row text-center">
    {{ $questions->withQueryString()->links() }}
  </div>
</div>

@endsection
