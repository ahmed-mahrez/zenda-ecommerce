<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Color;
use App\Models\ProductColor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

   
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.products.create', compact('brands', 'categories', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {
        //dd($request->all());
        $request->merge([
            'trending' => $request->trending ? 1 : 0,
            'status' => $request->status ? 1 : 0,
            'slug' => Str::slug($request->name)
        ]);

        $product = Product::create($request->all());

        if(!empty($request->images)){
            foreach($request->images as $image){
                $file_name = time() . '-' . $image->getClientOriginalName();
                $image_name = $image->storeAs('uploads/products', $file_name, 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $image_name
                ]);
            }
        }

        foreach($request->colors as $key => $value){
            if($request->quantities[$key]){
                ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $key,
                    'quantity' => $request->quantities[$key]
                ]);
            }
        }

        return to_route('admin.products.index')->with('success', 'Product has been created succesfully');
    }

    
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        $product_id = $id;
        
        return view('admin.products.edit', compact('product', 'brands', 'categories', 'product_id'));
    }

    public function update(ProductFormRequest $request, string $id)
    {
        $product = Product::findorFail($id);

        $request->merge([
            'trending' => $request->trending ? 1 : 0,
            'status' => $request->status ? 1 : 0,
            'slug' => Str::slug($request->name)
        ]);

        $product->update($request->all());

        if(!empty($request->images)){
            foreach($request->images as $image){
                $file_name = time() . '-' . $image->getClientOriginalName();
                $image_name = $image->storeAs('uploads/products', $file_name, 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $image_name
                ]);
            }
        }

        if(!empty($request->colors)){
            foreach($request->colors as $key => $value){
                if($request->quantities[$key]){
                    ProductColor::create([
                        'product_id' => $product->id,
                        'color_id' => $key,
                        'quantity' => $request->quantities[$key]
                    ]);
                }
            }
        }

        return to_route('admin.products.index')->with('success', 'Product has been created succesfully');
    }

   
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        foreach($product->images as $image){
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
        $product->delete();
        return back()->with('success', 'Product has been deleted succesfully');
    }

    public function updateProductColor(Request $request){
        $product_color = ProductColor::findorFail($request->product_color_id);
        $product_color->quantity = $request->quantity;
        $product_color->save();

        return 'quantity was updated successfully';
    }

    public function deleteProductColor(Request $request){
        $product_color = ProductColor::findorFail($request->product_color_id);
        $product_color->delete();
    }
}
