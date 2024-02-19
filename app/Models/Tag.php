<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
    ];

    public $timestamps = false;

    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class);
    }
    
}
