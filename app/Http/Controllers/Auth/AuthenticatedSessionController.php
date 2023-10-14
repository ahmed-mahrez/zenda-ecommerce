<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('site.auth.login');
    }

    public function adminCreate(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $guard = $request->type;
        
        if (Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password])) {

            $request->session()->regenerate();

            if($guard == 'user'){
                return redirect()->intended(RouteServiceProvider::HOME);
            }
            else{
                return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
            }
         }
         
         else{
            return back()->with('error', 'invalid login credentials');
         }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $type = $request->type;

        Auth::guard($request->type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if($type == 'admin'){
            return to_route('admin.login');
        }
        else{
            return redirect('/');
        }
    }
}
