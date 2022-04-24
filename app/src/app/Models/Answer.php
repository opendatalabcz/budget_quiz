<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public function question()
    {
        return $this->belongsTo(Questions::class);
    }

    public function budgetStateChange()
    {
        return $this->hasOne(BudgetStateChange::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_answers');
    }

}
