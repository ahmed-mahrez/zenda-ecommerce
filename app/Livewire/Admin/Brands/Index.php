<?php

namespace App\Livewire\Admin\Brands;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;
use App\Models\Brand;

class Index extends Component
{
    public $brands;

    #[Rule('required|string|unique:brands,name')]
    public $name;

    public $status;
    public $brand_id;

    public function resetModels(){
        $this->reset();
    }

    public function storeBrand(){
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'status' => $this->status ? 1 : 0,
            'slug' => Str::slug($this->name)
        ]);

        $this->reset('name', 'status');
        session()->flash('success', 'Brand has been created successfully');
        $this->dispatch('close-modal');
    }

    public function editBrand($id){
        $brand = Brand::findOrFail($id);
        $this->brand_id = $id;    
        $this->name = $brand->name;
        $this->status = $brand->status == 1 ? true : false;
    }

    public function updateBrand(){
        $this->validate();
        Brand::find($this->brand_id)->update([
            'name' => $this->name,
            'status' => $this->status ? 1 : 0,
            'slug' => Str::slug($this->name)
        ]);

        $this->reset('name', 'status', 'brand_id');
        session()->flash('success', 'Brand has been updated successfully');
        $this->dispatch('close-modal');
    }

    public function deleteBrand($id){
        $this->brand_id = $id;
    }

    public function destroyBrand(){
        Brand::findorFail($this->brand_id)->delete();
        $this->reset('name', 'status', 'brand_id');
        session()->flash('success', 'Brand has been deleted successfully');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        $this->brands = Brand::all();
        return view('livewire.admin.brands.index');
    }
}
