<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
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
        $orderProducts=OrderProduct::where("order_id",$order->id)->get();

        return view("orders.show",compact("order","orderProducts"));
    }
    public function store(OrderRequest $request)
    {
        $dataOrder=$request->validated();
        $order=Order::create($dataOrder);
        $orderProducts=$request->validate([
            'order_products.*.product_id'=>'Integer',
            'order_products.*.quantity'=>'Integer',
        ]);
        foreach ($orderProducts['order_products'] as $orderProduct)
        {
            $orderProduct=[
              'order_id'=>$order->id,
                'product_id'=>$orderProduct['product_id'],

              'quantity'=>$orderProduct['quantity']
            ];
            OrderProduct::create($orderProduct);
        }
        return redirect()->route("order.showAll");
    }
    public function edit()
    {
        return redirect()->route("order.showAll");
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("order.showAll");
    }
    public function showAll()
    {
        $orders=$this->index();
        return view("orders.showAll",compact("orders"));
    }
    public function CreateExm()
    {
        $examples=[
            [
                "first_name"=>"Владимир",
                "last_name"=>"Чакалов",
                "phone_number"=>"89194273621",
                "street"=>"Коста",
                "house"=>292,
                "housing"=>1,
                "entrance"=>6,
                "apartment"=>79
            ],
            [
                "first_name"=>"Эрик",
                "last_name"=>"Маргиев",
                "phone_number"=>"89187891452",
                "street"=>"Коста",
                "house"=>217,
                "housing"=>2,
                "entrance"=>3,
                "apartment"=>51
            ],
            [
                "first_name"=>"Станислав",
                "last_name"=>"Цаболов",
                "phone_number"=>"89197891436",
                "street"=>"Джанаева",
                "house"=>74,
                "housing"=>3,
                "entrance"=>1,
                "apartment"=>5
            ],
            [
                "first_name"=>"Алина",
                "last_name"=>"Мамсурова",
                "phone_number"=>"89184127963",
                "street"=>"Ватутина",
                "house"=>52,
                "housing"=>1,
                "entrance"=>3,
                "apartment"=>80
            ]
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
