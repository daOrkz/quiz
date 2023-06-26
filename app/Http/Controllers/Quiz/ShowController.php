<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

use App\Models\Questions;

class ShowController extends Controller {
  
  public function __invoke()
  {
    $userId = auth()->user()->id;

    $randomQuestion = Questions::where('user_id', $userId)->get()->random();

       
    $correct = $randomQuestion->correct;
    $incorrect = $randomQuestion->incorrect;

    $data = [
      'correct' => $correct,
      'incorrect' => $incorrect,
    ];

    return view('quiz.show', compact($data));
  }
}