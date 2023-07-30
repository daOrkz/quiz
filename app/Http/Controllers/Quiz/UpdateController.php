<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\UpdateRequest;

use App\Models\Questions;

use Illuminate\Support\Facades\DB;

use Exception;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Questions $question)
    {
        $data = $request->validated();

        $this->transaction($data, $question);

        return redirect(route('home'));

    }

    protected function transaction($data, $question) {
        try {
            DB::transaction(function() use ($data, $question){
                $questionData = [
                    'question' => $data['question'],
                ];
                    
                $correct_answer = [
                    'answer' => $data['correct_answer'],
                ];
        
                $question->update($questionData);
        
                $question->correct()->update($correct_answer);
        
                $question->incorrect()->delete();
                foreach($data['incorrect_answer'] as $incorrect_answer){
                    $question->incorrect()->create(['answer' => $incorrect_answer]);
                }
            }, 3);
        } catch (Exception $e) {
            return redirect(route('error'));
        }
    }
}
