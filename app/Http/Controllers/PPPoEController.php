<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\PPPoE;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = $client->query('/ppp/secret/print')->read();

        return view('backend.admin.pppoe.list', compact('data'));
    }

    public function create()
    {
        return view('backend.admin.pppoe.create');
    }

    public function isActive()
    {
        return view('backend.admin.pppoe.active');
    }

    public function routerUser()
    {
        $data = PPPoE::all();
        return view('backend.admin.pppoe.userList', compact('data'));
    }

    public function import(): JsonResponse
    {
        $client = Connector::Connector();
        $data = $client->query('/ppp/secret/print')->read();

        foreach ($data as $users) {
            $checkUsers = PPPoE::where('username', $users['name'])->first();

            if (is_null($checkUsers)) {
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
        $client = Connector::Connector();

        if (self::userCheck($request)) {


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
        $seller = Seller::where('user_id', Auth::id())->first('id');
        $pppoeUsers = PPPoE::where('seller_id', $seller->id)->get();
        return view('backend.seller.pppoe.list', compact('pppoeUsers'));
    }


    public function isActiveSeller()
    {
        return view('backend.seller.pppoe.active');
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
        $userDataCheck = PPPoE::where('username', $request->name)->where('seller_id', $seller)->first();

        if (!empty($userDataCheck) > 0) {
            $data = [
                'status' => "User Found",
                'data' => $userDataCheck,
                'icon' => 'success'
            ];
        } else {
            $data = [
                'status' => "User Not Found",
                'data' => null,
                'icon' => 'success'
            ];
        }
        return response()->json($data);

        //        $client = Connector::Connector();
        //
        //        if (self::userCheck($request)){
        //
        //
        //            // Create "where" Query object for RouterOS
        //            $query =
        //                (new Query('/ppp/active/print'))
        //                    ->where('name', $request->name);
        //
        //            // Send query and read response from RouterOS
        //            $response = $client->query($query)->read();
        //            if (count($response) > 0) {
        //                $data = [
        //                    'status' => "User Online",
        //                    'data' => $response,
        //                    'icon' => 'success'
        //                ];
        //            } else {
        //                $data = [
        //                    'status' => "User Offline",
        //                    'data' => null,
        //                    'icon' => 'warning'
        //                ];
        //            }
        //        }else{
        //            $data = [
        //                'status' => "User Not Found",
        //                'data' => null,
        //                'icon' => 'error'
        //            ];
        //        }
        //
        //        return response()->json($data);
    }
}
