<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use Illuminate\Http\Response;
use Tests\TestCase;

class ListArticleTest extends TestCase
{
    /**
     * test_can_list_articles
     *
     * @return void
     */
    public function test_can_list_articles(): void
    {
        $testArticles = Article::factory(20)->create();

        $response = $this->getJson(route('article.list'));

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'total' => 20
        ]);

        $randomArticle1 = $testArticles[rand(0, 19)];
        $randomArticle2 = $testArticles[rand(0, 19)];

        $response->assertJsonFragment([
            'id'    => $randomArticle1->id,
            'title' => $randomArticle1->title
        ]);

        $response->assertJsonFragment([
            'id'    => $randomArticle2->id,
            'title' => $randomArticle2->title
        ]);
    }
}
