<?php
namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::active()->ordered()->get();
        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }
}