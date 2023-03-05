<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return "Work Start";
});

Route::get('/greeting', function () {
    return 'Hello World';
});


Route::get("/products",[ProductController::class,'index']);
Route::get('/products/create',[ProductController::class,'create']);
Route::get('/products/show/{product}',[ProductController::class,'show']);
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
