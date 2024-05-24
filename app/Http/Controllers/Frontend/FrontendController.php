<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Hero;
use App\Models\Listing;
use App\Models\ListingPoints;
use App\Models\Location;
use App\Models\message;
use App\Models\Package;
use App\Models\Post;
use App\Models\Report;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\SectionTitle;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index() : View
    {
        $hero = Hero::query()->first();
        $parentCategories = Category::query()->where(['status' => 1 , 'parent_id' => NULL])->get();
        $categories = Category::query()->where('status',1)->where('parent_id','>',0)->get();
        $packages = Package::query()->where('status',1)->where('show_at_home',1)->take(3)->get();
        $featuredCategories = Category::query()->where('parent_id',NULL)->where('show_at_home',1)->take(9)->get();
        $locations = Location::query()->with('listings',function ($query){
            $query->where(['is_featured' => 1,'status'=>1,'is_approved'=>1])->limit(8);
        })->where(['status'=>1 , 'show_at_home'=>1 ,])->where('parent_id','>',0)->take(20)->get();
        $parentLocations = Location::query()->where(['status'=>1 , 'show_at_home'=>1 ,'parent_id'=> NULL])->get();
//        dd($locations);
        $listingsFeature = Listing::query()->where(['status'=>1 , 'is_approved' => 1 , 'is_featured' => 1])->orderBy('id','desc')->get();
        $testimonials = Testimonial::query()->where('status' , 1)->take(6)->get();
        $posts = Post::query()->where('status' , 1)->take(3)->get();
        $sectionTitle = SectionTitle::all()->toArray();
//dd(array_shift($sectionTitle));
        return view('frontend.home.index',[
            'hero'=>$hero,
            'categories' => $categories,
            'packages' => $packages,
            'featuredCategories'=>$featuredCategories,
            'parentLocations' => $parentLocations,
            'locations' => $locations,
            'listingsFeature' => $listingsFeature,
            'parentCategories'=>$parentCategories,
            'testimonials' => $testimonials,
            'posts' => $posts,
            'sectionTitle' => array_shift($sectionTitle),
        ]);
    }

    public function listing(Request $request)
    {
        $listings = Listing::query()->where(['is_approved' => 1 ,'status' => 1]);

        if ($request->has('search') && $request->filled('search')) {

            $listings->where(function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->has('parent_category') && $request->filled('parent_category')) {
           $parentCategorySlug = $request->parent_category;
           $parentCategory = Category::where('slug', $parentCategorySlug)->first();
           $listings->whereIn('category_id',$parentCategory->childrens()->pluck('id')->toArray());
        }

        if ($request->has('category') && $request->filled('category')) {
            $categorySlug = $request->category;
            $listings->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        if ($request->has('parent_location') && $request->filled('parent_location')) {
            $parentLocationSlug = $request->parent_location;
            $parentLocation = Location::where('slug', $parentLocationSlug)->first();
            $listings->whereIn('location_id',$parentLocation->children()->pluck('id')->toArray());
        }

        if ($request->has('location') && $request->filled('location')){
            $locationSlug = $request->location;
            $listings->whereHas('location', function ($query) use ($locationSlug){

                $query->where(['slug'=> $locationSlug , 'status' => 1]);
            });
        }

        if ($request->has('amenity') && is_array($request->amenity)){
            $getAmenity = Amenity::query()->whereIn('slug',$request->amenity)->pluck('id');
            $listings->whereHas('amenities', function ($query) use ($getAmenity){
                $query->whereIn('amenity_id',$getAmenity);
            });
        }

        $categories = Category::query()->where('status',1)->where('parent_id' , NULL)->get();
        $locations = Location::query()->where('status' , 1)->where('parent_id' , NULL)->get();
        $amenities = Amenity::query()->where('status' , 1)->get();

        $listings = $listings->paginate(6);
        return view('frontend.pages.listing',compact('listings','categories','locations','amenities'));
    }

    public function listingAjaxModal(Listing $listing)
    {
        return view('frontend.layouts.listing-modal',compact('listing') )->render();
    }

    public function showListing(Listing $listing) :view
    {
        $openStatus = Schedule::query()->where('listing_id',$listing->id)->where('day',\Str::lower(date('l')))->first();
        if (!$openStatus){
            $openState = 'Not Set opening time for this day';
        }elseif( $openStatus->status !== 0){
            $openState = 'closed for '.$openStatus->day;
        }
        else{
            $openState = date('H:i:s') > $openStatus->start_time && date('H:i:s') < $openStatus->end_time ? 'open' : 'close';
        }
        $reviews = Review::query()
            ->with('user')
            ->where(['listing_id'=> $listing->id , 'status' => 1])->paginate(10);
        $similarListing = Listing::query()->where('category_id',$listing->category_id)->
        where('id','!=',$listing->id)->
        orderBy('id','DESC')->take(4)->get();
        $listingPoints = ListingPoints::query()->where('listing_id' , $listing->id)->get();
        $listing->increment('views');
        return view('frontend.pages.lisiting-view',compact('listing','similarListing','openState','reviews','listingPoints'));
    }

    public function packages()
    {
        $packages = Package::query()->where('status',1)->get();
        return view('frontend.pages.packages',compact('packages'));
    }

    public function checkout(string $id) :View
    {
        $package = Package::query()->findOrFail($id);

        return view('frontend.pages.checkout',compact('package'));
    }

    /** Submit report */
    public function report(Request $request)
    {
        $request->validate([
            'name' => ['required ',' max:255'],
            'email' => ['required ',' max:255' ,'email'],
            'message' => ['required ',' max:255'],
            'listing_id' => ['required', 'integer', 'exists:listings,id']
        ]);

        $report = Report::query()->create([
            'listing_id' => $request->listing_id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
            ]);

        toastr()->success('Report submitted successfully!');

        return redirect()->back();
    }

}
