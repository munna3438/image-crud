<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imaeCrudController;

Route::get("/",[imaeCrudController::class,"allProducts"])->name("products");
Route::get("/add-new-product",[imaeCrudController::class,"add_new_product"])->name("add.product");
Route::post("/store-product",[imaeCrudController::class,"storeProduct"])->name("sotre.product");