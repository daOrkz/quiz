<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questions;
use App\Models\Traits\Filterable;

class CorrectAnswer extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'correct_answers';
    protected $guarded = false;
    public $timestamps = false;

    public function question(){
        return $this->belongsTo(Questions::class, 'question_id');
    }

}
