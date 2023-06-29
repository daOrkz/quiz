<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

use App\Models\Questions;

class ShowController extends Controller {
  
  public function __invoke(Questions $question = null)
  {
    
    if(!$question){

      $userId = auth()->user()->id;
      
      $question = Questions::where('user_id', $userId)->get()->random();
    }

    
    $correct = $question->correct->answer;
    $incorrect = $question->incorrect->toArray();

    $answers = [];

    $answers[] = "
      <div class='form-check'>
        <label class='form-check-label'>
          <input class='form-check-input' type='radio' name='answer' value='correct'>
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

    return view('quiz.show', compact('question', 'answers'));
  }
}