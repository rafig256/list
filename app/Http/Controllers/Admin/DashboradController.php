<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
//        return view('admin.layouts.master');
    }

    //
}
