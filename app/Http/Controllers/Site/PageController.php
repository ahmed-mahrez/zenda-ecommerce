<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function newArrivals(){
        $newArrivals = Product::with('category')->latest()->take(6)->get();
        return view('site.pages.new-arrivals', compact('newArrivals'));
    }
}
