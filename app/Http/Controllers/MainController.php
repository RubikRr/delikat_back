<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    public function index(){
            return view("layouts.main");
    }

    public function CreateExamples()
    {
        (new ProductController)->CreateExm();
        (new OrderController)->CreateExm();
        (new OrderProductController)->CreateExm();
        return redirect()->route("main.index");

    }
    public function Clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        //Artisan::call('storage:link');
        return redirect()->route("main.index");
    }

    public function DropDB()
    {
        Artisan::call('migrate:fresh');
        return redirect()->route("main.index");
    }
}
