<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AgentScheduleConrtoller extends Controller
{
    public function create(Listing $listing)
    {
        if (\Auth::user()->id !== $listing->user_id){abort(403);}
        if (Schedule::query()->where('listing_id', $listing->id)->exists()){
            //Edit Schedule
            return view('frontend.dashboard.listing.schedule.edit',compact(['listing']));
        }
        //create new Schedule
        return view('frontend.dashboard.listing.schedule.create',compact('listing'));
    }

    public function store(Request $request , Listing $listing)
    {
        // Validate input (you can add other validation rules as needed)
        $request->validate([
            'start_time.*' => 'nullable|date_format:H:i',
            'end_time.*' => 'nullable|date_format:H:i',
        ]);
        if (\Auth::user()->id !== $listing->user_id){abort(403);}
        // Save business hours data to the database
        foreach ($request->input('start_time') as $day => $startTime) {
            $endTime = $request->input('end_time')[$day];
            $close = $request->input('close')[$day] ?? false;
            Schedule::query()->create((array)[
                'listing_id' => $listing->id,
                'day' => $day ,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'status' => $close ? 1 : 0,
            ]);
        }
        toastr()->success('Schedule created successfully.');

        return to_route('user.listing.index');
    }


    public function update(Request $request, Listing $listing)
    {
        if (\Auth::user()->id !== $listing->user_id){abort(403);}
        // Validate input (you can add other validation rules as needed)
        $request->validate([
            'start_time.*' => 'nullable|string',
            'end_time.*' => 'nullable|string',
        ]);

        // Save business hours data to the database
        foreach ($request->input('start_time') as $day => $startTime) {
            $endTime = $request->input('end_time')[$day];
            $close = $request->input('close')[$day] ?? false;
            Schedule::query()->where('listing_id',$listing->id)->where('day',$day)->update((array)[
                'listing_id' => $listing->id,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'status' => $close ? 1 : 0,
            ]);
        }
        toastr()->success('Schedule Update successfully.');

        return to_route('user.listing.index');
    }
}
