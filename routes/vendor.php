<?php

use App\Http\Controllers\Vendor\CategoryController;
use App\Http\Controllers\Vendor\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\MenuController;

Route::group([
    "prefix" => "vendor",
    "as" => "vendor.",
    "middleware" => ["auth"],
], function () {
    Route::get("menu", [MenuController::class, "index"])->name("menu");
    Route::resource("categories",CategoryController::class);
    Route::resource("products",ProductController::class);
});
