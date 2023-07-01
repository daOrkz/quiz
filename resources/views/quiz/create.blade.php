@extends('layouts.content')

@section('quiz-content')

  <h3>Create page</h3>

  <form action="{{ route('quiz.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="question" class="form-label">Текст вопроса</label>
      <textarea name="question" class="mb-3 form-control" id="question" rows="3" placeholder="Текст вопроса" > {{ old('question') }} </textarea>
      @error('question')
        <div class="alert alert-danger" role="alert">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="correct_answer" class="form-label">Правильный ответ</label>
      <input name="correct_answer" type="text" class="form-control mb-3" id="correct_answer" placeholder="Правильный ответ" value="{{ old('correct_answer') }}">
      @error('correct_answer')
        <div class="alert alert-danger" role="alert">
          {{ $message }}
        </div>
      @enderror

      <label for="incorrect_answer" class="form-label">Остальные варианты</label>
      <input name="incorrect_answer[]" type="text" class="form-control mb-3"  placeholder="Вариант ответа № 2">
      <input name="incorrect_answer[]" type="text" class="form-control mb-3"  placeholder="Вариант ответа № 3">
      <input name="incorrect_answer[]" type="text" class="form-control mb-3"  placeholder="Вариант ответа № 4">
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
  </form>

  @if ($errors->any())
  <div class="mt-3 alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

@endsection