<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\CorrectAnswer;
use App\Http\Filters\QuestionsFilter;


use Illuminate\Support\Facades\DB;

use App\Http\Requests\Quiz\FilterRequest;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request, Questions $questions)
    {

        // $questions = auth()->user()->questions;

        $data = $request->validated();

        $filter = app()->make(QuestionsFilter::class, ['queryParams' => array_filter($data)]);

        $userId = auth()->user()->id;

        Questions::where('user_id', $userId)->firstOrFail();

        $questions = Questions::where('user_id', $userId)
            ->filter($filter)
            ->paginate(6);

        /* Common search for Question and Correct Answer

        if (!empty($_GET['search'])) {        

            $questionsAnswer = DB::table('questions')
                ->where('questions.user_id', '=', $userId)
                ->where('questions.question', 'like', "%{$data['search']}%")
                ->orWhere('correct_answers.answer', 'like', "%{$data['search']}%")
                ->join('correct_answers', 'correct_answers.question_id', '=', 'questions.id')
                ->select('questions.user_id','questions.id', 'questions.question', 'correct_answers.question_id', 'correct_answers.answer')  // Illuminate\Database\Query\Builder 
                ->get();
            // $questions = $questionsAnswer;
                
            // return view('quiz.index', compact('questions'));
                
                dd($questionsAnswer);


            $filtereble = [];


            foreach ($questionsAnswer as $elem) {
                if ((stripos($elem->question, $data['search']) !== false) || 
                    (stripos($elem->answer, $data['search']) !== false)) {
                    $filtereble[] = $elem;
                }
            }

            // dd($filtereble);

            $questions = [];

            foreach ($filtereble as $question) {
                $questions[] = Questions::find($question->id);
            }

            $questions->paginate(6);
            // dd($questions);

            return view('quiz.index', compact('questions'));

        }
 
        */
        
        return view('quiz.index', compact('questions'));
    }
}
