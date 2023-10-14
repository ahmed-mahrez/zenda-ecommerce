<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $data['categoriesCount'] = Category::count();
        $data['productsCount'] = Product::count();
        $data['brandsCount'] = Brand::count();
        $data['usersCount'] = User::count();
        $data['adminsCount'] = Admin::count();
        $data['ordersCount'] = Order::count();
        $data['todayOrdersCount'] = Order::whereDate('created_at', date('Y-m-d'))->count();
        $data['monthOrdersCount'] = Order::whereMonth('created_at', date('m'))->count();
        $data['yearOrdersCount'] = Order::whereYear('created_at', date('Y'))->count();


        return view('admin.dashboard', $data);
    }
}
