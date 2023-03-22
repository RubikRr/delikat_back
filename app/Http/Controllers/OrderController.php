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
    public function store(Request $request)
    {
        $customer=$request->customer[0];
        $requestCustomer=new Request($customer);
        (new CustomerController)->store($requestCustomer);
        return ("ok");
        //Customer::create($customer);
        return redirect()->route("customer.showAll");
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
//{
//    "first_name":"Вова",
//  "last_name":"Чакалов",
//  "phone_number":"89194273622",
//  "street":"Коста",
//  "house":278,
//  "housing":1,
//  "entrance":6,
//  "apartment":80,
//
//  "order_products":
//  [
//    {
//        "product_id":1,
//      "quantity":612
//    },
//    {
//        "product_id":2,
//      "quantity":684
//    }
//  ]
//}
