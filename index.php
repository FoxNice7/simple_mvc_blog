<?php

require_once __DIR__ . '/vendor/autoload.php';


$router = new App\Router();

$router
    ->get('/', [App\Controllers\PostController::class, 'index'])
    ->get('/post/index', [App\Controllers\PostController::class, 'index'])
    ->get('/post/create', [App\Controllers\PostController::class, 'create'])
    ->post('/post/create', [App\Controllers\PostController::class, 'create'])
    ->get('/post/edit/{id}', [App\Controllers\PostController::class, 'edit'])
    ->post('/post/edit/{id}', [App\Controllers\PostController::class, 'edit'])
    ->get('/post/delete/{id}', [App\Controllers\PostController::class, 'delete'])
    ->get('/comments/create/{id}', [App\Controllers\CommentsController::class, 'create'])
    ->post('/comments/create/{id}', [App\Controllers\CommentsController::class, 'create']);

$router->resolve();
