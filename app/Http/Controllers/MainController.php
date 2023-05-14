<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    public function index(){
            return view("layouts.main");
    }

    public function CreateExamples()
    {
        $this->CreateProductsCategories();
        $this->CreateProducts();
        $this->CreateOrders();
        $this->CreateOrderProducts();
        return redirect()->route("home");

    }
public function CreateProducts()
    {
        $examples=[
            [
                'name'=>'Фэри',
                'image'=>'/images/products/thumbnail/fairy.jpg',
                'quantity'=>100000,
                "category"=>1,
                'price'=>10,
                'description'=>"Крутое средство для мытья посуды"
            ],
            [
                'name'=>'Порошок',
                "category"=>1,
                'image'=>'/images/products/thumbnail/poroshok.webp',
                'quantity'=>100000,
                'price'=>100.00,
                'description'=>"Чистая одежда"

            ],
            [
                'name'=>'Подгузники',
                "category"=>4,
                'image'=>'/images/products/thumbnail/pampers.jpg',
                'quantity'=>100000,
                'price'=>200.00,
                'description'=>"Для милых детишек"
            ],
            [
                'name'=>'Бритва',
                "category"=>5,
                'image'=>'/images/products/thumbnail/hydro_5_skin_3.jpg',
                'quantity'=>100000,
                'price'=>100.00,
                'description'=>"Джилет лучше для мужчины нет"
            ]
        ];
        foreach ($examples as $example)
        {
            Product::create($example);

        }
    }

public function CreateOrders()
    {
        $examples=[
            [
                "first_name"=>"Александр",
                "last_name"=>"Петров",
                "phone_number"=>"89194273621",
                "email"=>"alex.petrov@list.ru",
                "confirmation"=>false,
                "street"=>"Коста",
                "house"=>292,
                "housing"=>1,
                "entrance"=>6,
                "apartment"=>79,
                'total'=>500
            ],
            [
                "first_name"=>"Петя",
                "last_name"=>"Смирнов",
                "phone_number"=>"89187891452",
                "email"=>"pet.smirnov@list.ru",
                "confirmation"=>false,
                "street"=>"Коста",
                "house"=>217,
                "housing"=>2,
                "entrance"=>3,
                "apartment"=>51,
                'total'=>7500
            ],
            [
                "first_name"=>"Вася",
                "last_name"=>"Иванов",
                "phone_number"=>"89197891436",
                "email"=>"vas.ivanov@list.ru",
                "street"=>"Джанаева",
                "confirmation"=>false,
                "house"=>74,
                "housing"=>3,
                "entrance"=>1,
                "apartment"=>5,
                'total'=>240
            ],
            [
                "first_name"=>"Катя",
                "last_name"=>"Увжикоева",
                "phone_number"=>"89184127963",
                "email"=>"kat.yv@list.ru",
                "confirmation"=>false,
                "street"=>"Ватутина",
                "house"=>52,
                "housing"=>1,
                "entrance"=>3,
                "apartment"=>80,
                'total'=>7000
            ]
        ];
        foreach ($examples as $example)
        {
            Order::create($example);
        }
    }

public function CreateOrderProducts()
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
                'quantity'=>75
            ],
            [
                'order_id'=>3,
                'product_id'=>1,
                'quantity'=>24
            ],
            [
                'order_id'=>4,
                'product_id'=>3,
                'quantity'=>20
            ],
            [
                'order_id'=>4,
                'product_id'=>4,
                'quantity'=>30
            ]
        ];
        foreach ($examples as $example)
        {
            OrderProduct::create($example);

        }

public function CreateProductsCategories()
    {
        $examples=[
            [
                
                'category'=>"Бытовая химия",
                 'image'=>'/images/categories/HC.webp'
            ],
            [
                'category'=>"Ватно-бумажная продукция",
                 'image'=>'/images/categories/TB.webp'
            ],
            [
                'category'=>"Гигиена полости рта",
                 'image'=>'/images/categories/PR.webp'
            ],
            [
               'category'=>"Детская гигиена",
                'image'=>'/images/categories/DG.jpg'
            ],
            [
               'category'=>"Мужское бритье",
                'image'=>'/images/categories/MB.webp'
            ]
        ];
        foreach ($examples as $example)
        {
            ProductCategory::create($example);
        }
    }

public function Clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        //Artisan::call('storage:link');
        return redirect()->route("home");
    }

public function DropDB()
    {
        Artisan::call('migrate:fresh');
        return redirect()->route("home");
    }
}
