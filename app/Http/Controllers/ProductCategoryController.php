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

    function index()
    {
       return ProductCategory::all();

    }

     public function CreateExm()
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
}
