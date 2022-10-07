<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\AboutUs;
use App\Models\PPPoE;
use App\Models\Seller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;
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
                Session::flash('message', "Wellcome back " . Auth::user()->name);
                return redirect()->route('admin.home');
            } else {
                Session::flash('message', "Wellcome back " . Auth::user()->name);
                return redirect()->route('seller.home');
            }
        }
        Session::flash('error', "Your email or password doesn't match");
        return back();
    }





    public function dashboard()
    {
        try {

            $data['app'] = $this->app;
            $client = Connector::Connector();
            $data['interface'] = $client->query('/interface/ethernet/print')->read();
            $data['identity'] = $client->query('/system/identity/print')->read();


            if (Auth::user()->role == "Admin") {
                $data['total_Seller'] = Seller::count();
                $data['total_user'] = PPPoE::count();
                $data['total_active_user'] = PPPoE::where('status', true)->count();
                return view('backend.admin.home.home', compact('data'));
            } else {
                $data['seller'] = Seller::where('user_id', Auth::id())->first();
                $data['total_user'] = PPPoE::where('seller_id', Seller::where('user_id', Auth::id())->first('id')->id)->count();
                $data['total_active_user'] = PPPoE::where('seller_id', Seller::where('user_id', Auth::id())->first('id')->id)->where('status', true)->count();
                return view('backend.seller.home.home', compact('data'));
            }
            return redirect("login")->with('You do not have access');
        } catch (Exception $th) {
            dd($th);
            return abort(404);
        }
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
        Session::flash('message', "Logout Successfull");
        return redirect()->route('home');
    }


    public function interfaceData(Request $request)
    {

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
            $rx = (int)$ARRAY[0]["rx-bits-per-second"];
            $tx = (int)$ARRAY[0]["tx-bits-per-second"];
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
