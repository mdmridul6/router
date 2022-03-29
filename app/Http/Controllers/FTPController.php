<?php

namespace App\Http\Controllers;

use App\Models\FTP;
use App\Models\FTPCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['app'] = $this->app;
        $data['ftp'] = FTP::with('category')->get();

        return view('backend.admin.ftp.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['app'] = $this->app;
        $data['ftpCategory'] = FTPCategory::all();
        return view('backend.admin.ftp.create', compact('data'));
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
            'category' => 'required',
            'url' => 'required',
        ]);
        $fTP = new FTP();
        $fTP->title = $request->name;
        $fTP->category_id = $request->category;
        $fTP->url = $request->url;
        $fTP->save();
        Session::flash('message', "FTP Save Successfull");
        return redirect()->route('admin.cms.ftp.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FTP  $fTP
     * @return \Illuminate\Http\Response
     */
    public function edit($fTP)
    {
        $data['app'] = $this->app;
        $data['ftpCategory'] = FTPCategory::all();
        $data['ftp'] = FTP::find($fTP);
        return view('backend.admin.ftp.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FTP  $fTP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fTP)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'url' => 'required',
        ]);
        $fTP = FTP::find($fTP);
        $fTP->title = $request->name;
        $fTP->category_id = $request->category;
        $fTP->url = $request->url;
        $fTP->save();
        Session::flash('message', "FTP Update Successfull");
        return redirect()->route('admin.cms.ftp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FTP  $fTP
     * @return \Illuminate\Http\Response
     */
    public function destroy($ftp)
    {
        FTP::destroy($ftp);
        Session::flash('message', "FTP Delete Successfull");
        return redirect()->route('admin.cms.ftp.index');
    }
}
