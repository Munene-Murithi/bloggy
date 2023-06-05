<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('post', [PostController::class, 'index']);
Route::post('post', [PostController::class, 'store']);
Route::get('post/{id}', [PostController::class, 'show']);
Route::get('post/{id}/edit', [PostController::class, 'edit']);
Route::put('post/{id}', [PostController::class, 'update']);
Route::delete('post/{id}/delete', [PostController::class, 'destroy']);



