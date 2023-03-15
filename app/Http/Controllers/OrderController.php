<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
