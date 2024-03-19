<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hero;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index() : View
    {
        $hero = Hero::query()->first();
        $categories = Category::all();
        return view('frontend.home.index',[
            'hero'=>$hero,
            'categories' => $categories,
        ]);
        $x = request()->routeIs($route);
    }

    public function listing(Request $request)
    {

        $listings = Listing::query()->where(['is_approved' => 1 ,'status' => 1]);
        $listings->when($request->has('category'), function ($query) use ($request){
            $query->whereHas('category',function ($query)use ($request){
                $query->where('slug',$request->category);
            });
        });

        $listings = $listings->paginate(6);
        return view('frontend.pages.listing',compact('listings'));
    }
}
