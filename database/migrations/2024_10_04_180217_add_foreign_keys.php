<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands')->nullOnDelete();
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('product_colors', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('colors')->nullOnDelete();
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('product_colors');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('product_colors');
        });
        
        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
