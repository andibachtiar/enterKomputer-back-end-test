<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::resource("product", ProductController::class);

Route::resource("order", OrderController::class)
    ->missing(function() {
        return response()->json([
            "message" => "Model not found!"
        ], 404);
    });
