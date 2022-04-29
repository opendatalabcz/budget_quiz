<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $number
 * @property $title
 * @property $description
 */
class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number', 'title', 'description'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
