<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationController extends Controller
{
    public function index():View
    {
        return view('admin.location.index');
    }

    public function create():View
    {
        return view('admin.location.create');
    }
}
