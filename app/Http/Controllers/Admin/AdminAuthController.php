<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function login() : View
    {
        return view('admin.auth.login');
    }

    public function logout() {
        Auth::logout();
        return redirect('/admin/login');
    }


//    public function dashboard()
//    {
//        return view('admin.dashboard');
//    }

    public function forget() :View
    {
        return view('admin.auth.forgot-password');
    }
}
