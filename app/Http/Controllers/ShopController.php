<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();
        $products = Product::all();

        return view('shop.shop', [
            'productTypes' => $productTypes,
            'products' => $products,
        ]);
    }

    public function showProductType($product_type)
    {
        $product_type = ProductType::where('type_name', $product_type)->first();

        $products_type = ProductType::all();

        $products = ProductType::find($product_type->id)->products;

        return view('shop.shop', [
            'products' => $products,
            'productTypes' => $products_type,
        ]) ;
    }

    public function showProduct()
    {

    }



}
