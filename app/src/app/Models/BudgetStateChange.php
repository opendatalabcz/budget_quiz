<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents the change of state of budget simulation
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $income_first_year
 * @property $income_second_year
 * @property $income_third_year
 * @property $expense_first_year
 * @property $expense_second_year
 * @property $expense_third_year
 * @property $budget_chapter_id
 * @property $answer_id
 */
class BudgetStateChange extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_increase',
        'is_expense',
        'first_year',
        'second_year',
        'third_year'
    ];

    /**
     * Get the answer that this budget state change belongs to
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    /**
     * Get the budget chapter that this state change modifies
     */
    public function budgetChapter()
    {
        return $this->belongsTo(BudgetChapter::class);
    }
}
