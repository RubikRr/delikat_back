<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use function Sodium\add;

class OrderProductController extends Controller
{

    function index()
    {
        return OrderProduct::all();
    }

    function getName($id)
    {
        $productName=Product::find($id)->name;
        return $productName;
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
                'order_id'=>2,
                'product_id'=>2,
                'quantity'=>100
            ],
            [
                'order_id'=>3,
                'product_id'=>1,
                'quantity'=>331
            ],
            [
                'order_id'=>4,
                'product_id'=>3,
                'quantity'=>534
            ],
            [
                'order_id'=>4,
                'product_id'=>4,
                'quantity'=>5134
            ]
        ];
        foreach ($examples as $example)
        {
            OrderProduct::create($example);

        }
        //return redirect()->route("main.index");
    }
}
