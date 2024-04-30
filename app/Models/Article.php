<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $hidden = ['id'];

    public function getRouteKeyName()
    {
        return 'key';
    }

    protected static function boot() {
        static::creating(function ($article) {
            $article->key = Uuid::uuid4()->toString();
            $article->author = auth()->user()->id;
        });
        parent::boot();
    }

    public function authors() {
        return $this->belongsTo(User::class, 'author', 'id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'articleKey', 'key');
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class, 'articleKey', 'key');
    }
}
