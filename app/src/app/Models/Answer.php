<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents Answer entity from database
 *
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

    /**
     * Get the question that this answer belongs to
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the budget state change, that this answer makes
     */
    public function budgetStateChange()
    {
        return $this->hasOne(BudgetStateChange::class);
    }

    /**
     * Get all quizzes in which this answer is chosen
     */
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_answers');
    }
}
