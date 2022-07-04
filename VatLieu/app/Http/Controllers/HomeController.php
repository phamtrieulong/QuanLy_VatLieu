<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all(); 
        return view('frontend/index', compact('products','categories','brands'));
    }
    public function products()
    {
        $categories = Category::all();
        $brands = Brand::all(); 
        $products = Product::all();
        return view('frontend/product', compact('products','categories','brands'));
    }
    
}
