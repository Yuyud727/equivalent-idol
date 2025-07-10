<?php

namespace App\Http\Controllers;

use App\Models\DetailMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display members for about section
     */
    public function index()
    {
        $members = DetailMember::ordered()->get();
        
        // Debug: Log untuk memeriksa data
        \Log::info('Members data:', $members->toArray());
        
        return view('home', compact('members'));
    }

    /**
     * Get member detail for modal (AJAX)
     */
    public function show($memberNo)
    {
        $member = DetailMember::findByNumber($memberNo);
        
        if (!$member) {
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
                    'photo_url' => $member->photo_url,
                    'color' => $member->color,
                    'birth_date' => $member->birth_date->format('Y-m-d'),
                    'formatted_birth_date' => $member->formatted_birth_date,
                    'jiko' => $member->jiko
                ]
            ];
        });

        return response()->json($memberData);
    }
}