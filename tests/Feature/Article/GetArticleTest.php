<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use Illuminate\Http\Response;
use Tests\TestCase;

class GetArticleTest extends TestCase
{
    /**
     * test_can_get_article
     *
     * @return void
     */
    public function test_can_get_article(): void
    {
        $testArticle = Article::factory()->create();

        $response = $this->getJson(route('articles.get', $testArticle->id));

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'title'     => $testArticle->title,
            'author'    => $testArticle->author,
            'content'   => $testArticle->content,
            'createdAt' => $testArticle->created_at,
            'updatedAt' => $testArticle->updated_at,
        ]);
    }
}
