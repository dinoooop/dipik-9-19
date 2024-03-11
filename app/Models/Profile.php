<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'story', 
        'work',
        'experience',
        'is_blog',
        'is_social',
        'status',
    ];

   
}
