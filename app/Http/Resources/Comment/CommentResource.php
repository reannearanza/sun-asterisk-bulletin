<?php

namespace App\Http\Resources\Comment;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public static $wrap = false;
    
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'key' => $this->key,
            'author' => UserResource::make($this->authors),
            'comment' => $this->comment,
        ];
    }
}
