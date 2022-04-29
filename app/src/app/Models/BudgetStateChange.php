<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $is_increase
 * @property $is_expense
 * @property $first_year
 * @property $second_year
 * @property $third_year
 * @property $budget_capitol_id
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

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function budgetCapitol()
    {
        return $this->belongsTo(BudgetCapitol::class);
    }
}
