<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ListingPoints;
use App\Models\Review;
use App\Models\ReviewPoints;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Sodium\increment;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reviews = \Auth::user()->reviews;
        return view('frontend.dashboard.review.index' ,compact('reviews'));
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
        $rate = \Auth::user()->rate;
        foreach ($request->points as $key => $point){
            if ($point){
                ReviewPoints::query()->create([
                    'review_id' => $review->id,
                    'review_cat_id' => $key,
                    'point' => $point,
                    'rate' => \Auth::user()->rate,
                ]);
                $listingPoint = ListingPoints::query()->where(['listing_id' => $request->listing_id, 'review_cat_id' => $key]);
                if ($listingPoint->exists()){
                    $listingPoint->incrementEach(['count_review' => $rate , 'sum_star' => $rate * $point]);
                }else{
                    ListingPoints::query()->create([
                        'listing_id' => $request->listing_id,
                        'review_cat_id' => $key,
                        'count_review' => $rate,
                        'sum_star' =>$rate * $point
                    ]);
                }
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
    public function update(Request $request , Review $review)
    {
        $old_rate = $review->points->pluck('rate')->first();
        $new_rate = \Auth::user()->rate;

        $review->update(['text' => $request->text , 'status' => 0]);
        foreach($review->points as $point){
            ListingPoints::query()->where(['listing_id' => $review->listing_id , 'review_cat_id' => $point->review_cat_id ])
                ->incrementEach([
                    'sum_star' => ($new_rate * $request->points[$point->review_cat_id]) - ($old_rate * (int)$review->points->where('review_cat_id' ,$point->review_cat_id )->pluck('point')->first()),
                    'count_review' => $new_rate - $old_rate
                ]);
            $point->update(['point' => $request->points[$point->review_cat_id] , 'rate' => $new_rate]);
        }

        toastr()->success('Your comment has been successfully updated. It will be displayed after management approval!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
