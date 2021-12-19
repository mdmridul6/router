<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Seller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $sellers=Seller::all();
        return view('backend.seller.list',compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        return view('backend.seller.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

         $request->validate([
            'image' => 'image|mimes:jpg,jpeg,|max:2048|min:100',
            'userName' => 'required|unique:sellers|max:255',
            'password' => 'required|',
            'fullName' => 'required|max:255',
            'nid' => 'required|max:19|unique:sellers',
            'phone' => 'required|max:11',
            'mobile' => 'max:11',
            'email' => 'required|max:255',
            'address' => 'required||max:255',

        ]);



        $sellerData = new Seller();
        $this->extracted($request, $sellerData);
        Session::flash('message',"Seller Add Successfully");
        return  redirect()->route('admin.seller.index')->withInput();

    }


    public function show(Seller $seller)
    {
        Session::flash('error',"seller Delete Successful");
        return redirect()->back();
    }

    public function edit(Seller $seller)
    {
        $data=Seller::where('id',$seller->id)->first();
        return view('backend.seller.edit',compact('data'));

    }


    public function update(Request $request, Seller $seller)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,|max:2048|min:100',
            'userName' => 'required|max:255|unique:sellers,userName,'.$seller->id,
            'password' => 'required|',
            'fullName' => 'required|max:255',
            'nid' => 'required|max:19|unique:sellers,nid,'.$seller->id,
            'phone' => 'required|max:11',
            'mobile' => 'max:11',
            'email' => 'required|max:255',
            'address' => 'required||max:255',

        ]);



        $sellerData =Seller::where('id',$seller->id)->first();
        $this->extracted($request, $sellerData);
        Session::flash('message',"Seller Update Successfully");
        return  redirect()->route('admin.seller.index')->withInput();

    }


    public function destroy(Seller $seller)
    {

        Seller::destroy($seller->id);
        Session::flash('success',"Seller Delete Successful");
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $seller
     * @return void
     */
    private function extracted(Request $request, $sellerData): void
    {
        $sellerData->userName = $request->userName;
        $sellerData->password = Hash::make($request->password);
        $sellerData->fullName = $request->fullName;
        $sellerData->nid = $request->nid;
        $sellerData->phone = $request->phone;
        $sellerData->mobile = $request->mobile;
        $sellerData->email = $request->email;
        $sellerData->address = $request->address;
        if ($request->hasFile('image')) {
            $path = Helper::imageUploader($request);
            $sellerData->image = $path;
        }

        $sellerData->save();
    }
}
