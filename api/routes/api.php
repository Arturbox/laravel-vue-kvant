<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'statement'], function (Router $router) {
    $router->post('/', [FeedbackController::class, 'store']);
});

