<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Slider, Product};

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        $trendingProducts = Product::with('category')->where('trending', 1)->latest()->take(15)->get();
        $newArrivals = Product::with('category')->orderBy('id', 'DESC')->take(6)->get();
        return view('site.home', compact('sliders', 'trendingProducts', 'newArrivals'));
    }

}
