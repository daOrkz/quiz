<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

class CreateController extends Controller {
  
  public function __invoke()
  {
    return view('quiz.create');
  }
}