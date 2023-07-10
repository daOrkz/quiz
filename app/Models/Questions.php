<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\CorrectAnswer;
use App\Models\IncorrectAnswer;

use App\Models\Traits\Filterable;
use Illuminate\Http\FileHelpers;

class Questions extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'questions';
    protected $guarded = false;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function correct()
    {
        return $this->hasOne(CorrectAnswer::class, 'question_id');
    }

    public function incorrect()
    {
        return $this->hasMany(IncorrectAnswer::class, 'question_id');
    }
}
