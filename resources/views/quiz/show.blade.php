@extends('layouts.content')

@section('quiz-content')

  <h3>Пройти тест</h3>

  <form action="{{ route('quiz.check') }}" method="GET">
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

    @error('correct_answer')
      <div class="alert alert-danger" role="alert">
        {{ $message }}
      </div>
    @enderror

    <div class="form-check">
      <p>Выберете ответ</p>
      <label for="correct_answer" class="flexRadioDefault">Выберете ответ</label>
      <input class="form-check-input" type="radio" name="flexRadioDefault-1" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault">
        Default radio
      </label>
    </div>
    
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
      <label class="form-check-label" for="flexRadioDefault">
        Default checked radio
      </label>
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