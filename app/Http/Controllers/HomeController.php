<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Questions;

use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $userName = auth()->user()->name;
        $userId = auth()->user()->id;

        $quizes = Questions::where('user_id', $userId)->count();

        $data = [
            'userName' => $userName,
            'quizes'   => $quizes,
        ];

        return view('quiz.home', compact('data'));
    }
}
