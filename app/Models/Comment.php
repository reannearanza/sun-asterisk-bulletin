<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Comment extends Model
{
    use HasFactory;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'comment'
    ];

    protected static function boot()
    {
        static::creating(function ($comment) {
            $comment->key = Uuid::uuid4()->toString();
            $comment->author = auth()->user()->id;
        });

        parent::boot();
    }

    public function authors()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function articles()
    {
        return $this->belongsTo(Article::class, 'articleKey', 'key');
    }
}
