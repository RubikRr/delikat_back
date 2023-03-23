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
        return $product['image'];
        $product['image']->move(Storage::path('/public/images/products/').'original',$filename);


        $product['image']="/images/products/thumbnail".$filename;
        Product::create($product);
        return redirect()->route("product.showAll");
    }

    public  function show(Product $product)//$id return Product::find($id)
    {
       return view("products.show",compact("product"));
    }
    public  function showFields(Product $product)
    {
        return view("products.showFields",compact("product"));
    }
    public function edit(Product $product)
    {
        return view("products.edit",compact("product"));
    }

    public  function update(Product $product){

        $data=request()->validate([
            "name"=>"string",
            "description"=>"string",
            "image"=>"Image",
            "price"=>"integer"
        ]);
        $filename=$data['image']->getClientOriginalName();
        $data['image']->move(Storage::path('/public/images/products/'),$filename);
        $data['image']="/images/products/".$filename;

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

                'image'=>'/images/products/corgi_samurai.png',
                'price'=>76,
                'description'=>"Крутой средство для мытья посуды"
            ],
            [
                'name'=>'Порошок',

                'image'=>'/images/products/corgi.png',
                'price'=>100,
                'description'=>"Чистая одежда"

            ],
            [
                'name'=>'Подгузники',

                'image'=>'/images/products/wolf.png',
                'price'=>200,
                'description'=>"Для спиногрызов"
            ],
            [
                'name'=>'Бритва',

                'image'=>'/images/products/corgi.png',
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



