<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin(){
        // dd(bcrypt('thainguyen'));
        if(auth()->check()){
            return redirect()->to('/home');
        }
        return view('login');
    }

    public function postLoginAdmin(Request $request){
        // dd($request->has('remember_me'));
        $remember = $request->has('remember_me') ? true:false;
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)){
            return redirect()->to('/home');
        }
    }
}
