<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\Packages;
use App\Models\PPPoE;
use App\Models\pppoeUserDetails;
use App\Models\Seller;
use App\Models\setting;
use Carbon\Carbon;
use Faker\Extension\Extension;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;
use RouterOS\Query;

class PPPoEController extends Controller
{
    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function index()
    {
        $client = Connector::Connector();
        $data['pppoe'] = $client->query('/ppp/secret/print')->read();
        $data['app'] = $this->app;
        return view('backend.admin.pppoe.list', compact('data'));
    }

    public function create()
    {

        $data['app']   = $this->app;
        if (Auth::user()->role == "Admin") {
            $data['packages'] = Packages::all();
            $data['seller'] = Seller::all();
            return view('backend.admin.pppoe.create', compact('data'));
        } else {
            $seller = Seller::where('user_id', Auth::id())->first();
            if ($seller->can_add) {
                
                $data['packages'] = Seller::with('package')->where('id', Seller::where('user_id', Auth::id())->first('id')->id)->first();
                return view('backend.seller.pppoe.create', compact('data'));
            } else {
                return redirect()->back();
            }
        }
    }


    public function store(Request $request)
    {
        try {


            $request->validate([
                'packages' => 'required',
                'password' => 'required',
                'username' => 'required|unique:pppoe_users,username',
                'fullName' => 'required',
                'phone'    => 'required',
                'address'  => 'required',
            ]);
            $pppoe = new PPPoE();
            $this->extends($pppoe, $request);


            $userDetails = new pppoeUserDetails();
            $this->extendedPppoeUserDetails($userDetails, $pppoe, $request);


            $this->extendedAddToRouter($request);

            Session::flash('success', "PPPoe User Add Successfull");
            if (Auth::user()->role == "Admin") {
                return redirect()->route('admin.pppoe.routerUser')->withInput();
            } else {
                return redirect()->route('seller.pppoe.routerUser')->withInput();
            }
        } catch (\Exception $th) {
            dd($th);
        }
    }


    public function view($id)
    {
        $data['app'] = $this->app;
        $data['pppoeData'] = PPPoE::with(['seller', 'pppoeUserDetails'])->find($id);

        if ($data['pppoeData']->status == true) {
            # code...
            $client = Connector::Connector();
            // Create "where" Query object for RouterOS
            $query =
                (new Query('/ppp/active/print'))
                ->where('name', $data['pppoeData']->username);

            // Send query and read response from RouterOS
            $response = $client->query($query)->read();
            $data['remoteLink'] = $response[0]['address'];
        } else {
            $data['remoteLink'] = null;
        }

        if (Auth::user()->role == "Admin") {

            return view('backend.admin.pppoe.view', compact('data'));
        } else {
            return view('backend.seller.pppoe.view', compact('data'));
        }
    }





    public function edit($id)
    {
        $data['app'] = $this->app;
        $data['pppoeData'] = PPPoE::with('pppoeUserDetails')->where('id', $id)->first();
        $data['packages'] = Packages::all();
        $data['seller'] = Seller::all();

        if (Auth::user()->role == "Admin") {

            return view('backend.admin.pppoe.edit', compact('data'));
        } else {
            $data['packages'] = Seller::with('package')->where('id', Seller::where('user_id', Auth::id())->first('id')->id)->first();
            return view('backend.seller.pppoe.edit', compact('data'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'password' => 'required',
            'username' => 'required|unique:pppoe_users,username,' . $id,
            'fullName' => 'required',
            'phone'    => 'required',
            'address'  => 'required',
        ]);
        $pppoe = PPPoE::find($id);

        $this->extendedUpdateToRouter($request, $pppoe);

        $this->extends($pppoe, $request);

        $userDetails = pppoeUserDetails::find($id);
        if (!isset($userDetails)) {
            $userDetails = new pppoeUserDetails();
        } else {
            $this->extendedPppoeUserDetails($userDetails, $pppoe, $request);
        }

        Session::flash('success', "PPPoe User Update Successfull");
        if (Auth::user()->role == "Admin") {

            return redirect()->route('admin.pppoe.routerUser')->withInput();
        } else {
            return redirect()->route('seller.pppoe.routerUser')->withInput();
        }
    }



    public function destroy($id)
    {
        try {
            $pppoe = PPPoE::find($id);
            $client = Connector::Connector();
            $query = new Query('/ppp/secret/print');
            $query->where('name', $pppoe->username);
            $secrets = $client->query($query)->read();
            if (!empty($secrets)) {
                $query = (new Query('/ppp/secret/remove'))
                    ->equal('.id', $secrets[0]['.id']);
                // Update query ordinary have no return
                $client->query($query)->read();
            }
            $pppoe->delete();
            Session::flash('error', "PPPoE User Delete Successfull");
            return redirect()->back();
        } catch (Extension $e) {
            dd($e);
        }
    }

    public function active(int $id)
    {
        try {
            //code...

            $pppoe = PPPoE::find($id);
            $pppoe->status = true;
            $pppoe->package_active_date = Carbon::now();
            $pppoe->package_expire_date = Carbon::now()->addMonth();
            $pppoe->active_after = null;
            if ($pppoe->seller_id !== null) {
                $sellerDetails = Seller::find($pppoe->seller_id);
                $seller = Seller::with('package')->find($pppoe->seller_id)->package->where('name', $pppoe->profile)->first();
                if (!is_null($seller)) {

                    $package_price = (int)$seller->pivot->amount;
                    if ((int)$sellerDetails->balance > 0 && (int)$sellerDetails->balance >= $package_price) {
                        $this->dicrementSellerBalence($sellerDetails->id, $package_price);
                    } else {
                        Session::flash('error', "Insufficient Balance");
                        return redirect()->back();
                    }
                    $pppoe->deactive_after = Carbon::now()->addDay($sellerDetails->deactive_after);
                    $pppoe->save();
                } else {
                    Session::flash('error', "Invalid Package Error!");
                    return redirect()->back();
                }
            } else {
                $pppoe->deactive_after = null;
                $pppoe->save();
            }

            $client = Connector::Connector();
            $query = new Query('/ppp/secret/print');
            $query->where('name', $pppoe->username);
            $secrets = $client->query($query)->read();

            $query = (new Query('/ppp/secret/set'))
                ->equal('.id', $secrets[0]['.id'])
                ->equal('profile', $pppoe->profile);

            // Update query ordinary have no return
            $client->query($query)->read();

            return redirect()->back();
        } catch (Extension $th) {
            dd($th);
        }
    }


    public function deactive(int $id)
    {
        $pppoe = PPPoE::find($id);
        $pppoe->status = false;
        $pppoe->package_active_date = null;
        $pppoe->package_expire_date = null;
        $pppoe->deactive_after = null;
        $pppoe->save();

        $client = Connector::Connector();
        $query = new Query('/ppp/secret/print');
        $query->where('name', $pppoe->username);
        $secrets = $client->query($query)->read();

        $query = (new Query('/ppp/secret/set'))
            ->equal('.id', $secrets[0]['.id'])
            ->equal('profile', 'Expired');

        // Update query ordinary have no return
        $client->query($query)->read();

        return redirect()->back();
    }

    public function isActive()
    {

        $data['allPPPoe'] = PPPoE::all();
        $client = Connector::Connector();


        $data['app'] = $this->app;

        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ppp/active/print'));

        // Send query and read response from RouterOS
        $data['pppoeActive'] = $client->query($query)->read();



        return view('backend.admin.pppoe.active', compact('data'));
    }

    public function routerUser()
    {
        $data['app'] = $this->app;
        $data['pppoe'] = PPPoE::orderBy('created_at', 'desc')->get();
        $data['settings'] = setting::first();
        return view('backend.admin.pppoe.userList', compact('data'));
    }

    public function suspendUser()
    {
        $data['app'] = $this->app;
        $data['pppoe'] = PPPoE::where('status', false)->orderBy('created_at', 'desc')->get();
        $data['settings'] = setting::first();
        return view('backend.admin.pppoe.suspend', compact('data'));
    }

    public function import(): JsonResponse
    {
        $client = Connector::Connector();
        $data = $client->query('/ppp/secret/print')->read();

        foreach ($data as $users) {
            $checkUsers = PPPoE::where('username', $users['name'])->first();

            if (empty($checkUsers)) {
                $pppoe = new PPPoE();
                $pppoe->username = $users['name'];
                $pppoe->password = $users['password'];
                $pppoe->service = $users['service'];
                $pppoe->profile = $users['profile'];
                $pppoe->active_date = Carbon::now();
                $pppoe->package_active_date = Carbon::now();
                $pppoe->package_expire_date = Carbon::now();
                $pppoe->seller_id = null;
                $pppoe->save();
            } elseif ($checkUsers->username == $users['name']) {
                continue;
                $pppoe = new PPPoE();
                $pppoe->username = $users['name'];
                $pppoe->password = $users['password'];
                $pppoe->service = $users['service'];
                $pppoe->profile = $users['profile'];
                $pppoe->active_date = Carbon::now();
                $pppoe->package_active_date = Carbon::now();
                $pppoe->package_expire_date = Carbon::now();
                $pppoe->seller_id = null;
                $pppoe->save();
            }
        }



        $data = [
            'status' => "Import Successful",
            'data' => "Import Successful",
            'icon' => 'success'
        ];

        return response()->json($data);
    }




    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function activeCheck(Request $request): JsonResponse
    {

        if ($this->userCheck($request)) {
            $client = Connector::Connector();


            // Create "where" Query object for RouterOS
            $query =
                (new Query('/ppp/active/print'))
                ->where('name', $request->name);

            // Send query and read response from RouterOS
            $response = $client->query($query)->read();
            if (count($response) > 0) {
                $data = [
                    'status' => "User Online",
                    'data' => $response,
                    'icon' => 'success'
                ];
            } else {
                $data = [
                    'status' => "User Offline",
                    'data' => null,
                    'icon' => 'warning'
                ];
            }
        } else {
            $data = [
                'status' => "User Not Found",
                'data' => null,
                'icon' => 'error'
            ];
        }

        return response()->json($data);
    }


    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    private function userCheck($request): bool
    {
        $client = Connector::Connector();

        $query =
            (new Query('/ppp/secret/print'))
            ->where('name', $request->name);

        // Send query and read response from RouterOS
        $response =  $client->query($query)->read();

        if (count($response) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function sellerPPPoeUsers()
    {
        $data['app'] = $this->app;
        $data['settings'] = setting::first();
        $data['seller'] = Seller::where('user_id', Auth::id())->first();
        $data['pppoe'] = PPPoE::where('seller_id', Seller::where('user_id', Auth::id())->first('id')->id)->orderBy('created_at', 'desc')->get();

        return view('backend.seller.pppoe.list', compact('data'));
    }


    public function sellerPPPoeUsersSuspend()
    {
        $data['app'] = $this->app;
        $data['settings'] = setting::first();
        $data['pppoe'] = PPPoE::where('seller_id', Seller::where('user_id', Auth::id())->first('id')->id)->where('status', false)->orderBy('created_at', 'desc')->get();
        return view('backend.seller.pppoe.suspend', compact('data'));
    }


    public function isActiveSeller()
    {
        $data['allPPPoe'] = PPPoE::where('seller_id', Seller::where('user_id', Auth::id())->first('id')->id)->get();
        $client = Connector::Connector();


        $data['app'] = $this->app;

        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ppp/active/print'));

        // Send query and read response from RouterOS
        $data['pppoeActive'] = $client->query($query)->read();

        return view('backend.seller.pppoe.active', compact('data'));
    }



    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function activeCheckSeller(Request $request): JsonResponse
    {
        $seller = Seller::where('user_id', Auth::id())->first('id');
        $userDataCheck = PPPoE::where('username', $request->name)->where('seller_id', $seller->id)->first();


        if (!empty($userDataCheck) > 0) {

            $client = Connector::Connector();


            // Create "where" Query object for RouterOS
            $query =
                (new Query('/ppp/active/print'))
                ->where('name', $request->name);

            // Send query and read response from RouterOS
            $response = $client->query($query)->read();
            if (count($response) > 0) {
                $data = [
                    'status' => "User Online",
                    'data' => $response,
                    'icon' => 'success'
                ];
            } else {
                $data = [
                    'status' => "User Offline",
                    'data' => null,
                    'icon' => 'warning'
                ];
            }
        } else {
            $data = [
                'status' => "User Not Found",
                'data' => null,
                'icon' => 'error'
            ];
        }
        return response()->json($data);
    }

    public function pppoeExistcheckDB(Request $request)
    {
        if (PPPoE::where('username', $request->name)->exists()) {
            return response()->json('true');
        } else {
            return response()->json('false');
        }
    }


    private function extends($pppoe, $request)
    {
        $pppoe->username = $request->username;
        $pppoe->password = $request->password;
        $pppoe->service = "pppoe";
        $pppoe->profile = $request->packages;
        $pppoe->active_date = Carbon::now();
        if (!$pppoe->status) {
            $pppoe->package_active_date = null;
            $pppoe->package_expire_date = null;
            $pppoe->status = false;
        }
        if (Auth::user()->role == "Admin") {
            if ($request->has('seller')) {
                $pppoe->seller_id = $request->seller;
            } else {
                $pppoe->seller_id = null;
            }
        } else {
            $pppoe->seller_id = Seller::where('user_id', Auth::id())->first('id')->id;
        }

        if ($request->has('active_after')) {
            $pppoe->active_after = $request->active_after;
        } else {
            $pppoe->active_after = null;
        }
        if ($request->has('deactive_after')) {
            $pppoe->deactive_after = $request->deactive_after;
        } else {
            $pppoe->deactive_after = null;
        }

        $pppoe->save();
    }



    public function incrementSellerBalence($sellerId, $balence)
    {
        $seller = Seller::find($sellerId);
        $seller->balance = $seller->balance + $balence;
        $seller->save();
    }

    public function dicrementSellerBalence($sellerId, $balence)
    {

        $seller = Seller::find($sellerId);
        $seller->balance = $seller->balance - $balence;
        $seller->save();
    }

    private function extendedPppoeUserDetails($userDetails, $pppoe, $request)
    {

        $userDetails->pppoe_id = $pppoe->id;
        $userDetails->name = $request->fullName;
        $userDetails->phone = $request->phone;
        $userDetails->mobile = $request->mobile;
        $userDetails->address = $request->address;
        $userDetails->save();
    }


    private function extendedAddToRouter($request, $profile = 'Expired')
    {
        $client = Connector::Connector();
        $query =
            (new Query('/ppp/secret/add'))
            ->equal('name', $request->username)
            ->equal('password', $request->password)
            ->equal('service', 'pppoe')
            ->equal('profile', $profile);

        // Send query and read response from RouterOS (ordinary answer from update/create/delete queries has empty body)
        $client->query($query)->read();
    }
    private function extendedUpdateToRouter($request, $pppoe, $profile = 'Expired')
    {

        $client = Connector::Connector();
        $query = new Query('/ppp/secret/print');
        $query->where('name', $pppoe->username);
        $secrets = $client->query($query)->read();


        $query = (new Query('/ppp/secret/set'))
            ->equal('.id', $secrets[0]['.id'])
            ->equal('name', $request->username)
            ->equal('password', $request->password)
            ->equal('profile', $profile);


        // Update query ordinary have no return
        $client->query($query)->read();
    }
}
