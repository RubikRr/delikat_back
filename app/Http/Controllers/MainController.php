<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view("layouts.main");
    }

    public function CreateExamples()
    {
        (new ProductController)->CreateExm();
        (new OrderProductController)->CreateExm();
        (new CustomerController())->CreateExm();
        dump("ok");
    }


}
