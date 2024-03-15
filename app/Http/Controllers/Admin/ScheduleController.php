<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create(Listing $listing)
    {
        return view('admin.listing.schedule.create',compact('listing'));
    }
}
