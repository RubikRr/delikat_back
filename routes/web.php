<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return "Work Start";
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/erik',function(){
    return 'erikdjil';
});

Route::get('/product/create',[ProductController::class,'Create']);
Route::get('/product/update',[ProductController::class,'Update']);
Route::get('/product/delete',[ProductController::class,'Delete']);
Route::get('/product/restore',[ProductController::class,'Restore']);

Route::get("/getproducts",[ProductController::class,'GetProducts']);



Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});
