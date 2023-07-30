<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\StoreRequest;

use Illuminate\Support\Facades\DB;

use Exception;

class StoreController extends Controller {
  
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();
   
    $this->transaction($data);

    return redirect(route('home'));
  }

  protected function transaction($data) {

    try{
      DB::transaction(function() use ($data) { 

        // $userId = auth()->user()->id;

        $question = [
          'question' => $data['question'],
        ];
            
        $correct_answer = [
          'answer' => $data['correct_answer'],
        ];

        $questionDB = auth()->user()->questions()->firstOrCreate($question);

        $questionDB->correct()->firstOrCreate($correct_answer);

        
        foreach($data['incorrect_answer'] as $incorrect_answer){
          if(isset($incorrect_answer)) $questionDB->incorrect()->create(['answer' => $incorrect_answer]);
        }
          
      }, 3);
    } catch (Exception $e) {
      
      return redirect(route('error'));
      
    }
  }
}