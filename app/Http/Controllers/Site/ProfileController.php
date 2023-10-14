<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ProfileFormRequest;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    
    public function index()
    {
        return view('site.user.profile');
    }

    
    public function store(ProfileFormRequest $request)
    {
        $inputs = $request->except('password');
        if($request->new_password){
            $inputs['password'] = bcrypt($request->new_password);
        }

        auth()->user()->update($inputs);
        $request->merge(['user_id' => auth()->id()]);
        Profile::updateOrCreate(['user_id' => auth()->id()], $inputs);
        return back()->with('success', 'Profile has been updated successfully');
    }
   
}
