<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        return view('front.index',compact('products'));
    }
    
}
