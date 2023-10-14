<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Product, Brand};

class CollectionController extends Controller
{
    public function index(){
        $categories = Category::where('status', 1)->get();
        return view('site.collections.categories.index', compact('categories'));
    }

    
    public function products(string $categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();

        if(!$category){
            abort(404);
        }

        $products = Product::with('category', 'brand', 'images')->where('category_id', $category->id)->get();
        return view('site.collections.products.index', compact('category', 'products'));
    }

    public function viewProduct(string $category, string $product){
        $category = Category::where('slug', $category)->first();
        $product = Product::where('slug', $product)->where('category_id', $category->id ?? 0)->first();

        if(!$category || !$product){
            abort(404);
        }

        return view('site.collections.products.product', compact('product'));
    }



}
