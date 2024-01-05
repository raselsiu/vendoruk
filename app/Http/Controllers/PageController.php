<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hero;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class PageController extends Controller
{
    function index(){

        //Category
        $categories = Category::all();
        
        // Hero First
        $herosFirst = Hero::where('order',1)->first();
        
        // Rest Of Heros
        $restOfHeros = Hero::orderBy('order')->where('order', '>', '1')->get();

        // Products
        $upComingProducts = Product::where('status','upcoming')->orderBy('order')->get();

        // Products
        $newProducts = Product::where('status','latest')->orderBy('order')->get();

        // Masonary Filtering with categoty
        $filterData = DB::table('products')
        ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.name','categories.slug as catslug','products.title','products.image','products.price','products.slug')
        ->get();

        // All News
        $news = News::all();

        return view('index',compact('herosFirst','restOfHeros','upComingProducts','newProducts','filterData','categories','news'));
    }


    // view Products

    function showProduct($slug){

        $product = Product::where('slug',$slug)->firstOrFail();

        $relatedProducts = DB::table('products')->select('products.*')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.id', '=', $product->category_id)
            ->where('products.slug', '!=', $product->slug)
            ->get();


        return view('pages.product_details',compact('product','relatedProducts'));
    }

    
     
}
