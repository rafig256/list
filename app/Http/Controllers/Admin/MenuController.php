<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu builder index']);
    }
    public function index()
    {
        return view('admin.menu.index');
    }
}
