<?php

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