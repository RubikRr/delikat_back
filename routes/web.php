<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;


//работают
Route::get('/main',[MainController::class,'index'])->name("main.index");


Route::get("/products",[ProductController::class,'index']);
Route::get('/products/create',[ProductController::class,'create'])->name("product.create");
Route::get('/products/show/{product}',[ProductController::class,'show']);
Route::post('/products',[ProductController::class,'store'])->name("product.store");

//не работают



//Route::get('/products/show/{product}/edit',[ProductController::class,'edit']);
//Route::patch('/products/show/{product}',[ProductController::class,'update']);
Route::get('/products/delete/{product}',[ProductController::class,'destroy']);
Route::get('/products/restore/{product}',[ProductController::class,'restore']);





Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});
