<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

use App\Models\Questions;


class DestroyController extends Controller
{
    public function __invoke(Questions $question)
    {

        $question->delete();

        return redirect(route('quiz.index'));
    }
}
