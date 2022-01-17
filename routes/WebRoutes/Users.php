<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCommentController;


Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);
Route::resource('users.comments', UserCommentController::class)->only(['store']);
