<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ListingPoints;
use App\Models\Review;
use App\Models\ReviewPoints;
use Illuminate\Http\Request;
use function Sodium\increment;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required | min:3 | max: 2000',
            'listing_id' => 'required | exists:listings,id'
        ]);

        $review = Review::query()->create([
            'text' => $request->text ,
            'listing_id' => $request->listing_id,
            'user_id' => \Auth::user()->id,
            'updated_at' => NULL,
        ]);
        foreach ($request->points as $key => $point){
            if ($point){
                ReviewPoints::query()->create([
                    'review_id' => $review->id,
                    'review_cat_id' => $key,
                    'point' => $point,
                    'rate' => \Auth::user()->rate,
                ]);
//                ListingPoints::query()->updateOrCreate(
//                    ['listing_id' => $request->listing_id, 'review_cat_id' => $key],
//                    [
//                        'review_count' => \Auth::user()->rate,
//                        'sum_star' => 10,
//                    ]
//                );
            }
        }

        toastr()->success('Review Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
