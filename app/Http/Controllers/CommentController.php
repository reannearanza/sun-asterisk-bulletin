<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;
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
    public function store(CreateCommentRequest $request): CommentResource
    {
        return CommentResource::make(
            $this->commentService->createComment($request->validated()),
            Response::HTTP_CREATED
        );
    }

    /**
     * index
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CommentResource::collection(
            Comment::all()->orderBy('createdAt', 'desc'),
            Response::HTTP_OK
        );
    }
}
