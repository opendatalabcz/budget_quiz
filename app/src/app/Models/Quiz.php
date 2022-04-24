<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'quiz_answers');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
