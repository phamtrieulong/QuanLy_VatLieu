<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    function show(){
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all(); 
        return view('frontend.cart', compact('products','categories','brands'));
    }

    function add($id){
        $product = Product::find($id);

        
    }
}
