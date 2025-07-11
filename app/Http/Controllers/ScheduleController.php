<?php

// ===============================================
// UPDATED SCHEDULECONTROLLER
// ===============================================

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $events = Schedule::orderBy('row_number')
            ->orderBy('event_date')
            ->get();
            
        return view('schedule.index', compact('events'));
    }

    public function show($id)
    {
        $event = Schedule::findOrFail($id);
        
        return response()->json([
            'id' => $event->id,
            'event_name' => $event->event_name,
            'location' => $event->location,
            'formatted_date' => $event->formatted_date,
            'description' => $event->description,
            'instagram_url' => $event->instagram_url,
            'youtube_url' => $event->youtube_url,
            'status' => $event->status,
            'status_text' => $event->status_text,
            'event_date' => $event->event_date?->format('Y-m-d H:i:s'),
        ]);
    }
}


