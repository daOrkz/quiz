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
        
    $correct_answer = [
      'answer' => $data['correct_answer'],
    ];

    $questionDB = User::find($userId)->question()->firstOrCreate($question);

    $questionDB->correct()->firstOrCreate($correct_answer);

    foreach($data['incorrect_answer'] as $incorrect_answer){
      $questionDB->incorrect()->firstOrCreate(['answer' => $incorrect_answer]);
    }
        

    return redirect(route('home'));
  }
}