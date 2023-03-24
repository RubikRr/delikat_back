<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use function Sodium\add;

class OrderProductController extends Controller
{
    function show($id)
    {
        $orderProducts=OrderProduct::where("order_id",$id)->get();
        $products=[];
        foreach ($orderProducts as $orderProduct)
        {

            $product=[Product::find($orderProduct->product_id),$orderProduct->quantity];
            array_push($products,$product);
        }

        return view("orderProducts.show",compact('orderProducts','products'));

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
