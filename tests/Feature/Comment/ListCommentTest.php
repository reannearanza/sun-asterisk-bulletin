<?php

namespace Tests\Feature\Comment;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Response;
use Tests\TestCase;

class ListCommentTest extends TestCase
{
    /**
     * test_example
     *
     * @return void
     */
    public function test_example(): void
    {
        $testArticles = Article::factory(2)->create();
        
        Comment::factory(10)->create([
            'articleId' => $testArticles[0]->id
        ]);

        $response = $this->get(route('comment.list', $testArticles->id));

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'total' => 20
        ]);

        $randomComment1 = $testArticles[rand(0, 9)];
        $randomComment2 = $testArticles[rand(0, 9)];

        $response->assertJsonFragment([
            'id'    => $randomComment1->id,
            'title' => $randomComment1->title
        ]);

        $response->assertJsonFragment([
            'id'    => $randomComment2->id,
            'title' => $randomComment2->title
        ]);
    }
}
