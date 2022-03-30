<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\Help;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] = Slider::all();
        return view('backend.admin.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.slider.create');
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
            'image' => 'required',
            'content' => 'required|max:255|min:40',
            'title' => 'required|max:29|min:6',
        ]);

        $slider = new Slider();
        $this->extends($slider, $request);
        Session::flash('message', 'Slider Add Successfull');
        return redirect()->route('admin.cms.slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($slider)
    {

        $data['slider'] = Slider::find($slider);
        return view('backend.admin.slider.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider)
    {
        $request->validate([
            'content' => 'required|max:255|min:40',
            'title' => 'required|max:29|min:6',
        ]);

        $slider = Slider::find($slider);
        $this->extends($slider, $request);
        Session::flash('message', 'Slider Add Successfull');
        return redirect()->route('admin.cms.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($slider)
    {
        $slider = Slider::find($slider);
        if (File::exists(public_path($slider->images))) {
            File::delete(public_path($slider->images));
        }
        $slider->delete();
        Session::flash('error', "Slider delete Successfull");
        return redirect()->back();
    }

    private function extends($slider, $request)
    {
        $slider->title = $request->title;
        if ($request->has('image')) {

            $path = Helper::imageUploader($request);
            $slider->images = $path;
        }
        $slider->content = $request->content;
        $slider->status = true;
        $slider->save();
    }
}
