<?php

namespace App\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RouterOS\Client;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class Connector extends Controller
{
    // /**
    //  * @throws ClientException
    //  * @throws ConnectException
    //  * @throws QueryException
    //  * @throws BadCredentialsException
    //  * @throws ConfigException
    //  */
    public static function Connector()
    {
        try {
            return new Client(array(
                'host' => '103.189.247.27',
                'user' => 'routerOs',
                'pass' => 'Ms828ms2',
                'port' => '9320',
            ));
        } catch (ConnectException $exception) {
            // dd($exception->getMessage());
            Auth::logout();
            Session::flash('error', "Router Connection Faild");
            return redirect()->route('login');
        }
    }
}
