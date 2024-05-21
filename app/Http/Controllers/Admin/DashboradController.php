<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $listing = Listing::all()->count();
        $review = Review::all()->count();
        $post = Post::all()->count();
        return view('admin.dashboard.index' , compact('users' , 'post' , 'listing' , 'review'));
    }

    //
}
