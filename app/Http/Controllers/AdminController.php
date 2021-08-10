<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index () {
        $products= Product::all();
        return view('admin.home',['products'=> $products]);
    }

    public function login( Request $request) {
        $credentials = $request->only('email','password');
        if(Auth::guard('admin')->attempt($credentials, $request->remember)){
            $user = Admin::where('email', $request->email)->first();
            Auth::guard('admin')->login($user);

            return redirect()->route('admin.home');
        }

        return redirect()->route('admin.login')->with('status','Failed to Process Login');


    }


    public function logout () {

        if(Auth::guard('admin')->logout()) {
            return redirect()->route('admin.login')->with('status', 'logout Successfully');

    }
}

}
