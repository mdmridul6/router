<?php

namespace App\Http\Controllers;

use App\Models\FTPCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FTPCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['app'] = $this->app;
        $data['ftpCategory'] = FTPCategory::all();
        return view('backend.admin.ftpcategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['app'] = $this->app;
        return view('backend.admin.ftpcategory.create', compact('data'));
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
            'name' => 'required'
        ]);
        $fTPCategory = new FTPCategory();
        $fTPCategory->name = $request->name;
        $fTPCategory->save();
        Session::flash('message', "Category Save Succrssfull");
        return redirect()->route('admin.cms.ftp.category.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FTPCategory  $fTPCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($fTPCategory)
    {
        $data['app'] = $this->app;
        $data['ftpCategory'] = FTPCategory::find($fTPCategory);

        return view('backend.admin.ftpcategory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FTPCategory  $fTPCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fTPCategory)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $fTPCategory = FTPCategory::find($fTPCategory);
        $fTPCategory->name = $request->name;
        $fTPCategory->save();
        Session::flash('message', "Category Update Succrssfull");
        return redirect()->route('admin.cms.ftp.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FTPCategory  $fTPCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($fTPCategory)
    {
        $data['ftpCategory'] = FTPCategory::destroy($fTPCategory);
        return redirect()->back();
    }
}
