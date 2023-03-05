<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public  function index(): Collection
    {

        return Product::all();
    }

    public  function  create(){
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

            ],
            [
                'name'=>"Бумага туалетная",
                'description'=>"Рулон бумаги всегда нужен",
                'img'=>"image3",
                'price'=>37
            ]
        ];
        foreach ($products as $product)
        {
            Product::create($product);
        }
        dump("Create OK");
    }

    public  function show(Product $product)//$id return Product::find($id)
    {
        //dump($product);
        return $product;
    }

    public function Destroy(Product $product){
        $product->delete();
        //dump($product);
        dump('Delete OK');
    }
    public function restore($id){
        $product=Product::withTrashed()->find($id);
        $product->restore();
        dump($product);
        dump('Restore OK');
    }
}
//    public function  edit(Product $product)
//    {
//        return $product;
//    }

//    public  function  update(Product $product){
//        $product->update([
//            'name'=>"Порошок",
//            'price'=>1000,
//        ]);
//        dump("Update OK");
//    }
