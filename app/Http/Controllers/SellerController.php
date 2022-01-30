<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Seller;
use App\Models\User;
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
        $data['sellers'] = Seller::all();
        $data['app'] = $this->app;
        return view('backend.admin.seller.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $data['app'] = $this->app;
        return view('backend.admin.seller.create', compact('data'));
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
            'image' => 'image|mimes:jpg,jpeg,|max:2048|min:15',
            'userName' => 'required|unique:sellers|max:15',
            'password' => 'required|',
            'fullName' => 'required|max:255',
            'nid' => 'required|max:19|unique:sellers',
            'phone' => 'required|max:11',
            'mobile' => 'max:11',
            'email' => 'required|max:255|unique:users,email',
            'address' => 'required||max:255',

        ]);

        $user = new  User();
        $sellerData = new Seller();


        $this->extracted($request, $user, $sellerData);


        Session::flash('message', "Seller Add Successfully");
        return  redirect()->route('admin.seller.index')->withInput();
    }

    public function edit(Seller $seller)
    {
        $data['sellerInfo'] = Seller::where('id', $seller->id)->first();
        $data['app'] = $this->app;
        return view('backend.admin.seller.edit', compact('data'));
    }


    public function update(Request $request, Seller $seller): RedirectResponse
    {
        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,|max:2048|min:15',
            'userName' => 'required|max:255|unique:sellers,userName,' . $seller->id,
            'password' => 'required|',
            'fullName' => 'required|max:255',
            'nid' => 'required|max:19|unique:sellers,nid,' . $seller->id,
            'phone' => 'required|max:11',
            'mobile' => 'max:11',
            'email' => 'required|max:255|unique:users,email,' . $seller->email,
            'address' => 'required||max:255',

        ]);



        $sellerData = Seller::where('id', $seller->id)->first();
        $user = User::where('id', $sellerData->user_id)->first();
        $this->extracted($request, $user, $sellerData);
        Session::flash('message', "Seller Update Successfully");
        return  redirect()->route('admin.seller.index')->withInput();
    }


    public function destroy(Seller $seller): RedirectResponse
    {

        Seller::destroy($seller->id);
        Session::flash('success', "Seller Delete Successful");
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $user
     * @param $sellerData
     * @return void
     */
    private function extracted(Request $request, $user, $sellerData): void
    {
        $user->name = $request->fullName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "Seller";
        $user->save();
        $sellerData->userName = $request->userName;
        $sellerData->password = $request->password;
        $sellerData->fullName = $request->fullName;
        $sellerData->nid = $request->nid;
        $sellerData->phone = $request->phone;
        $sellerData->mobile = $request->mobile;
        $sellerData->email = $request->email;
        $sellerData->address = $request->address;
        $sellerData->user_id = $user->id;
        if ($request->hasFile('image')) {
            $path = Helper::imageUploader($request);
            $sellerData->image = $path;
        }

        $sellerData->save();
    }
}
