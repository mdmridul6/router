<?php

namespace App\Http\Controllers;

use App\Models\CmsPackage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CmsPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['packages'] = CmsPackage::all();

        return view('backend.admin.cms_packages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.cms_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sort_desc' => 'required',
            'price' => 'required',
            'status' => 'required',
            'show_in_home' => 'required_if:status,1',
            'fecility' => 'array',
        ]);


        $cmsPackage = new CmsPackage();
        $cmsPackage->name = $request->name;
        $cmsPackage->sort_desc = $request->sort_desc;
        $cmsPackage->price = $request->price;
        $cmsPackage->status = $request->status;
        $cmsPackage->show_in_home = $request->show_in_home;
        $cmsPackage->benifit = json_encode($request->fecility);
        $cmsPackage->save();
        Session::flash('message', "Package Save Succrssfull");
        return redirect()->route('admin.cms.cms-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CmsPackage  $cmsPackage
     * @return \Illuminate\Http\Response
     */
    public function show(CmsPackage $cmsPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CmsPackage  $cmsPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsPackage $cms_package)
    {
        return view('backend.admin.cms_packages.edit', compact('cms_package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CmsPackage  $cmsPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsPackage $cms_package)
    {
        $request->validate([
            'name' => 'required',
            'sort_desc' => 'required',
            'price' => 'required',
            'status' => 'required',
            'show_in_home' => 'required_if:status,1',
            'fecility' => 'array',
        ]);



        $cms_package->name = $request->name;
        $cms_package->sort_desc = $request->sort_desc;
        $cms_package->price = $request->price;
        $cms_package->status = $request->status;
        $cms_package->show_in_home = $request->show_in_home;
        $cms_package->benifit = json_encode($request->fecility);
        $cms_package->save();
        Session::flash('message', "Package Update Succrssfull");
        return redirect()->route('admin.cms.cms-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CmsPackage  $cmsPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsPackage $cms_package)
    {
        $cms_package->delete();
        Session::flash('error', "Package Delete Succrssfull");
        return redirect()->route('admin.cms.cms-package.index');
    }

    function availableUrl($host, $port = 80, $timeout = 10)
    {
        $fp = fSockOpen($host, $port, $errno, $errstr, $timeout);
        return $fp != false;
    }
}
