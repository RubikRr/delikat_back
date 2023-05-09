<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;


Route::get("/",[HomeController::class,"index"]);

Route::controller(MainController::class)->group(function (){
    Route::get('/main','index')->name("main.index");
    Route::get('/create','CreateExamples');
    Route::get('/clear', "Clear");
    Route::get('/drop',"DropDB");

});

Route::controller(ProductCategoryController::class)->group(function (){
Route::get("/productCategories","index")->name("category.index");
});

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

    Route::get('/products/showFields/{product}','showFields')->name("product.showFields");
    Route::get('/products/restore/{product}','restore')->withTrashed();
    Route::get("/products/showAll",'ShowAll')->name("product.showAll");
    Route::get("/products/showCategories/{index}",'ShowProductsCategories')->name("product.showCategories");
     Route::get("/products/getCategories/{index}",'GetProductsOnCategories')->name("product.getProductsOnCategories");
});


Route::controller(OrderController::class)->group(function (){
    //работает
    Route::get("orders","index")->name("order.index");
    Route::get("orders/show/{order}","show")->name('order.show');
    Route::post("orders","store")->name("order.store");

    Route::get("orders/showAll","showAll")->name('order.showAll');
    Route::delete('/orders/{order}','destroy')->name("order.delete")->withTrashed();

    //не работает

    Route::get('/orders/show/{order}/edit','edit')->name("order.edit");
    Route::patch('/orders/{order}','update')->name("order.update");
    Route::patch('/orders/decrease/{order}','DecreaseQuantityProducts')->name("order.decrease");
    Route::get("orders/date/{index}","getOrders")->name("orders.getDates");
});
//Order_product
Route::controller(OrderProductController::class)->group(function (){

    Route::get("/orderProducts","index")->name("orderProduct.index");
    Route::get("/orderProducts/showProducts","showProducts")->name("orderProduct.show");
    Route::get("/orderProducts/showAll","showAll")->name("orderProduct.showAll");
});

//не работают

















//    Route::get("/products",function (){
//        return ProductResource::collection(Product::all());
//    })->name("product.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
