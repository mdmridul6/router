<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teams'] = Team::all();
        return view('backend.admin.team.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.team.create');
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
            'designation' => 'required'
        ]);
        $team = new Team();
        $this->extends($team, $request);
        Session::flash('success', "Team Save Successfully");
        return redirect()->route('admin.cms.team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($team)
    {
        $data['team'] = Team::find($team);
        return view('backend.admin.team.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $team)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required'
        ]);
        $team = Team::find($team);

        $this->extends($team, $request);
        Session::flash('success', "Team Upadte Successfully");
        return redirect()->route('admin.cms.team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($team)
    {
        Team::destroy($team);
        Session::flash('error', "Team Delete Succesfully");
        return redirect()->back();
    }

    private function extends($team, $request)
    {
        $team->name = $request->name;
        if ($request->has('image')) {
            $path = Helper::imageUploader($request);
            $team->image = $path;
        }
        $team->designation = $request->designation;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;
        $team->linkedin = $request->linkedin;
        $team->save();
    }
}
