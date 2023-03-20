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


//работают
Route::controller(MainController::class)->group(function (){
    Route::get('/','index')->name("main.index");
    Route::get('/create','CreateExamples');
    Route::get('/clear', "Clear");
    Route::get('/drop',"DropDB");

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
});

Route::controller(CustomerController::class)->group(function (){
   Route::get("/customers","index")->name("customer.index");
   Route::get("/customers/create","create")->name("customer.create");
   Route::post("/customers","store")->name("customer.store");
   Route::get("/customers/show/{customer}","show")->name("customer.show");
    Route::get("/customers/show/{customer}/edit","edit")->name("customer.edit");
    Route::patch("customers/{customer}","update")->name("customer.update");
   Route::delete('customers/{customer}',"destroy")->name("customer.delete")->withTrashed();

    Route::get("/customers/showFields/{customer}","showFields")->name("customer.showFields");
   Route::get("customers/restore/{customer}","restore")->name("customer.restore")->withTrashed();
   Route::get("/customers/showAll",'ShowAll')->name("customer.showAll");
});

Route::controller(OrderController::class)->group(function (){
   Route::get("orders","index")->name("order.index");
   Route::get("orders/show/{order}","show")->name('order.show');
    Route::get("orders/showAll","showAll")->name('order.showAll');

});
//Order_product
Route::controller(OrderProductController::class)->group(function (){

    Route::get("/order_products/index","GetOrders")->name("order_product.index");
    Route::get("/order_products/show/{id}","show")->name("order_product.show");
    Route::get("/order_products/showAll","showAll")->name("order_product.showAll");
});

//не работают

















//    Route::get("/products",function (){
//        return ProductResource::collection(Product::all());
//    })->name("product.index");
