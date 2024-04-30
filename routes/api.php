<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UpvoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
  Route::put('/articles/{article}/upvote', [UpvoteController::class, 'toggleUpVote']);

  Route::name('comments.')->group(function () {
    Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('store');
    Route::get('/articles/{article}/comments', [CommentController::class, 'index'])->name('index');
  });

  Route::name('articles.')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('index');
    Route::post('/articles', [ArticleController::class, 'store'])->name('store');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('show');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('destroy');
  });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
