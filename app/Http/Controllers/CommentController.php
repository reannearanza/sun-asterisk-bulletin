<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Article;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function __construct(
        protected CommentService $commentService
    )
    {
    }

    /**
     * create
     *
     * @param CreateCommentRequest $request
     * 
     * @return CommentResource
     */
    public function store(Article $article, CreateCommentRequest $request): CommentResource
    {
        return CommentResource::make(
            $this->commentService->createComment($article, $request->validated()),
            Response::HTTP_CREATED
        );
    }

    /**
     * index
     *
     * @return AnonymousResourceCollection
     */
    public function index(Article $article): AnonymousResourceCollection
    {
        return CommentResource::collection(
            $this->commentService->getComments($article),
            Response::HTTP_OK
        );
    }
}
