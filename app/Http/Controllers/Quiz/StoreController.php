<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller {
  
  public function __invoke(Request $request)
  {
    $data = $request->validate([
      'question' => ['required', 'string', 'max:255'],
      'correct_answer' => ['required', 'string', 'max:255'],
      'incorrect_answer' => '',
    ]);
    
    dd($data);
  }
}