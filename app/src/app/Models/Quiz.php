<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $hash
 * @property $is_finished
 * @property $age
 * @property $region_id
 * @property $party_id
 * @property $education_id
 */
class Quiz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hash', 'age'];

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

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
