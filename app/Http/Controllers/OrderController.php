<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }
    public function show(Order $order)
    {
        $customer=Customer::find($order->customer_id);
        //$products=(new OrderProductController)->show($order->id);
        //return $products;
        return view('orders.show',compact("order","customer"));
    }

    public function showAll()
    {
        $orders=$this->index();
        return view("orders.showAll",compact('orders'));
    }
    public function CreateExm()
    {
        $examples=[
            [
                'customer_id'=>1,
            ],

            [
                'customer_id'=>2,
            ],
        ];
        foreach ($examples as $example)
        {
            Order::create($example);
        }
    }
}
