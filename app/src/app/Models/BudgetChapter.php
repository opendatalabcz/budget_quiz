<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents budget chapter
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $number
 * @property $name
 */
class BudgetChapter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number', 'name'];

    /**
     * Get the initial budget state for this budget chapter
     */
    public function budgetState()
    {
        return $this->hasOne(BudgetState::class);
    }

    /**
     * Get all budget state changes that this budget chapter participates in
     */
    public function budgetStateChanges()
    {
        return $this->hasMany(BudgetStateChange::class);
    }
}
