<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function ShowAll(){
        $products=$this->index();
        return view("products.showAll",compact("products"));
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
        return view("products.show",compact("product"));
    }
    public function  edit(Product $product)
    {
        return view("products.edit",compact("product"));
    }

    public  function  update(Product $product){

        $data=request()->validate([
            "name"=>"string",
            "description"=>"string",
            "img"=>"string",
            "price"=>"integer"
        ]);
        $product->update($data);
        return redirect()->route("product.show",$product->id);
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route("main.index");
    }
    public function restore($id){
        $product=Product::withTrashed()->find($id);
        $product->restore();
        return redirect()->route("product.showall");
    }

}



