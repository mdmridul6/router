<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $app;
    public function __construct()
    {
        $this->app = AboutUs::first(['name', 'logo']);
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
