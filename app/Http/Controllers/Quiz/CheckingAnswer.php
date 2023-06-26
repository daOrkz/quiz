<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CheckingAnswer extends Controller
{
    public function __invoke(Request $request)
    {
        $data = request();
        dd($data);
        // return view('quiz.index');
    }
}
