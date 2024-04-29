<?php

namespace Tests\Feature\Article;

use Illuminate\Http\Response;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    /**
     * test_can_create_new_article
     *
     * @return void
     */
    public function test_can_create_new_article(): void
    {
        $requestBody = [
            'title'   => 'Article One',
            'content' => 'Lorem Ipsum',
        ];

        $response = $this->postJson(route('articles.store'), $requestBody);

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            'title'     => 'Article One',
            'author'    => [
                'id'   => $this->testingUser->id,
                'name' => $this->testingUser->name
            ],
            'content'   => 'Lorem Ipsum'
        ]);

        $this->assertDatabaseHas('articles_table', $requestBody);
    }
}
