<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetStateChange extends Model
{
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function budgetCapitol()
    {
        return $this->belongsTo(BudgetCapitol::class);
    }
}
