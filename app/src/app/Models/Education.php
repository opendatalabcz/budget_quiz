<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents education
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $name
 */
class Education extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all the quizzes with this assigned level of education
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
