<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\CheckingAnswerRequest;

class CheckingAnswer extends Controller
{
    public function __invoke(CheckingAnswerRequest $request)
    {
        $userAnswer = $request->validated();


        if($userAnswer['answer'] == 'incorrect')  return redirect()->back()->withErrors(['userAnswer' => 'Не верный ответ']);

        // return redirect()->back()->withErrors(['userAnswer' => 'Верный ответ']);

        return redirect(route('quiz.take-quiz'));
    }
}
