<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return "Work Start";
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/erik',function(){
    return 'erikdjil';
});
Route::get("/getproducts",[ProductsController::class,'GetProducts']);
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});
