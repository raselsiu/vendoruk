<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hero;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index(){

        // Category
        // $categories = Category::orderBy('order')->get();
        
        // Hero
        $herosFirst = Hero::where('order',1)->first();
        $restOfHeros = Hero::orderBy('order')->where('order', '>', '1')->get();

        // Products
        $upComingProducts = Product::where('status','upcoming')->orderBy('order')->get();

        // Products
        $newProducts = Product::where('status','latest')->orderBy('order')->get();


        return view('index',compact('herosFirst','restOfHeros','upComingProducts','newProducts'));

    }


    // view Products

    function showProduct($slug){
        $product = Product::where('slug',$slug)->firstOrFail();
        return view('pages.product_details',compact('product'));
    }

    
     
}
