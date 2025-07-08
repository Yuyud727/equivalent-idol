<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\SocialMedia;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'members' => Member::active()->ordered()->get() ?? collect(),
                'latestNews' => News::published()->latest()->take(3)->get() ?? collect(),
                'events' => Event::active()->take(5)->get() ?? collect(), 
                'galleries' => Gallery::featured()->active()->ordered()->take(5)->get() ?? collect(),
                'upcomingEvents' => Event::upcoming()->take(3)->get() ?? collect(),
                'featuredGallery' => Gallery::featured()->ordered()->take(6)->get() ?? collect(),
                'socialMedia' => SocialMedia::active()->ordered()->get() ?? collect()
            ];

            // Debug - uncomment untuk test
            // dd($data['galleries']);

            return view('home', $data);
            
        } catch (\Exception $e) {
            // Fallback jika ada error
            $data = [
                'members' => collect(),
                'latestNews' => collect(),
                'events' => collect(), 
                'galleries' => collect(),
                'upcomingEvents' => collect(),
                'featuredGallery' => collect(),
                'socialMedia' => collect()
            ];
            
            // Log error untuk debugging
            \Log::error('HomeController error: ' . $e->getMessage());
            
            return view('home', $data);
        }
    }
}