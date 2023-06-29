<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Questions;


class CheckingAnswer extends Controller
{
    public function __invoke(Questions $question)
    {
        $UserAnswer = request()->answer;

        if($UserAnswer == 'incorrect')  return redirect()->back()->withErrors(['UserAnswer' => 'Не верный ответ']);

    
        return redirect()->back()->withErrors(['UserAnswer' => 'Верный ответ']);

        // return redirect(route('quiz.show', compact('question', 'UserAnswer')));
    }
}
