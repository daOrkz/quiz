<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\AbstractFilter;


class QuestionsFilter extends AbstractFilter
{
    public const QUESTIONS = 'question';
    public const ANSWER = 'answer';
    // public const SEARCH = 'search';


    protected function getCallbacks(): array
    {
        return [
            self::QUESTIONS => [$this, 'question'],
            self::ANSWER => [$this, 'answer'],
            // self::SEARCH => [$this, 'search'],
        ];
    }

    public function question(Builder $builder, $value)
    {
        $builder->where('question', 'like', "%{$value}%");
    }

    public function answer(Builder $builder, $value)
    {
        $builder->where('answer', 'like', "%{$value}%");
    }

    // public function search(Builder $builder, $value)
    // {
    //     $builder
    //         ->where('answer', 'like', "%{$value}%")
    //         ->where('question', 'like', "%{$value}%");
    // }
}
