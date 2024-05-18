<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class PendingListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:pending listing'])->only(['index']);
        $this->middleware(['permission:pending update'])->only(['update']);
    }

    public function index()
    {
        $listings = Listing::query()->where('is_approved' , 0)->get();
        return view('admin.listing.pending.index',compact('listings'));
    }

    public function update(Request $request){
        $request->validate([
            'val' => ['boolean']
        ]);
        try {
            $listing = Listing::query()->findOr($request->id);
            $listing->update([
                'is_approved' => $request->value,
            ]);
            return response(['status' => 'success', 'message'=>"Listing updated successfully"]);
        }catch (\Exception $e){
            return response(['status' => 'error', 'message'=>$e->getMessage()]);

        }
    }
}
