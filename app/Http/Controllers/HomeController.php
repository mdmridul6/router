<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = AboutUs::first();
        return view('frontend.index', compact('data'));
    }
}
