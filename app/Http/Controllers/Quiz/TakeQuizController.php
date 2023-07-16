<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

use App\Models\Questions;

class TakeQuizController extends Controller {
  
  public function __invoke(Questions $question = null)
  {
    
    if(!$question){
      
      $userId = auth()->user()->id;

      Questions::where('user_id', $userId)->firstOrFail();

      $question = Questions::where('user_id', $userId)->get()->random();

      if(is_null($question)) return redirect(route('home'));
      
    }

    
    $correct = $question->correct->answer;
    $incorrect = $question->incorrect->toArray();

    $answers = [];

    $answers[] = "
      <div class='form-check'>
        <label class='form-check-label'>
          <input class='form-check-input' type='radio' name='answer' value='correct' id='correct'>
          <p class='lead'> {$correct} </p>
        </label>
      </div>";
    
    foreach ($incorrect as $elem) {
      $answers[] = "
        <div class='form-check'>
          <label class='form-check-label'>
          <input class='form-check-input' type='radio' name='answer' value='incorrect'>
            <p class='lead'> {$elem['answer']} </p>
          </label>
        </div>";
    }

    shuffle($answers);

    return view('quiz.take-quiz', compact('question', 'answers'));
  }
}