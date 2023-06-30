<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

use App\Models\Questions;

class ShowController extends Controller {
  
  public function __invoke(Questions $question)
  {
    return view('quiz.show', compact('question'));
  }
}