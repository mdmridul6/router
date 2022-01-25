<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\Seller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \RouterOS\Query;

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
        $client = Connector::Connector();
        $data['interface'] = $client->query('/interface/ethernet/print')->read();
        $data['identity'] = $client->query('/system/identity/print')->read();
        if (Auth::user()->role == "Admin") {
            return view('backend.admin.home.home', compact('data'));
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


    public function interfaceData(Request $request)
    {
        // dd($request->interface);
        $rows = array();
        $rows2 = array();
        $client = Connector::Connector();
        $query =
            (new Query('/interface/monitor-traffic'))
            ->equal('interface', $request->interface)
            ->equal('once');

        // Ask for monitoring details
        $ARRAY = $client->query($query)->read();



        if (count($ARRAY) > 0) {
            $rx = number_format($ARRAY[0]["rx-bits-per-second"] / 1024, 1);
            $tx = number_format($ARRAY[0]["tx-bits-per-second"] / 1024, 1);
            $rows['name'] = 'Tx';
            $rows['data'][] = $tx;
            $rows2['name'] = 'Rx';
            $rows2['data'][] = $rx;
        }

        $result = array();
        array_push($result, $rows);
        array_push($result, $rows2);

        return response()->json($result);
    }

    public function routerinfo()
    {
        $client = Connector::Connector();
        $query =
            (new Query('/system/resource/monitor'))
            ->equal('once');


        $monitoring = $client->query($query)->read();

        return response()->json(array('monitoring' => $monitoring));
    }
}
