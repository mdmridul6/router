<?php

namespace App\Http\Controllers;

use App\Helper\Connector;
use App\Models\PPPoE;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

            return view('backend.pppoe.list', compact('data'));
        }

        public function isActive()
        {
            return view('backend.pppoe.active' );
        }

        public function routerUser(){
            $data=PPPoE::all();
            return view('backend.pppoe.userList',compact('data'));
        }

        public function import(): JsonResponse
        {
            $client = Connector::Connector();
            $data = $client->query('/ppp/secret/print')->read();

            foreach ($data as $users) {
                $checkUsers=PPPoE::where('username',$users['name'])->first();

                if (is_null($checkUsers)){
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
                    }elseif($checkUsers->username == $users['name']){
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

        if (self::userCheck($request)){


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
        }else{
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
    private function userCheck($request){
            $client = Connector::Connector();

            $query =
                (new Query('/ppp/secret/print'))
                    ->where('name', $request->name);

            // Send query and read response from RouterOS
            $response=  $client->query($query)->read();

            if (count($response)>0){
                return true;
            }else{
                return false;
            }


        }

}

