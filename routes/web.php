<?php

use App\Http\Controllers\OrderProductController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;


//работают
Route::get('/',[MainController::class,'index'])->name("main.index");
Route::get('/create',[MainController::class,'CreateExamples']);
Route::get('/clear', [MainController::class,"Clear"]);



Route::controller(ProductController::class)->group(function (){
    //CRUD
    Route::get("/products",'index')->name("product.index");
    Route::get('/products/create','create')->name("product.create");
    Route::get('/products/show/{product}','show')->name("product.show");
    Route::post('/products','store')->name("product.store");
    Route::get('/products/show/{product}/edit','edit')->name("product.edit");
    Route::patch('/products/{product}','update')->name("product.update");
    Route::delete('/products/{product}','destroy')->name("product.delete")->withTrashed();
    //Доп

    Route::get('/products/restore/{product}',[ProductController::class,'restore'])->withTrashed();
    Route::get("/products/showAll",[ProductController::class,'ShowAll'])->name("product.showAll");
});



//Order_product
Route::controller(OrderProductController::class)->group(function (){

    Route::get("/order_product/getAll","GetOrders");
    Route::get("/order_product/show/{orderProduct}","show");
});

//не работают

















//    Route::get("/products",function (){
//        return ProductResource::collection(Product::all());
//    })->name("product.index");
