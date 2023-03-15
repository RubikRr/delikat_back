<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //'phone' => 'required|numeric|min:8|max:11', -Валидация номера телефона

    public function CreateExm(){
        $examples=[
            [
                "first_name"=>"Владимир",
            "last_name"=>"Чакалов",
            "phone_number"=>"89194273621",
            "street"=>"Коста",
            "house"=>292,
            "housing"=>1,
            "apartment"=>79
            ],
            [
                "first_name"=>"Эрик",
                "last_name"=>"Маргиев",
                "phone_number"=>"89187891452",
                "street"=>"Коста",
                "house"=>217,
                "housing"=>2,
                "apartment"=>51
            ],
            [
                "first_name"=>"Цаболов",
                "last_name"=>"Станислав",
                "phone_number"=>"89197891436",
                "street"=>"Джанаева",
                "house"=>74,
                "housing"=>3,
                "apartment"=>5
            ],
            [
                "first_name"=>"Мамсурова",
                "last_name"=>"Алина",
                "phone_number"=>"89184127963",
                "street"=>"Ватутина",
                "house"=>52,
                "housing"=>1,
                "apartment"=>80
            ]
        ];
        foreach ($examples as $example)
        {
            Customer::create($example);
        }
    }
}
