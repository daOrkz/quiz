<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncorrectAnswer extends Model
{
    use HasFactory;

    protected $table = 'incorrect_answers';
    protected $guarded = false;
    public $timestamps = false;

}
