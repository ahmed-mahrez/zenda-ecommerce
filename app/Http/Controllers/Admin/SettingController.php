<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request){
        Setting::updateOrCreate(['id' => 1], $request->all());
        return back()->with('success', 'Setttings saved succesffuly.');
    }
}
