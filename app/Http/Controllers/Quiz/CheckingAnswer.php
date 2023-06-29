<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CheckingAnswer extends Controller
{
    public function __invoke(Request $request)
    {
        $answer = request()->answer;

        if($answer == 'correct') dd('correct');

        return redirect()->back()->withErrors(['answer' => 'incorrect']);
        // return view('quiz.index');
    }
}
