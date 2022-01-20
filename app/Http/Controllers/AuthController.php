<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller

{
    /**
     * Write code on Method
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('auth.login');
    }



    public function postLogin(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            if (Auth::user()->role == "Admin") {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('seller.home');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }





    public function dashboard()
    {

        if (Auth::user()->role == "Admin") {
            return view('backend.admin.home.home');
        } else {
            return view('backend.seller.home.home');
        }
        return redirect("login")->with('You do not have access');
    }



    /**
     * Write code on Method
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
