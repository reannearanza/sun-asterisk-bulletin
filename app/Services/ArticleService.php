<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{

  /**
   * createArticle
   *
   * @param array $articleData
   * 
   * @return Article
   */
  public function createArticle(array $articleData): Article
  {
      return Article::create($articleData);
  }

  /**
   * updateArticle
   *
   * @param Article $article
   * @param array $articleData
   * 
   * @return Article
   */
  public function updateArticle(Article $article, array $articleData): Article
  {
      $article->update($articleData);
      return $article;
  }
}
