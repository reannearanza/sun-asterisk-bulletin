<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\CreateArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleService $articleService
    )
    {   
    }

    /**
     * create
     *
     * @param CreateArticleRequest $request
     */
    public function store(CreateArticleRequest $request)
    {
        return ArticleResource::make(
                $this->articleService->createArticle($request->validated()),
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
        return ArticleResource::collection(
            Article::all(),
            Response::HTTP_OK
        );
    }

    /**
     * get
     *
     * @param Article $article
     * 
     * @return ArticleResource
     */
    public function show(Article $article): ArticleResource
    {
        return ArticleResource::make($article, Response::HTTP_OK);
    }

    /**
     * update
     *
     * @param Article $article
     * @param UpdateArticleRequest $request
     * 
     * @return ArticleResource
     */
    public function update(Article $article, UpdateArticleRequest $request): ArticleResource
    {
        return ArticleResource::make(
            $this->articleService->updateArticle($article, $request->validated()),
            Response::HTTP_OK
        );
    }

    /**
     * delete
     *
     * @param Article $article
     * 
     * @return Response
     */
    public function destroy(Article $article): Response
    {
        $article->delete();
        return JsonResponse::make(
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
