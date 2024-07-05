<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function showAuthForm() {
        return view('authenticate');
    }

    public function checkAuthenticate(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/login'); // Ganti '/dashboard' dengan route yang sesuai setelah login berhasil
        }
        return redirect()->back()->withInput()->withErrors(['msg' => 'Login failed.']); // Redirect kembali ke halaman login dengan pesan error
    }
}
