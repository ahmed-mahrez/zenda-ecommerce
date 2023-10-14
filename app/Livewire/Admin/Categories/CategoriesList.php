<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoriesList extends Component
{
    public $categoryID;

    public function setCategoryID($id){
        $this->categoryID = $id;
    }

    public function deleteCategory(){
        $category = Category::findOrFail($this->categoryID);
        
        if(file_exists(storage_path('public/' . $category->image))){
            Storage::disk('public')->delete($category->image);
        }
        
        $category->delete();
        session()->flash('success', 'category has been deleted successfully');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.categories.categories-list', compact('categories'));
    }
}
