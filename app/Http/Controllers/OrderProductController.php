<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    function show($id)
    {
        $orderProducts=OrderProduct::where("order_id",$id)->get();
        return view("orderProducts.show",compact('orderProducts'));

    }

    function showAll()
    {
        $orderProducts=$this->index();
        //return $orderProducts;
        return view("orderProducts.showAll",compact('orderProducts'));

    }
    function index()
    {
        return OrderProduct::all();
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
