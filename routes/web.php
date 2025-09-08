<?php

use App\Http\Middleware\NotificationMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\ValidateRequestMiddleware;
use App\Http\Middleware\IdempotencyMiddleware;

Route::middleware([ValidateRequestMiddleware::class, IdempotencyMiddleware::class, NotificationMiddleware::class])
    ->post('/', [AppController::class, 'app'])
    ->withoutMiddleware(VerifyCsrfToken::class);
