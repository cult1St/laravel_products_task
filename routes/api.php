<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/products/fetch_all", [ProductController::class, "getAllProducts"]);
Route::get('/products/get_by_user/{id}', [ProductController::class, "get_products_by_user"]);
