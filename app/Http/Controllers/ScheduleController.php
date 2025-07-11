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

<<<<<<< HEAD

=======
// ===============================================
// UPDATED MEMBERCONTROLLER
// ===============================================

namespace App\Http\Controllers;

use App\Models\DetailMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display members listing
     */
    public function index()
    {
        $members = DetailMember::ordered()->get();
        return view('members.index', compact('members'));
    }

    /**
     * Show specific member
     */
    public function show($memberNo)
    {
        $member = DetailMember::findByNumber($memberNo);
        
        if (!$member) {
            abort(404, 'Member not found');
        }
        
        return view('members.show', compact('member'));
    }

    /**
     * Get all members data for JavaScript/AJAX
     */
    public function getAllMembers()
    {
        $members = DetailMember::ordered()->get();
        
        $memberData = $members->mapWithKeys(function ($member) {
            return [
                $member->member_no => [
                    'member_no' => $member->member_no,
                    'name' => $member->name,
                    'photo' => $member->photo,
                    'color' => $member->color,
                    'birth_date' => $member->birth_date->format('Y-m-d'),
                    'jiko' => $member->jiko
                ]
            ];
        });

        return response()->json($memberData);
    }
}
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
