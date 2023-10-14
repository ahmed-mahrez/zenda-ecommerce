<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
   
    public function index()
    {
        return view('admin.categories.index');
    }

    
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $request->merge([
            'slug' => Str::slug($request->name),
            'status' => $request->status ? 1 : 0,
        ]);

        if($request->hasFile('image_file')){
            $file = $request->file('image_file');
            $file_name = time() . '-' . $file->getClientOriginalName();
            $image_name = $file->storeAs('uploads/categories', $file_name, 'public');
            $request->merge(['image' => $image_name]);
        }

        Category::create($request->all());
        return to_route('admin.categories.index')->with('success', 'Category has been created succesfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $category = Category::findorFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, string $id)
    {
        $category = Category::findorFail($id);

        $request->merge([
            'slug' => Str::slug($request->name),
            'status' => $request->status ? 1 : 0,
        ]);

        if($request->hasFile('image_file')){
            $file = $request->file('image_file');
            $file_name = time() . '-' . $file->getClientOriginalName();
            $image_name = $file->storeAs('uploads/categories', $file_name, 'public');
            $request->merge(['image' => $image_name]);

            Storage::disk('public')->delete($category->image);
        }

        $category->update($request->all());
        return to_route('admin.categories.index')->with('success', 'Category has been created succesfully');
    }

}
