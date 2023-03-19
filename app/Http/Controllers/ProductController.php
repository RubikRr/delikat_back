<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {

        $product=$request->validate([
            'name'=>'string',
            'description'=>'string',
            'image'=>'Image',
            'price'=>'integer'
        ]);






        $filename=$product['image']->getClientOriginalName();
        //Сохраняем оригинальную картинку
        $product['image']->move(Storage::path('/public/images/products/').'original/',$filename);



        $product['image']=$filename;
        Product::create($product);
        return redirect()->route("product.showAll");
    }

    public  function show(Product $product)//$id return Product::find($id)
    {
       return view("products.show",compact("product"));
    }
    public function edit(Product $product)
    {
        return view("products.edit",compact("product"));
    }

    public  function update(Product $product){

        $data=request()->validate([
            "name"=>"string",
            "description"=>"string",
            "image"=>"string",
            "price"=>"integer"
        ]);
        $product->update($data);
        return redirect()->route("product.show",$product->id);
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route("product.showAll");
    }


    public function restore(Product $product){
        $product->restore();
        return redirect()->route("product.showAll");
    }
    public function CreateExm()
    {
        $examples=[
            [
                'name'=>'Фэри',

                'image'=>'img1',
                'price'=>76,
                'description'=>"Крутой средство для мытья посуды"
            ],
            [
                'name'=>'Порошок',

                'image'=>'img2',
                'price'=>100,
                'description'=>"Чистая одежда"

            ],
            [
                'name'=>'Подгузники',

                'image'=>'img3',
                'price'=>200,
                'description'=>"Для спиногрызов"
            ],
            [
                'name'=>'Бритва',

                'image'=>'img4',
                'price'=>1000,
                'description'=>"Джилет лучще для мужчины нет"
            ]
        ];
        foreach ($examples as $example)
        {
            Product::create($example);

        }
    }

    public function ShowAll(){
        $products=$this->index();
        return view("products.showAll",compact("products"));
    }
}



