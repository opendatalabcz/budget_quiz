<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $name
 * @property $short_name
 */
class Party extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'short_name'];

    /**
     * Formats party name into string how it should be printed
     *
     * @return string
     */
    public function displayName()
    {
        $prepend = '';

        if (!empty($this->short_name)) {
            $prepend .= '('. $this->short_name .') – ';
        }

        return $prepend.$this->name;
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
