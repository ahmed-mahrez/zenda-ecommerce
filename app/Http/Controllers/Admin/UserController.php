<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    
    public function create()
    {
        return view('admin.users.create');
    }

   
    public function store(UserFormRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        User::create($request->all());
        return to_route('admin.users.index')->with('success', 'User has been created successfully');
    }

   
    public function edit(string $id)
    {
        $user = User::findorFail($id);
        return view('admin.users.edit', compact('user'));
    }

    
    public function update(UserFormRequest $request, string $id)
    {
        $user = User::findorFail($id);
        $user->update($request->all());
        return back()->with('success', 'User has been updated successfully');
    }

    
    public function destroy(string $id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return to_route('admin.users.index')->with('success', 'User has been deleted successfully');
    }
}
