<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

class AdminController extends Controller {
  
  public function __invoke()
  {
    $this->authorize('view-admin-panel', [self::class]);

    return view('quiz.admin');
  }
}