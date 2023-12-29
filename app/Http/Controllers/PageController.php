<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hero;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index(){
        $categories = Category::orderBy('order')->get();
        $herosFirst = Hero::where('order',1)->first();
        $restOfHeros = Hero::orderBy('order')->where('order', '>', '1')->get();
        return view('index',compact('categories','herosFirst','restOfHeros'));

    }
}
