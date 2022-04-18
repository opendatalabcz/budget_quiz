<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetCapitol extends Model
{
    public function budgetState()
    {
        return $this->hasOne(BudgetState::class);
    }

    public function budgetStateChanges()
    {
        return $this->hasMany(BudgetStateChange::class);
    }
}
