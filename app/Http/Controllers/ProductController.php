<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): Collection
    {

        return Product::all();
    }

    public function create()
    {


        return view('products.create');
    }

    public function store()
    {
        $data=request()->validate([
            'name'=>'string',
            'description'=>'string',
            'img'=>'string',
            'price'=>'integer'
        ]);
        Product::create($data);
        return redirect()->route("product.create");
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
