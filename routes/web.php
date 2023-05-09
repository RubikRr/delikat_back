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



Route::controller(MainController::class)->group(function (){
    Route::get('/main','index')->name("main.index")->middleware("admin");;
    Route::get('/create','CreateExamples')->middleware("admin");;
    Route::get('/clear', "Clear")->middleware("admin");;
    Route::get('/drop',"DropDB")->middleware("admin");;

});

Route::controller(ProductCategoryController::class)->group(function (){
Route::get("/productCategories","index")->name("category.index");
});

Route::controller(ProductController::class)->group(function (){
    //CRUD
    Route::get("/products",'index')->name("product.index");
    Route::get('/products/create','create')->name("product.create")->middleware("admin");
    Route::get('/products/show/{product}','show')->name("product.show")->middleware("admin");
    Route::post('/products','store')->name("product.store")->middleware("admin");
    Route::get('/products/show/{product}/edit','edit')->name("product.edit")->middleware("admin");
    Route::patch('/products/{product}','update')->name("product.update")->middleware("admin");
    Route::delete('/products/{product}','destroy')->name("product.delete")->withTrashed()->middleware("admin");
    //Доп

    Route::get('/products/showFields/{product}','showFields')->name("product.showFields")->middleware("admin");
    Route::get('/products/restore/{product}','restore')->withTrashed()->middleware("admin");
    Route::get("/products/showAll",'ShowAll')->name("product.showAll")->middleware("admin");;
    Route::get("/products/showCategories/{index}",'ShowProductsCategories')->name("product.showCategories")->middleware("admin");
     Route::get("/products/getCategories/{index}",'GetProductsOnCategories')->name("product.getProductsOnCategories");
});


Route::controller(OrderController::class)->group(function (){
    //работает
    Route::get("orders","index")->name("order.index")->middleware("admin");
    Route::get("orders/show/{order}","show")->name('order.show')->middleware("admin");
    Route::post("orders","store")->name("order.store")->middleware("admin");

    Route::get("orders/showAll","showAll")->name('order.showAll')->middleware("admin");
    Route::delete('/orders/{order}','destroy')->name("order.delete")->withTrashed()->middleware("admin");

    //не работает

    Route::get('/orders/show/{order}/edit','edit')->name("order.edit")->middleware("admin");
    Route::patch('/orders/{order}','update')->name("order.update")->middleware("admin");
    Route::patch('/orders/decrease/{order}','DecreaseQuantityProducts')->name("order.decrease")->middleware("admin");
    Route::get("orders/date/{index}","getOrders")->name("orders.getDates")->middleware("admin");
});
//Order_product
Route::controller(OrderProductController::class)->group(function (){

    Route::get("/orderProducts","index")->name("orderProduct.index")->middleware("admin");
    Route::get("/orderProducts/showProducts","showProducts")->name("orderProduct.show")->middleware("admin");
    Route::get("/orderProducts/showAll","showAll")->name("orderProduct.showAll")->middleware("admin");
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
