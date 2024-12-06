<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    // Show the registration form
    public function register()
    {
        return view('register');
    }
    
    // Handle the registration request
    public function actionregister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:admin,staff'
        ]);
    
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif, silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}    