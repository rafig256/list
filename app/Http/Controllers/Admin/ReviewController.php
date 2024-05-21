<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListingPoints;
use App\Models\Review;
use Illuminate\Support\Facades\DB;


class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:listing review'])->only(['index','destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::query()->paginate(10);
        return view('admin.review.index',compact('reviews'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Review $review)
    {
        try {
            DB::beginTransaction();

            $rate = $review->points()->pluck('rate')->first();
            $listing_id = $review->listing_id;

            foreach ($review->points as $point) {
                $review_cat_id = $point->review_cat_id;
                ListingPoints::query()->where(['listing_id' => $listing_id, 'review_cat_id' => $review_cat_id])
                    ->decrementEach(['count_review' => $rate, 'sum_star' => $rate * $point->point]);
            }

            // TODO: management listing_points Table

            toastr()->success('Review deleted successfully');
            $review->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Error deleting review: ' . $e->getMessage());
        }

        return to_route('admin.review.index');
    }


    public function activate(Review $review)
    {
        $review->updateOrFail([
            'status' => 1
        ]);

        toastr()->success('review activated successfully');
        return redirect()->back();
    }

    public function disable(Review $review){
        $review->updateOrFail([
            'status' => 0
        ]);

        toastr()->warning('review disabled successfully');
        return redirect()->back();
    }
}
