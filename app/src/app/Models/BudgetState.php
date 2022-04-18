<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetState extends Model
{
    public function capitol()
    {
        return $this->belongsTo(BudgetCapitol::class);
    }
}
