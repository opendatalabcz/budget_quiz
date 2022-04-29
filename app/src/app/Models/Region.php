<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $name
 */
class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
