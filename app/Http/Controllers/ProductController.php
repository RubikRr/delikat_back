<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public  function GetProducts(){
        $products=Product::all();
        $products->each(function($product) // foreach($posts as $post) { }
        {
            $name=$product->name;
            $description=$product->description;
            $img=$product->img;
            $price=$product->price;
            dump($name." ". $description." ". $price." ".$img);//do something
        });
    }

    public  function  Create(){
        $products=[
            [
                'name'=>"Фэри",
                'description'=>"Средство для мытья посуды",
                'img'=>"image1",
                'price'=>57

            ],
            [
                'name'=>"Шумовит",
                'description'=>"Средство от жира",
                'img'=>"image2",
                'price'=>85

            ]
        ];
        foreach ($products as $product)
        {

            Product::create($product);
        }
        dump("Create OK");
    }

    public  function  Update(){
        $id=2;
        $product=Product::find($id);
        $product->update([
            'name'=>"Порошок",
            'price'=>1000,
        ]);
        dump("Update OK");
    }
    public function Delete(){
        $id=2;
        $product=Product::find($id);
        $product->delete();

        dump('Delete OK');
    }
    public function Restore(){
        $id=2;
        $product=Product::withTrashed()->find($id);
        $product->restore();
        dump('Restore OK');
    }
}
