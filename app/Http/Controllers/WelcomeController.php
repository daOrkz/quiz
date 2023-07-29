<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index() {
        
        $users = DB::table('users')->count();
        $questions = DB::table('questions')->count();
        
        return view('welcome', compact('users', 'questions'));
    }
}
