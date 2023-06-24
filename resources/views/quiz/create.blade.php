@extends('layouts.content')

@section('quiz-content')

  <h3>Create page</h3>

  <form action="{{ route('quiz.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="question" class="form-label">Текст вопроса</label>
      <textarea name="question" class="form-control" id="question" rows="3"></textarea>
    </div>

    <div class="mb-3">
      <label for="answer" class="form-label">Варинты ответа</label>
      <input name="answer[]" type="text" class="form-control mb-3" id="answer" placeholder="Вариант ответа № 1">
      <input name="answer[]" type="text" class="form-control mb-3"  placeholder="Вариант ответа № 2">
      <input name="answer[]" type="text" class="form-control mb-3"  placeholder="Вариант ответа № 3">
      <input name="answer[]" type="text" class="form-control mb-3"  placeholder="Вариант ответа № 4">
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
  </form>

@endsection