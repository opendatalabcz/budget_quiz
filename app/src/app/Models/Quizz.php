<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    /**
     * Need to set the table name manually, because laravel can not handle Quizz in plural 
     * */ 
    protected $table = 'quizzes';

    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'quizz_answers');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
