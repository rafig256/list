<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function login() : View
    {
        return view('admin.auth.login');
    }

    public function logout()
    {
        //
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
