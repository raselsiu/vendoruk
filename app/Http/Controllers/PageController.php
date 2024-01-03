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
        $categories = Category::orderBy('order')->get();
        
        // Hero
        $herosFirst = Hero::where('order',1)->first();
        $restOfHeros = Hero::orderBy('order')->where('order', '>', '1')->get();

        // Products
         $products = Product::where('','')->orderBy('order')->get();


        return view('index',compact('categories','herosFirst','restOfHeros'));

    }

    
     
}
