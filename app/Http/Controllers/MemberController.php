<?php

<<<<<<< HEAD
// ===============================================
// UPDATED MEMBERCONTROLLER
// ===============================================

=======
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
namespace App\Http\Controllers;

use App\Models\DetailMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
<<<<<<< HEAD
     * Display members listing
=======
     * Display members for about section
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
     */
    public function index()
    {
        $members = DetailMember::ordered()->get();
<<<<<<< HEAD
        return view('members.index', compact('members'));
    }

    /**
     * Show specific member
=======
        
        // Debug: Log untuk memeriksa data
        \Log::info('Members data:', $members->toArray());
        
        return view('home', compact('members'));
    }

    /**
     * Get member detail for modal (AJAX)
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
     */
    public function show($memberNo)
    {
        $member = DetailMember::findByNumber($memberNo);
        
        if (!$member) {
<<<<<<< HEAD
            abort(404, 'Member not found');
        }
        
        return view('members.show', compact('member'));
    }

    /**
     * Get all members data for JavaScript/AJAX
=======
            return response()->json([
                'error' => 'Member not found'
            ], 404);
        }

        return response()->json([
            'id' => $member->id,
            'member_no' => $member->member_no,
            'name' => $member->name,
            'photo' => $member->photo,
            'photo_url' => $member->photo_url,
            'color' => $member->color,
            'birth_date' => $member->birth_date->format('Y-m-d'),
            'formatted_birth_date' => $member->formatted_birth_date,
            'age' => $member->age,
            'jiko' => $member->jiko,
            'short_jiko' => $member->short_jiko,
            'next_member_no' => $member->next_member->member_no ?? null,
            'previous_member_no' => $member->previous_member->member_no ?? null
        ]);
    }

    /**
     * Get all members data for JavaScript
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
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
<<<<<<< HEAD
                    'color' => $member->color,
                    'birth_date' => $member->birth_date->format('Y-m-d'),
=======
                    'photo_url' => $member->photo_url,
                    'color' => $member->color,
                    'birth_date' => $member->birth_date->format('Y-m-d'),
                    'formatted_birth_date' => $member->formatted_birth_date,
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
                    'jiko' => $member->jiko
                ]
            ];
        });

        return response()->json($memberData);
    }
}