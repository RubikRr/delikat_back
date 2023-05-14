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


//Route::middleware('admin')->group(function (){
    Route::prefix('admin')->group(function (){
        Route::controller(MainController::class)->group(function (){
            //Route::get('/main','index')->name("main.index");
            Route::get('/create','CreateExamples');;
            Route::get('/clear', "Clear");
            Route::get('/drop',"DropDB");

        });
    });
//});

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
        Route::get("/products/showAll",'ShowAll')->name("product.showAll")->middleware("admin"); 
        Route::get("/products/showCategories/{index}",'ShowProductsCategories')->name("product.showCategories");
         Route::get("/products/getCategories/{index}",'GetProductsOnCategories')->name("product.getProductsOnCategories");
    });
//Route::middleware('admin')->group(function (){
    //Route::prefix('admin')->group(function (){
        Route::controller(OrderController::class)->group(function (){
            //работает
            Route::get("orders","index")->name("order.index");
            Route::get("orders/show/{order}","show")->name('order.show');
            Route::post("orders","store")->name("order.store");

            Route::get("orders/showAll","showAll")->name('order.showAll')->middleware("admin");
            Route::delete('/orders/{order}','destroy')->name("order.delete")->withTrashed();
           // Route::get("orders/byStatus/{orders}","status")->name("order.status");
            

            Route::patch('/orders/{order}','update')->name("order.update");
            Route::patch('/orders/decrease/{order}','DecreaseQuantityProducts')->name("order.decrease");
            Route::get("orders/date/{index}","getOrders")->name("orders.getDates");
        });
    //});
//});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
