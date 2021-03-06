<?php

namespace App\Helper;

use App\Http\Controllers\Controller;
use RouterOS\Client;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class Connector extends Controller
{
    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public static function Connector()
    {
        try {
            return new Client(array(
                'host' => '58.84.34.200',
                'user' => 'maruf',
                'pass' => 'haxorMs00',
                'port' => 9320,
            ));
        } catch (ConnectException $exception) {
            return abort(400);
        }
    }
}
