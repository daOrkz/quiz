<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Questions;


class IndexController extends Controller
{
    public function __invoke()
    {

        // $questions = auth()->user()->questions;

        $userId = auth()->user()->id;

        Questions::where('user_id', $userId)->firstOrFail();

        $questions = Questions::where('user_id', $userId)->paginate(6);

        return view('quiz.index', compact('questions'));
    }
}
