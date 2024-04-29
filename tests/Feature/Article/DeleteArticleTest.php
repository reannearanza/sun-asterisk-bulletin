<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use Illuminate\Http\Response;
use Tests\TestCase;

class DeleteArticleTest extends TestCase
{
    /**
     * test_can_delete_article
     *
     * @return void
     */
    public function test_can_delete_article(): void
    {
        $testArticle = Article::factory()->create();

        $response = $this->deleteJson(route('article.delete', $testArticle->id));

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $response = $this->getJson(route('article.get', $testArticle->id));

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
