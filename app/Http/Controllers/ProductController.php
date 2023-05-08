<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;


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


    public function store(ProductRequest $request)
    {

        $product=$request->validated();
        $filename=$product['image']->getClientOriginalName();

        $image= $request->file("image")->getRealPath();
        $image_resize = Image::make($image);
        $image_resize->fit(500);
        $image_resize->save(Storage::path('/public/images/products/').'thumbnail/'.$filename);

        $product['image']->move(Storage::path('/public/images/products/').'original/',$filename);


        $product['image']="/images/products/thumbnail/".$filename;
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

    public  function update(ProductRequest $request,Product $product){

        $data=$request->validated();
       $filename=$data['image']->getClientOriginalName();

        $image= $request->file("image")->getRealPath();
        $image_resize = Image::make($image);
        $image_resize->fit(500);
        $image_resize->save(Storage::path('/public/images/products/').'thumbnail/'.$filename);

        $data['image']->move(Storage::path('/public/images/products/').'original/',$filename);


        $data['image']="/images/products/thumbnail/".$filename;
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

                'image'=>'/images/products/thumbnail/fairy.jpg',
                'quantity'=>10000,
                "category"=>1,
                'price'=>999999.99,
                'description'=>"Крутой средство для мытья посуды"
            ],
            [
                'name'=>'Порошок',
                "category"=>1,
                'image'=>'/images/products/thumbnail/poroshok.webp',
                'quantity'=>10000,
                'price'=>100.4,
                'description'=>"Чистая одежда"

            ],
            [
                'name'=>'Подгузники',
                "category"=>4,
                'image'=>'/images/products/thumbnail/pampers.jpg',
                'quantity'=>10000,
                'price'=>200.99,
                'description'=>"Для милых детишек"
            ],
            [
                'name'=>'Бритва',
                "category"=>5,
                'image'=>'/images/products/thumbnail/hydro_5_skin_3.jpg',
                'quantity'=>10000,
                'price'=>1000.99,
                'description'=>"Джилет лучше для мужчины нет"
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
     public function ShowProductsCategories($id){
        $products=Product::where("category","=",$id)->get();
        return view("products.showAll",compact("products"));
    }

    public function GetProductsOnCategories($id){
        $products=Product::where("category","=",$id)->get();
        return $products;
    }
}



