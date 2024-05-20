<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ListingPoints;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = \Auth::user()->reviews;
        return view('frontend.dashboard.review.index' ,compact('reviews'));
    }

    public function update(Request $request , Review $review)
    {
        $old_rate = $review->points->pluck('rate')->first();
        $new_rate = \Auth::user()->rate;
$test = array();
        $review->update(['text' => $request->text]);
        foreach($review->points as $point){
            ListingPoints::query()->where(['listing_id' => $review->listing_id , 'review_cat_id' => $point->review_cat_id ])
                ->incrementEach([
                    'sum_star' => ($new_rate * $request->points[$point->review_cat_id]) - ($old_rate * (int)$review->points->where('review_cat_id' ,$point->review_cat_id )->pluck('point')->first()),
                    'count_review' => $new_rate - $old_rate
                ]);
            $point->update(['point' => $request->points[$point->review_cat_id] , 'rate' => \Auth::user()->rate]);
            $test['listing_id'][] = $review->listing_id;
            $test['review_cat_id'][] = $point->review_cat_id;
            $test['newRate'] = $new_rate;
            $test['oldRate'] = $old_rate;
            $test['newPoint'][] = $request->points[$point->review_cat_id];
            $test['oldPoint'][] = (int)$review->points->where('review_cat_id' ,$point->review_cat_id )->pluck('point')->first();
        }
//        dd($test);
        toastr()->success('Review Updated Successfully!');
        return redirect()->back();
    }
}
