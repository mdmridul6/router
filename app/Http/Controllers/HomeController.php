<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $data = AboutUs::first();
        return view('frontend.index', compact('data'));
    }

    public function edit()
    {
        $data = AboutUs::first();
        return view('backend.admin.cms.index', compact('data'));
    }


    public function store(Request $request)
    {
        $about = AboutUs::find(1);
        if ($about == null) {
            $about = new AboutUs();
            $this->createOrUpdate($about, $request);
        } else {
            $this->createOrUpdate($about, $request);
        }
        Session::flash('message', "Home Page Updated");
        return redirect()->back();
    }


    public function createOrUpdate($about, $request)
    {

        $about->name = $request->name;
        $about->phone = $request->phone;
        $about->email = $request->email;
        $about->address = $request->address;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();
    }
}
