<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use App\Models\{User, Admin, Brand, Category, Color, Slider, Product, ProductImage, ProductColor};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(['name' => 'okapi', 'email' => 'ok10@m.c', 'password' => bcrypt('12345678')]);
        User::create(['name' => 'khalid', 'email' => 'kahlid.7@m.c', 'password' => bcrypt('12345678')]);

        Admin::create(['name' => 'ketan01', 'email' => 'ketan01@m.c', 'password' => bcrypt('12345678')]);
        Admin::create(['name' => 'catos', 'email' => 'catos@mt.com', 'password' => bcrypt('12345678')]);

        Brand::create(['name' => 'Apple', 'slug' => 'Apple', 'status' => 1]);
        Brand::create(['name' => 'HP', 'slug' => 'HP', 'status' => 1]);
        Brand::create(['name' => 'Dell', 'slug' => 'Dell', 'status' => 1]);
        Brand::create(['name' => 'Samsung', 'slug' => 'Samsung', 'status' => 0]);
        Brand::create(['name' => 'Polo', 'slug' => 'polo', 'status' => 1]);

        Category::create(['name' => 'Laptops', 'slug' => 'laptops', 'description' => 'description...', 'image' => 'uploads/categories/laptops.jpg', 'meta_title' => 'lap', 'meta_description' => 'lap', 'meta_keyword' => 'lap']);
        Category::create(['name' => 'Phones', 'slug' => 'phones', 'description' => 'description...', 'image' => 'uploads/categories/phones.jpg', 'meta_title' => 'ph', 'meta_description' => 'ph', 'meta_keyword' => 'ph']);
        Category::create(['name' => 'Screens', 'slug' => 'screens', 'description' => 'description...', 'image' => 'uploads/categories/screens.jpg', 'meta_title' => 'wa', 'meta_description' => 'wa', 'meta_keyword' => 'wa']);
        Category::create(['name' => 'Clothes', 'slug' => 'clothes', 'description' => 'description...', 'image' => 'uploads/categories/clothes.jpg', 'meta_title' => 'sc', 'meta_description' => 'sc', 'meta_keyword' => 'sc']);
        
        Color::create(['name' => 'red', 'code' => '#F00', 'status' => 1]);
        Color::create(['name' => 'green', 'code' => '#0F0', 'status' => 1]);
        Color::create(['name' => 'black', 'code' => '#000', 'status' => 1]);
        Color::create(['name' => 'blue', 'code' => '#00F', 'status' => 1]);

        Slider::create(['title' => '8k TV Screens', 'description' => 'All you need in one place', 'image' => 'uploads/sliders/slider-bg2.png', 'status' => 1]);
        Slider::create(['title' => 'Benchmark Phones', 'description' => 'cutting edge phone feats.', 'image' => 'uploads/sliders/slider-bg1.png', 'status' => 1]);
    
        $this->call(ProductSeeder::class);
       
    }
}
