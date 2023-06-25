<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\StoreRequest;

use App\Models\CorrectAnswer;
use App\Models\IncorrectAnswer;
use App\Models\Questions;
use App\Models\User;

class StoreController extends Controller {
  
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();
    $userId = auth()->user()->id;

    $question = [
      'question' => $data['question'],
    ];

    
    $questionDB = User::find($userId)->question()->firstOrCreate($question);
  
    /* 
    $q = Questions::find(2);
    $u = $q->user->name;
    */


        
    $correct_answer = [
      'answer' => $data['correct_answer'],
    ];

    $questionDB->correct()->firstOrCreate($correct_answer);

    exit();

    $incorrect_answers = [
      'answer' => $data['incorrect_answer']
    ];

    
    Questions::firstOrCreate($question);
    CorrectAnswer::firstOrCreate($correct_answer);
    
    foreach($incorrect_answers as $incorrect_answer){
      IncorrectAnswer::firstOrCreate($incorrect_answer);
    }
    
    $data = [];

    redirect(route('home'));
  }
}