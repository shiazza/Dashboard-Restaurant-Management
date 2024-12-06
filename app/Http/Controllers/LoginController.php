<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller{
    public function login(Request $request) {
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}


// {
//     public function login()
//     {
//         if (Auth::check()) {
//             return redirect('/home');
//         }else{
//             return view('login');
//         }
//     }

//     public function actionlogin(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required'
//         ]);
    
//         $data = [
//             'email' => $request->email,
//             'password' => $request->password,
//         ];
    
//         if (Auth::attempt($data)) {
//             return redirect('/home');
//         } else {
//             Session::flash('error', 'Email atau Password Salah');
//             return redirect('/');
//         }
//     }
// }    