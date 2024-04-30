<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\UpvoteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpvoteController extends Controller
{
    public function __construct(
        protected UpvoteService $upvoteService
    )
    {
    }

    /**
     * toggleUpVote
     *
     * @param Article $article
     * 
     * @return JsonResponse
     */
    public function toggleUpVote(Article $article): JsonResponse
    {
        $this->upvoteService->toggleUpVote($article);
        return new JsonResponse(
            null,
            Response::HTTP_OK
        );
    }
}
