<?php
// Controllers
Controller('User');
Controller('Post');


// user
Route::get('/', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

Route::post('/user/post-create', [UserController::class, 'postCreate']);
Route::post('/user/post-edit/{id}', [UserController::class, 'postEdit']);

// post
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'create']);

Route::post('/post/post-create', [PostController::class, 'postCreate']);
Route::get('/post/edit/{id}', [PostController::class, 'edit']);
Route::post('/post/post-edit/{id}', [PostController::class, 'postEdit']);
Route::get('/post/delete/{id}', [PostController::class, 'delete']);
