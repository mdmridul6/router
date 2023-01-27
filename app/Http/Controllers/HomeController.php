<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\CmsPackage;
use App\Models\FTPCategory;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $data['about'] = AboutUs::first();
        $data['slider'] = Slider::take(5)->get();
        $data['team'] = Team::all();
        $data['package'] = CmsPackage::where('status', true)->where('show_in_home', true)->limit(4)->get();

        return view('frontend.index', compact('data'));
    }

    public function ftp()
    {
        $data = AboutUs::first();
        $ftps = FTPCategory::with(['ftp' => function ($q) {
            return $q->where('status', true);
        }])->get();
        return view('frontend.ftp', compact(['data', 'ftps']));
    }


    public function packages()
    {
        $data['package'] = CmsPackage::where('status', true)->get();
        return view('frontend.package', compact('data'));
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
