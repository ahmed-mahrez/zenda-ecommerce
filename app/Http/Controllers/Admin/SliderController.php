<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class sliderController extends Controller
{
    
    public function index()
    {
        $sliders = slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

   
    public function create()
    {
        return view('admin.sliders.create');
    }

    
    public function store(SliderFormRequest $request)
    {
        //dd($request);
        if($request->hasFile('image_file')){
            $file = $request->file('image_file');
            $file_name = time() . '-' . $file->getClientOriginalName();
            $image_name = $file->storeAs('uploads/sliders', $file_name, 'public');
            $request->merge(['image' => $image_name]);
        }

        $request->merge(['status' => $request->status ? 1 : 0]);
        slider::create($request->all());
        return to_route('admin.sliders.index')->with('success', 'slider has been created succesfully');
    }

   
    public function edit(string $id)
    {
        $slider = slider::findorFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

   
    public function update(SliderFormRequest $request, string $id)
    {
        $slider = slider::findorFail($id);

        if($request->hasFile('image_file')){
            $file = $request->file('image_file');
            $file_name = time() . '-' . $file->getClientOriginalName();
            $image_name = $file->storeAs('uploads/categories', $file_name, 'public');
            $request->merge(['image' => $image_name]);

            Storage::disk('public')->delete($slider->image);
        }

        $request->merge(['status' => $request->status ? 1 : 0]);
        $slider->update($request->all());
        return to_route('admin.sliders.index')->with('success', 'slider has been updated succesfully');
    }

   
    public function destroy(string $id)
    {
        $slider = slider::findorFail($id);
        Storage::disk('public')->delete($slider->image);
        $slider->delete();
        return to_route('admin.sliders.index')->with('success', 'slider has been deleted succesfully');
    }
}
