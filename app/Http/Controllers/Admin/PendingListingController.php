<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class PendingListingController extends Controller
{
    public function index()
    {
        $listings = Listing::query()->where('is_approved' , 0)->get();
        return view('admin.listing.pending.index',compact('listings'));
    }
}
