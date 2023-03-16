<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //,
    function index(){
        return Customer::all();
    }
    function create(){
        return view("customers.create");
    }

    function store(){

        $customer=request()->validate([
            'first_name'=>'string',
            'last_name'=>'string',
            'phone_number' =>'string',//'required|numeric|min:6|max:11', -Валидация номера телефона
            'street'=>'string',
            'house'=>'integer',
            'housing'=>'integer',
            'entrance'=>'integer',
            'apartment'=>'integer'
        ]);
        Customer::create($customer);
        return redirect()->route("customer.showAll");
    }
    function show(Customer $customer){

        return view("customers.show",compact("customer"));
    }

    public  function update(Customer $customer){

        $data=request()->validate([
            'first_name'=>'string',
            'last_name'=>'string',
            'phone_number' =>'string',//'required|numeric|min:6|max:11', -Валидация номера телефона
            'street'=>'string',
            'house'=>'integer',
            'housing'=>'integer',
            'entrance'=>'integer',
            'apartment'=>'integer'
        ]);
        $customer->update($data);
        return redirect()->route("customer.show",$customer->id);
    }
    function edit(Customer $customer){
        return view("customers.edit",compact("customer"));
    }
    function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route("customer.showAll");
    }
    function restore(Customer $customer){
        $customer->restore();
        return redirect()->route("customer.showAll");
    }

public function showAll(){
        $customers=$this->index();
        return view("customers.showAll",compact("customers"));
}


    public function CreateExm(){
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
            Customer::create($example);
        }
    }
}
