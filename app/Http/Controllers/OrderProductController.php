<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    function GetProducts(Product $product)
    {
        $data=OrderProduct::where("product_id",$product->id)->get();
        return $data;

    }


    public function CreateExm()
    {
        $examples=[
            [
                'order_id'=>1,
                'product_id'=>1,
                'quantity'=>50
            ],
            [
                'order_id'=>1,
                'product_id'=>2,
                'quantity'=>50
            ],
            [
                'order_id'=>1,
                'product_id'=>3,
                'quantity'=>50
            ],
            [
                'order_id'=>2,
                'product_id'=>3,
                'quantity'=>50
            ],
            [
                'order_id'=>2,
                'product_id'=>4,
                'quantity'=>50
            ]
        ];
        foreach ($examples as $example)
        {
            OrderProduct::create($example);

        }
        //return redirect()->route("main.index");
    }
}
