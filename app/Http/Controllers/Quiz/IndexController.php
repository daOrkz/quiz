<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {

        $questions = auth()->user()->questions;

        return view('quiz.index', compact('questions'));
    }
}
