<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use function Sodium\add;

class OrderProductController extends Controller
{
    function getName($id)
    {
        $product=Product::withTrashed()->where("id","=",$id)->first();
        return $product->name;
    }    
}
