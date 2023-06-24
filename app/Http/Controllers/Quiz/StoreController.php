<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller {
  
  public function __invoke(Request $request)
  {
    $data = $request->all();
    dd($data);
  }
}