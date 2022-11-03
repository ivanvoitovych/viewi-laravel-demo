<?php

use Components\Models\PostModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts/{id}', function ($id) {
    $postModel          = new PostModel();
    $postModel->Id      = (int)$id;
    $postModel->Name    = 'Laravel ft. Viewi';
    $postModel->Version = 1;
    return new JsonResponse($postModel);
});
