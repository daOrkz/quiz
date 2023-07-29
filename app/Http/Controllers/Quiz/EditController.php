<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

use App\Models\Questions;

class EditController extends Controller {
  
  public function __invoke(Questions $question)
  {
    $correct = $question->correct->answer;
    $incorrect = $question->incorrect->toArray();

    $data = [
      'question' => $question['question'],
      'correct_answer' => $correct,
      'incorrect_answer' => [],
    ];

    foreach($incorrect as $answer){
      $data['incorrect_answer'][] = $answer['answer'];
    }

    return view('quiz.edit', compact('question', 'data'));
  }
}