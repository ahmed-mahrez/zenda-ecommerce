<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $products = Product::where('name', 'LIKE', "%$request->search%")->paginate(10);
        return view('site.pages.search', compact('products'));
    }
}
