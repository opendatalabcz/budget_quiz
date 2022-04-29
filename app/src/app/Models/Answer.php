<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $title
 * @property $description
 * @property $question_id
 */
class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    public function question()
    {
        return $this->belongsTo(Question::class);
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
