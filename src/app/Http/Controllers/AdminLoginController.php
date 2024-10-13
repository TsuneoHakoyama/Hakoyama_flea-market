<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('administrators')->attempt($credentials)) {
            return redirect()->route('admin.index');
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index')->with([
            'logout_msg' => 'ログアウトしました',
        ]);
    }
}
