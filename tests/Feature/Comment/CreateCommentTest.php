<?php

namespace Tests\Feature\Comment;

use App\Models\Article;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateCommentTest extends TestCase
{
    /**
     * test_can_create_comment
     *
     * @return void
     */
    public function test_can_create_comment(): void
    {
        $testArticle = Article::factory()->create();
        $requestBody = [
            'comment' => 'New Comment'
        ];

        $response = $this->postJson(route('comment.post', $testArticle->id), $requestBody);

        $response->assertStatus(Response::HTTP_CREATED);

        $response->assertJson($requestBody);

        $this->assertDatabaseHas('comments_table', $requestBody);
    }
}
