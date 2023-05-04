<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    function getCategory($id)
    {
        $productCategory=ProductCategory::find($id)->category;
        return $productCategory;
    }

     public function CreateExm()
    {
        $examples=[
            [
                
                'category'=>"Бытовая химия"
            ],
            [
                'category'=>"Ватно-бумажная продукция"
            ],
            [
                'category'=>"Гигиена полости рта"
            ],
            [
               'category'=>"Товары для детской гигиены"
            ],
            [
               'category'=>"Товары для мужского бриться"
            ]
        ];
        foreach ($examples as $example)
        {
            ProductCategory::create($example);

        }
    }
}
