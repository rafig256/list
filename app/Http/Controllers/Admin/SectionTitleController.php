<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use Illuminate\Http\Request;

class SectionTitleController extends Controller
{
    public function index()
    {
        $sectionTitle = SectionTitle::all()->toArray();
        return view('admin.section-title.index', ['sectionTitle' => array_shift($sectionTitle)]);
    }

    public function update(Request $request){
//        dd($request->all());
        SectionTitle::query()->updateOrCreate(
            ['id' => 1],
            [
                'features_title' => $request->features_title,
                'features_text' => $request->features_text,
                'features_status' => $request->features_status ? 1 : 0,
                'categories_title' => $request->categories_title,
                'categories_text' => $request->categories_text,
                'categories_status' => $request->categories_status ? 1 : 0,
                'location_title' => $request->location_title,
                'location_text' => $request->location_text,
                'location_status' => $request->location_status ? 1 : 0,
                'featuredListing_title' => $request->featuredListing_title,
                'featuredListing_text' => $request->featuredListing_text,
                'featuredListing_status' => $request->featuredListing_status ? 1 : 0,
                'pricing_title' => $request->pricing_title,
                'pricing_text' => $request->pricing_text,
                'pricing_status' => $request->pricing_status ? 1 : 0,
                'testimonials_title' => $request->testimonials_title,
                'testimonials_text' => $request->testimonials_text,
                'testimonials_status' => $request->testimonials_status ? 1 : 0,
                'blogs_title' => $request->blogs_title,
                'blogs_text' => $request->blogs_text,
                'blogs_status' => $request->blogs_status ? 1 : 0,
            ]);
        toastr()->success('section title and status updated Successfully!');

        return redirect()->back();
    }
}
