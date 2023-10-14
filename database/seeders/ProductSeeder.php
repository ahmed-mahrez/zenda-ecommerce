<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Product, ProductImage, ProductColor};

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'MacBook Air 13',
            'slug' => 'MacBook-Air-13',
            'category_id' => 1,
            'brand_id' => 1,
            'breif' => 'Apple M2 is a series of ARM-based system on a chip designed by Apple Inc',
            'description' => 'Apple M2 is a series of ARM-based system on a chip designed by Apple Inc. as a central processing unit and graphics processing unit for its Mac desktops and notebooks, and the iPad Pro tablet.',
            'original_price' => 400.00, 'selling_price' => 380.00,
            'quantity' => 10,
            'trending' => 1,
            'status' => 1,
            'meta_title' => 'MacBook Air 13',
            'meta_keyword' => 'MacBook Air 13',
            'meta_description' => 'MacBook Air 13'
        ]);

        ProductImage::create(['product_id' => 1, 'image' => 'uploads/products/lap-1.png']);
        ProductColor::create(['product_id' => 1, 'color_id' => 1, 'quantity' => 10]);
        ProductColor::create(['product_id' => 1, 'color_id' => 2, 'quantity' => 10]);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'Dell Inspiron 15',
            'slug' => 'Dell-Inspiron-15',
            'category_id' => 1,
            'brand_id' => 3,
            'breif' => 'Experience a more responsive yet quieter performance, featuring AMD processors with PCIe SSD options.',
            'description' => 'Benefit from roomy keycaps and a spacious touchpad that makes it easier to navigate your content. ComfortView software, which is a TUV Rheinland certified solution, reduces harmful blue light emissions to keep your eyes comfortable over extended viewing times.',
            'original_price' => 300.00, 'selling_price' => 290.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'Dell Inspiron 15',
            'meta_keyword' => 'Dell Inspiron 153',
            'meta_description' => 'Dell Inspiron 15'
        ]);

        ProductImage::create(['product_id' => 2, 'image' => 'uploads/products/lap-2.png']);
        ProductColor::create(['product_id' => 2, 'color_id' => 1, 'quantity' => 10]);
        ProductColor::create(['product_id' => 2, 'color_id' => 4, 'quantity' => 15]);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'HP Spectre x360',
            'slug' => 'HP-Spectre-x360',
            'category_id' => 1,
            'brand_id' => 2,
            'breif' => 'Stunning craftmanship meets powerful performance with the HP Spectre x360 13.5.',
            'description' => 'The 360° design rotates for the perfect position, while the dynamic camera features let you look your best live. This powerful machine evolves your laptop experience with the Intel® Evo™ certified Platform[2], and Intel® Unison™[1] for freedom to work across operating systems.',
            'original_price' => 400.00, 'selling_price' => 390.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'HP Spectre x360',
            'meta_keyword' => 'HP Spectre x360',
            'meta_description' => 'HP Spectre x360'
        ]);

        ProductImage::create(['product_id' => 3, 'image' => 'uploads/products/lap-3.png']);
        ProductColor::create(['product_id' => 3, 'color_id' => 2, 'quantity' => 10]);
        ProductColor::create(['product_id' => 3, 'color_id' => 4, 'quantity' => 15]);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'MacBook Pro 16',
            'slug' => 'MacBook-Pro-16',
            'category_id' => 1,
            'brand_id' => 2,
            'breif' => 'MacBook Air with M1 is an incredibly portable laptop — it\'s nimble and quick, with a silent, fanless design and a beautiful Retina display.',
            'description' => 'M1 is our first chip designed specifically for Mac. Apple silicon integrates the CPU, GPU, Neural Engine, I/O, and so much more onto a single tiny chip. Packed with an astonishing 16 billion transistors, M1 delivers exceptional performance, custom technologies, and unbelievable power efficiency — a major breakthrough for Mac.',
            'original_price' => 600.00, 'selling_price' => 550.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'MacBook Pro 16',
            'meta_keyword' => 'MacBook Pro 16',
            'meta_description' => 'MacBook Pro 16'
        ]);

        ProductImage::create(['product_id' => 4, 'image' => 'uploads/products/lap-4.jpg']);
        ProductColor::create(['product_id' => 4, 'color_id' => 1, 'quantity' => 10]);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'iPhone 15 Pro',
            'slug' => 'iPhone-15-Pro',
            'category_id' => 2,
            'brand_id' => 2,
            'breif' => 'Apple\'s latest consumer flagship iPhone lineup with USB-C, Dynamic Island, and more.',
            'description' => 'As brand-new models, the 6.1-inch iPhone 15 and 6.7-inch iPhone 15 Plus will last for many years to come and will remain part of Apple\'s flagship lineup for the next 12 months, so you can rest assured that something newer and better is not right around the corner.',
            'original_price' => 600.00, 'selling_price' => 550.00,
            'quantity' => 10,
            'trending' => 1,
            'status' => 1,
            'meta_title' => 'iPhone 15 Pro',
            'meta_keyword' => 'iPhone 15 Pro',
            'meta_description' => 'iPhone 15 Pro'
        ]);

        ProductImage::create(['product_id' => 5, 'image' => 'uploads/products/phone-1.png']);
        ProductColor::create(['product_id' => 5, 'color_id' => 1, 'quantity' => 10]);
        ProductColor::create(['product_id' => 5, 'color_id' => 2, 'quantity' => 15]);
        ProductColor::create(['product_id' => 5, 'color_id' => 3, 'quantity' => 10]);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'Samsung Galaxy A52',
            'slug' => 'Samsung-Galaxy-A52',
            'category_id' => 2,
            'brand_id' => 4,
            'breif' => 'Galaxy A52 multi-lens camera system takes photos to the next level. Go ultra high-res on the 64MP Main Camera with OIS for crisp, clear photos throughout the day.',
            'description' => "In Super Steady mode, Galaxy A52 keeps your videos looking smooth and stable. It records like a high-quality action camera, utilizing the Ultra Wide Camera and predictive software. The 5MP Depth Camera lets you adjust the depth of field in your photos. With a simple touch, you can easily fine-tune the background blur behind your subject for high-quality portrait shots that truly stand out.",
            'original_price' => 600.00, 'selling_price' => 550.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'Samsung Galaxy A52',
            'meta_keyword' => 'Samsung Galaxy A52',
            'meta_description' => 'Samsung Galaxy A52'
        ]);

        ProductImage::create(['product_id' => 6, 'image' => 'uploads/products/phone-2.png']);
        ProductColor::create(['product_id' => 6, 'color_id' => 2, 'quantity' => 15]);
        ProductColor::create(['product_id' => 6, 'color_id' => 3, 'quantity' => 10]);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'iPhone 13',
            'slug' => 'iPhone-13',
            'category_id' => 2,
            'brand_id' => 1,
            'breif' => 'A lightning‑fast chip. A leap in battery life. And all‑new photo and video capabilities. iPhone 13 lets you do things you never could before — in two great sizes.',
            'description' => "iPhone helps put you in control of your personal information. For example, when you’re browsing, Safari intelligently helps block trackers from profiling you and shows you which ones have been blocked in your Privacy Report. And the list goes on. Our hardware and software work together seamlessly. Want to pair new AirPods with your iPhone? It’s a simple one‑tap setup. Want to share photos or contacts with friends nearby? AirDrop lists their names onscreen, so you can choose with a tap.",
            'original_price' => 400.00, 'selling_price' => 350.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'iPhone 13',
            'meta_keyword' => 'iPhone 13',
            'meta_description' => 'iPhone 13'
        ]);

        ProductImage::create(['product_id' => 7, 'image' => 'uploads/products/phone-3.png']);
        ProductColor::create(['product_id' => 7, 'color_id' => 1, 'quantity' => 15]);
        ProductColor::create(['product_id' => 7, 'color_id' => 2, 'quantity' => 10]);
        ProductColor::create(['product_id' => 7, 'color_id' => 3, 'quantity' => 15]);
        ProductColor::create(['product_id' => 7, 'color_id' => 4, 'quantity' => 10]);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'Samsung Galaxy Note 20',
            'slug' => 'Samsung-Galaxy-Note-20',
            'category_id' => 2,
            'brand_id' => 4,
            'breif' => 'A stunning array of mystic hues that redefine work and play.',
            'description' => "The minimal design features a metal body elevated by exquisite details and transcendent colours. It’s crafted for sophistication that's incredibly comfortable in your hand with a 6.7\"display, and complemented by a matching S Pen.",
            'original_price' => 400.00, 'selling_price' => 300.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'iPhone 13',
            'meta_keyword' => 'iPhone 13',
            'meta_description' => 'iPhone 13'
        ]);

        ProductImage::create(['product_id' => 8, 'image' => 'uploads/products/phone-4.png']);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'Neo QLED 8K QN800C',
            'slug' => 'Neo-QLED-8K-QN800C',
            'category_id' => 3,
            'brand_id' => 4,
            'breif' => "Enrich your 8K exploration with Neo QLED 8K.",
            'description' => "Ultra-fine contrast in 8K that brings out hidden details Witness unimaginable details expressed in the darkest black to the purest white with 1.5x more lighting zones than Quantum Matrix Technology.",
            'original_price' => 600.00, 'selling_price' => 550.00,
            'quantity' => 10,
            'trending' => 1,
            'status' => 1,
            'meta_title' => 'Neo QLED 8K QN800C',
            'meta_keyword' => 'Neo QLED 8K QN800C',
            'meta_description' => 'Neo QLED 8K QN800C'
        ]);

        ProductImage::create(['product_id' => 9, 'image' => 'uploads/products/screen-1.png']);
        
        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => '98" QLED 4K Q80C Smart TV',
            'slug' => '98"-QLED-4K-Q80C-Smart-TV',
            'category_id' => 3,
            'brand_id' => 4,
            'breif' => "Neural Quantum Processor 4K. Feel the full power of AI in 4K",
            'description' => "Supersize Picture Enhancer AI-enhanced picture quality for super large screen AI optimizes upscaling, noise reduction, sharpness boost and black enhancement techniques for superior picture quality on your super large screen.",
            'original_price' => 800.00, 'selling_price' => 750.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => '98" QLED 4K Q80C Smart TV',
            'meta_keyword' => '98" QLED 4K Q80C Smart TV',
            'meta_description' => '98" QLED 4K Q80C Smart TV'
        ]);

        ProductImage::create(['product_id' => 10, 'image' => 'uploads/products/screen-2.png']);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => '55" OLED 4K S90C Smart TV',
            'slug' => '55" OLED 4K S90C Smart TV',
            'category_id' => 3,
            'brand_id' => 4,
            'breif' => "Deep blacks, clean whites and lively colors Samsung’s innovative OLED offers deep blacks, clean whites and full shades of colors thanks to cutting-edge self-illuminating pixels driven by Quantum Dot.",
            'description' => "Neural Quantum Processor 4K Witness unrivaled brightness and superior picture Brilliant 4K picture quality completed by 20 different neural networks ensures you feel the power of 4K. Thin profile that resembles a laser beam OLED’s sleek and stylish design presents unique beauty along with its strong functionality.",
            'original_price' => 600.00, 'selling_price' => 450.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => '55" OLED 4K S90C Smart TV',
            'meta_keyword' => '55" OLED 4K S90C Smart TV',
            'meta_description' => '55" OLED 4K S90C Smart TV'
        ]);

        ProductImage::create(['product_id' => 11, 'image' => 'uploads/products/screen-3.png']);

         /////////////////////////////////////////////////////////////////////////////

         Product::create([
            'name' => 'AE POLO SHIRT',
            'slug' => 'AE-POLO-SHIRT',
            'category_id' => 4,
            'brand_id' => 5,
            'breif' => "Classic and cool, all day and all night.",
            'description' => "Classic and cool, all day and all night.",
            'original_price' => 120.00, 'selling_price' => 100.00,
            'quantity' => 10,
            'trending' => 1,
            'status' => 1,
            'meta_title' => 'AE POLO SHIRT',
            'meta_keyword' => 'AE POLO SHIRT',
            'meta_description' => 'AE POLO SHIRT'
        ]);

        ProductImage::create(['product_id' => 12, 'image' => 'uploads/products/shirt-1.png']);
    
        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'POLO CHEMISE',
            'slug' => 'POLO-CHEMISE',
            'category_id' => 4,
            'brand_id' => 5,
            'breif' => "Classic underground shirt",
            'description' => "Classic underground shirt.",
            'original_price' => 130.00, 'selling_price' => 120.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'POLO CHEMISE',
            'meta_keyword' => 'POLO CHEMISE',
            'meta_description' => 'POLO CHEMISE'
        ]);

        ProductImage::create(['product_id' => 13, 'image' => 'uploads/products/shirt-2.png']);

        /////////////////////////////////////////////////////////////////////////////

        Product::create([
            'name' => 'Polo Ralph Lauren',
            'slug' => 'Polo-Ralph-Lauren-harrington-jacket-in-beigeT',
            'category_id' => 4,
            'brand_id' => 5,
            'breif' => "Classic and cool, all day and all night.",
            'description' => "Smooth woven fabric Body: 100% Polyester, Body Lining: 100% Cotton, Sleeve lining: 100% Polyester.",
            'original_price' => 200.00, 'selling_price' => 170.00,
            'quantity' => 10,
            'trending' => 0,
            'status' => 1,
            'meta_title' => 'Polo Ralph Lauren harrington jacket in beige',
            'meta_keyword' => 'Polo Ralph Lauren harrington jacket in beige',
            'meta_description' => 'Polo Ralph Lauren harrington jacket in beige'
        ]);

        ProductImage::create(['product_id' => 14, 'image' => 'uploads/products/shirt-3.jpg']);
    
    

    }
}
