<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
            $orderPr=[
                'order_id'=>$order->id,
                'product_id'=>Product::find($orderProduct['product_id'])->id,

                'quantity'=>$orderProduct['quantity']
            ];
            OrderProduct::create($orderPr);
        }
        redirect()->route("order.showAll");
        return response('CAPIBARA', 200)
            ->header('Content-Type', 'text/plain');
        
    }
    
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("order.showAll");
    }
    public function GetSumm ($orders)
    {
        $ans=0;
        foreach($orders as $order) {
            $ans+=$order->total;
        }
        return $ans;
    }
    public function showAll()
    {
        $orders=$this->index()->sortByDesc('created_at');
        $sum=$this->GetSumm($orders);
        return view("orders.showAll",compact("orders","sum"));
    }
    public function statusNotConfirmed(Request $request)
    {

        $orders=Order::where('confirmation','=',0)->get()->sortByDesc('created_at');
        $sum=$this->GetSumm($orders);
        return view("orders.showAll",compact("orders","sum"));
        /* $ordersId = $request->input('my_data');
        
         $orders=array();
         if (is_null($ordersId)){
                $orders=$this->index();
                $sum=$this->GetSumm($orders);
                return view("orders.showAll",compact("orders","sum"));
         }
         foreach ($ordersId as $orderId) {
            $order=Order::find($orderId);
            if($order->confirmation ==0){
                array_push($orders, $order);
            }
                             
            
         }
         $sum=$this->GetSumm($orders);
         return view("orders.showAll",compact("orders","sum"));*/
    }
     public function statuConfirmed(Request $request)
    {
        $orders=Order::where('confirmation','=',1)->get()->sortByDesc('created_at');
        $sum=$this->GetSumm($orders);
        return view("orders.showAll",compact("orders","sum"));
        /* $ordersId = $request->input('my_data');
         $orders=array();
         if (is_null($ordersId)){
                $orders=$this->index();
                $sum=$this->GetSumm($orders);
                return view("orders.showAll",compact("orders","sum"));
         }
         foreach ($ordersId as $orderId) {
            $order=Order::find($orderId);
            if($order->confirmation ==1){
                array_push($orders, $order);
            }
                             
            
         }
         $sum=$this->GetSumm($orders);
         return view("orders.showAll",compact("orders","sum"));*/
    }
    public function DecreaseQuantityProducts(Order $order)
    {
        if ($order['confirmation'] == 1) {
            //return redirect()->route("order.show",compact("order"));
            return redirect()->route("order.showAll");
        }
        else
        {
       
        $orderProducts=OrderProduct::where("order_id","=","$order->id")->get();
         foreach ($orderProducts as $orderProduct){
                $pr_id=$orderProduct['product_id'];
                $product=Product::find($pr_id);
                $quantity=$orderProduct['quantity'];
                $product["quantity"]=$product["quantity"]-$quantity;
                $product->update();

            }
        $order['confirmation']=true;
        $order->update();
        return redirect()->route("order.showAll");

        }

        //return redirect()->route("order.show",compact("order"));
    }
    public function getOrders($index)
    {

        $mytime = Carbon::now();
         
                    switch ($index) {
                case 1:
                    $orders=Order::whereDate('created_at', Carbon::today()->toDateString())->get()->sortByDesc('created_at');
                     $sum=$this->GetSumm($orders);
                    return view("orders.showAll",compact("orders","sum"));
                    break;
                case 2:
                    $orders=Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->sortByDesc('created_at');
                     $sum=$this->GetSumm($orders);
                    return view("orders.showAll",compact("orders","sum"));
                    break;
                case 3:
                    $orders=Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get()->sortByDesc('created_at');
                     $sum=$this->GetSumm($orders);
                    return view("orders.showAll",compact("orders","sum"))->sortByDesc('created_at');
                    break;
                case 4:
                    $orders=Order::whereYear('created_at', Carbon::today()->year)->get()->sortByDesc('created_at');
                    $sum=$this->GetSumm($orders);
                    return view("orders.showAll",compact("orders","sum"));
                    break;
            }
       
    }
    public function getOrdersStatus($orders)
    {
        
    }
}