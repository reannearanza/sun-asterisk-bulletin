<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
{
    /**
     * test_can_update_article
     *
     * @return void
     */
    public function test_can_update_article(): void
    {
        $testArticle = Article::factory()->create();
        $requestBody = [
            'title' => 'Article One'
        ];

        $response = $this->patch(route('article.update', $testArticle->id), $requestBody);

        $response->assertStatus(Response::HTTP_OK);

        $response = $this->getJson(route('article.get', $testArticle->id));

        $response->assertJson($requestBody);

        $this->assertDatabaseHas('articles_table', $requestBody);
    }
}
