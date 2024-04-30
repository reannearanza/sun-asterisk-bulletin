<?php

namespace App\Services;

use App\Models\Article;

class UpvoteService
{
  public function toggleUpVote(Article $article)
  {
    $upvote = $article->upvotes()->where('user', 1);
    if ($upvote->exists()) {
      $upvote->delete();
    } else {
      $article->upvotes()->create();
    }
  }
}
