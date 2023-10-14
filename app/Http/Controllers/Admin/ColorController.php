<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ColorFormRequest;
use App\Models\Color;

class ColorController extends Controller
{
    
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

   
    public function create()
    {
        return view('admin.colors.create');
    }

    
    public function store(ColorFormRequest $request)
    {
        $request->merge(['status' => $request->status ? 1 : 0]);
        Color::create($request->all());
        return to_route('admin.colors.index')->with('success', 'Color has been created succesfully');
    }

   
    public function edit(string $id)
    {
        $color = Color::findorFail($id);
        return view('admin.colors.edit', compact('color'));
    }

   
    public function update(ColorFormRequest $request, string $id)
    {
        $color = Color::findorFail($id);
        $request->merge(['status' => $request->status ? 1 : 0]);
        $color->update($request->all());
        return to_route('admin.colors.index')->with('success', 'Color has been updated succesfully');
    }

   
    public function destroy(string $id)
    {
        $color = Color::findorFail($id);
        $color->delete();
        return to_route('admin.colors.index')->with('success', 'Color has been deleted succesfully');
    }
}
