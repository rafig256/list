<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function index()
    {
        $listingCount = Listing::where('user_id',auth()->user()->id)->count();
        $pendingListingCount = Listing::where('user_id',auth()->user()->id)->where('is_approved' , 0 )->count();
        $totalReview = Review::where('user_id',auth()->user()->id)->count();
        return view('frontend.dashboard.index' ,compact('totalReview','pendingListingCount','listingCount'));
    }
}
