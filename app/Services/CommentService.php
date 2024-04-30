<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
  /**
   * createComment
   *
   * @param Article $article
   * @param array $commentData
   * 
   * @return Comment
   */
  public function createComment(Article $article, array $commentData): Comment
  {
    return $article->load('comments')->comments()->create($commentData);
  }

  /**
   * getComments
   *
   * @param Article $article
   * 
   * @return Collection
   */
  public function getComments(Article $article): Collection
  {
    return $article->load('comments')->comments()->get()->sortByDesc(Comment::CREATED_AT);
  }
}
