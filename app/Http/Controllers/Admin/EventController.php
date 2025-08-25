<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $event = new Event();
            $event->title = $request->title;
            $event->venue = $request->venue;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->short_description = $request->short_description;
            $event->long_description = $request->long_description;
            if ($request->hasFile('feature_image')) {
                $event->feature_image = $request->feature_image->store('uploads/events');
            }
            $event->save();
            Cache::forget('home_events');
            Cache::forget('event_lists_');
            Cache::forget('latest_events_sidebar');

            return redirect()->back()->with('message', 'Successfully Added');
        } else {
            return view('admin.events.add');
        }
    }

    public function edit(Request $request, $event)
    {
        $event = Event::where('id', $event)->first();
        if ($request->getMethod() == 'POST') {
            $event->title = $request->title;
            $event->venue = $request->venue;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->short_description = $request->short_description;
            $event->long_description = $request->long_description;
            if ($request->hasFile('feature_image')) {
                $event->feature_image = $request->feature_image->store('uploads/events');
            }
            $event->save();
            Cache::forget('home_events');
            Cache::forget('event_lists_');
            Cache::forget('latest_events_sidebar');
            return redirect()->back()->with('message', 'Successfully Updated');
        } else {
            return view('admin.events.edit', compact('event'));
        }
    }

    public function del($eventId)
{
    $event = Event::findOrFail($eventId);
    $event->delete();

    // Clear event cache after deletion
    Cache::forget('home_events');
    Cache::forget('event_lists_');  // Use dynamic key for better cache management
    Cache::forget('latest_events_sidebar');

    return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
}

}
