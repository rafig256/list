<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index() : View
    {
        $hero = Hero::query()->first();
        return view('frontend.home.index',[
            'hero'=>$hero
        ]);
    }
}
