<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use App\Models\User;

class SignIn extends Controller
{
    public function index(){
        return view('layouts.sign_in');
    }

    public function SignUp(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender
        ]);
        return redirect()->route('login')->with('success', 'Đăng ký thành công');
        
    }
}



?>