<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hero;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;

class FrontendController extends Controller
{
    public function index() : View
    {
        $hero = Hero::query()->first();
        $categories = Category::query()->where('status',1)->where('parent_id','>',0)->get();
        $packages = Package::query()->where('status',1)->where('show_at_home',1)->take(3)->get();
        $featuredCategories = Category::query()->where('parent_id',NULL)->where('show_at_home',1)->take(9)->get();
        $locations = Location::query()->with('listings',function ($query){
            $query->where(['is_featured' => 1,'status'=>1,'is_approved'=>1])->limit(12);
        })->where(['status'=>1 , 'show_at_home'=>1 ,])->where('parent_id','>',0)->take(20)->get();
        $parentLocations = Location::query()->where(['status'=>1 , 'show_at_home'=>1 ,'parent_id'=> NULL])->get();
//dd($locations);
        return view('frontend.home.index',[
            'hero'=>$hero,
            'categories' => $categories,
            'packages' => $packages,
            'featuredCategories'=>$featuredCategories,
            'parentLocations' => $parentLocations,
            'locations' => $locations,
        ]);
    }

    public function listing(Request $request)
    {

        $listings = Listing::query()->where(['is_approved' => 1 ,'status' => 1]);
//        $listings->when($request->has('category'), function ($query) use ($request){
//            $query->whereHas('category',function ($query)use ($request){
//                $query->where('slug',$request->category);
//            });
//        });


        $listings = Listing::query()->where(['is_approved' => 1, 'status' => 1])->first();

        if ($request->has('parent_category')) {
           $parentCategorySlug = $request->parent_category;
           $parentCategory = Category::where('slug', $parentCategorySlug)->first();
           $listings = Listing::query()->whereIn('category_id',$parentCategory->childrens()->pluck('id')->toArray());
        } elseif ($request->has('category')) {
            $categorySlug = $request->category;
            $listings->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        $listings = $listings->paginate(6);
        return view('frontend.pages.listing',compact('listings'));
    }

    public function listingAjaxModal(Listing $listing)
    {
        return view('frontend.layouts.listing-modal',compact('listing') )->render();
    }

    public function showListing(Listing $listing) :view
    {
        $similarListing = Listing::query()->where('category_id',$listing->category_id)->
        where('id','!=',$listing->id)->
        orderBy('id','DESC')->take(4)->get();
        return view('frontend.pages.lisiting-view',compact('listing','similarListing'));
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
}
