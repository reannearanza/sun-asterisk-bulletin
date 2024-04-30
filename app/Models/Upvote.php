<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    use HasFactory;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected static function boot()
    {
        static::creating(function ($upvote) {
            $upvote->user = auth()->user()->id;
        });

        parent::boot();
    }
}
