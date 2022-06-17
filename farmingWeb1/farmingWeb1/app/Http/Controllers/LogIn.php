<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LogIn extends Controller
{
    public function index(){
        return view('layouts.log_in');
    }

    public function DangNhap(Request $request){     
       
        if(Auth::attempt($request->only('email', 'password'))){
            $users = User::Where('email', $request->input('email'))->first();
            if($users->role == 4)
                return redirect()->route('home.index');
            else{
                return redirect()->intended('admin');
            }
        }
        else{
            dd('khong co tk');
        }   
    }

    public function logout() {
        Auth::logout();
        return redirect()->intended('login');
    }
}
