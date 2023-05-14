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
}
