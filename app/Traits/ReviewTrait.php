<?php
namespace App\Traits;

use App\Models\ListingPoints;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

trait ReviewTrait
{
    public function reviewDestroy(Review $review){
        try {
            DB::beginTransaction();

            $rate = $review->points()->pluck('rate')->first();
            $listing_id = $review->listing_id;

            foreach ($review->points as $point) {
                $review_cat_id = $point->review_cat_id;
                ListingPoints::query()->where(['listing_id' => $listing_id, 'review_cat_id' => $review_cat_id])
                    ->decrementEach(['count_review' => $rate, 'sum_star' => $rate * $point->point]);
            }
            toastr()->success('Review deleted successfully');
            $review->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Error deleting review: ' . $e->getMessage());
        }
    }
}
