<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;


//работают
Route::get('/',[MainController::class,'index'])->name("main.index");


Route::get("/products",[ProductController::class,'index'])->name("product.index");
Route::get('/products/create',[ProductController::class,'create'])->name("product.create");
Route::get('/products/show/{product}',[ProductController::class,'show'])->name("product.show");
Route::post('/products',[ProductController::class,'store'])->name("product.store");
Route::get('/products/show/{product}/edit',[ProductController::class,'edit'])->name("product.edit");
Route::patch('/products/{product}',[ProductController::class,'update'])->name("product.update");
Route::delete('/products/{product}',[ProductController::class,'destroy'])->name("product.delete");

Route::get('/products/createExm',[ProductController::class,'CreateExm']);
Route::get('/products/restore/{product}',[ProductController::class,'restore']);
Route::get("/products/showAll",[ProductController::class,'ShowAll'])->name("product.showAll");

Route::get("/order_product/createExm",[\App\Http\Controllers\OrderProductController::class,"CreateExm"]);
Route::get("/order_product/get",[\App\Http\Controllers\OrderProductController::class,"GetProducts"]);
Route::get("/order_product/get/{product}",[\App\Http\Controllers\OrderProductController::class,"GetProducts"]);
//не работают










Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});
