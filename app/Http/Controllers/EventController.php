<?php

// ===============================================
// BACKWARD COMPATIBILITY - EVENTCONTROLLER
// ===============================================

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Redirect to schedule index
     */
    public function index()
    {
        return redirect()->route('schedule.index');
    }

    /**
     * Show event (compatible dengan Schedule)
     */
    public function show($id)
    {
        $event = Schedule::findOrFail($id);
        
        // Jika request AJAX, return JSON
        if (request()->ajax()) {
            return response()->json([
                'id' => $event->id,
                'event_name' => $event->event_name,
                'location' => $event->location,
                'formatted_date' => $event->formatted_date,
                'description' => $event->description,
                'status' => $event->status,
                'status_text' => $event->status_text,
            ]);
        }
        
        // Jika request biasa, redirect ke schedule
        return redirect()->route('schedule.show', $id);
    }
}