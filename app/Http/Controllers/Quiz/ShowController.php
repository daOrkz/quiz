<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

class ShowController extends Controller {
  
  public function __invoke()
  {

    dd('Show Controller');
    // return view('quiz.create');
  }
}