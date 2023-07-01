@extends('layouts.content')

@section('quiz-content')

  <h3>Редактировать тест</h3>

  <form action="{{ route('quiz.update', $question->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="mb-3">
      <label for="question" class="form-label">Текст вопроса</label>
      <textarea name="question" class="mb-3 form-control" id="question" rows="3" placeholder="Текст вопроса" > {{ $data['question'] }} </textarea>
      @error('question')
        <div class="alert alert-danger" role="alert">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="correct_answer" class="form-label">Правильный ответ</label>
      <input name="correct_answer" type="text" class="form-control mb-3" id="correct_answer" placeholder="Правильный ответ" value="{{ $data['correct_answer'] }}">
      @error('correct_answer')
        <div class="alert alert-danger" role="alert">
          {{ $message }}
        </div>
      @enderror

      <label for="incorrect_answer" class="form-label">Остальные варианты</label>

      @foreach ($data['incorrect_answer'] as $answer)
        <input name="incorrect_answer[]" type="text" class="form-control mb-3" placeholder="Вариант ответа № {{ $loop->index }}" value="{{ $answer }}">
      @endforeach

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