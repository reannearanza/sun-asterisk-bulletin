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
            $article->author = 1;
        });
        parent::boot();
    }

    protected function authors() {
        return $this->belongsTo(User::class, 'author', 'id');
    }
    
    protected function comments()
    {
        return $this->hasMany(Comment::class, 'articleKey', 'key');
    }
}
