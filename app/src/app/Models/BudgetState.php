<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
 */
class BudgetState extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'income_first_year',
        'income_second_year',
        'income_third_year',
        'expense_first_year',
        'expense_second_year',
        'expense_third_year'
    ];

    public function budgetChapter()
    {
        return $this->belongsTo(BudgetChapter::class);
    }
}
