<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
