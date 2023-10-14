<?php

namespace App\Livewire\Site\Categories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $category;
    public $products;
    public $brands;
    public $selected_brands = [];
    public $price;

    public function mount(Category $category, Collection $products)
    {
        $this->category = $category;
        $this->products = $products;
    }

    public function brandFilter($id){
        $key = array_search($id, $this->selected_brands);

        if($key !== false){
            unset($this->selected_brands[$key]);  
        }
        else{
            $this->selected_brands[] =  $id;
        }
    }

    public function render()
    {
        //dd($this->selected_brands);
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->selected_brands, function($query){
                $query->whereIn('brand_id', $this->selected_brands);
            })->when($this->price == 'low-to-high', function($query){
                $query->orderBy('selling_price', 'ASC');
            })->when($this->price == 'high-to-low', function($query){
                $query->orderBy('selling_price', 'DESC');
            })->get();

        $this->brands = Brand::all();
        return view('livewire.site.categories.products');
    }
}
