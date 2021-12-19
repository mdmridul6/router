<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    /**
     * Write code on Method
     *
     * @return Application|Factory|View
     */
    public function registration()
    {
        return view('auth.registration');
    }


    public function postLogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }





    public function dashboard()
    {
        if (Auth::check()) {
            return view('backend.home.home');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }



    /**

     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {

        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
