<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\SocialMedia;

class EventController extends Controller
{
    public function index()
    {
        $data = [
            'members' => Member::active()->ordered()->get(),
            'latestNews' => News::published()->latest()->take(3)->get(),
            'events' => Event::active()->take(5)->get(), // Ambil 5 event terbaru
            'featuredGallery' => Gallery::featured()->ordered()->take(6)->get(),
            'socialMedia' => SocialMedia::active()->ordered()->get()
        ];

        return view('home', $data);
    }
}