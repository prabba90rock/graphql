<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'dob', 'is_married',
    ];



    public function user()
    {
        return $this->belongsTo(Profile::class);
    }
}
