<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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

    public function budgetState()
    {
        return $this->hasOne(BudgetState::class);
    }

    public function budgetStateChanges()
    {
        return $this->hasMany(BudgetStateChange::class);
    }
}
