<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Traits\ReviewTrait;


class ReviewController extends Controller
{
    use ReviewTrait;
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
        $this->reviewDestroy($review);

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
