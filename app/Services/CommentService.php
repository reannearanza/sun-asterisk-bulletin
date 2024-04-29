<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
  /**
   * createComment
   *
   * @param array $commentData
   * 
   * @return Comment
   */
  public function createComment(array $commentData): Comment
  {
    return Comment::create($commentData);
  }
}
