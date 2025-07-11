<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'row_number' => 1,
                'event_date' => Carbon::create(2025, 7, 15, 19, 0, 0),
                'event_name' => 'Album Recording Session',
                'event_description' => 'Behind the scenes of our new album recording process at the studio.',
                'location' => 'Studio A Tokyo',
                'instagram_url' => 'https://instagram.com/p/album-recording',
                'youtube_url' => null,
                'status' => 'available',
                'event_type' => 'recording',
                'is_featured' => false,
            ],
            [
                'row_number' => 2,
                'event_date' => Carbon::create(2025, 7, 22, 15, 30, 0),
                'event_name' => 'Music Video Shoot',
                'event_description' => 'Filming our latest music video with exciting new concept and choreography.',
                'location' => 'Shibuya Studios',
                'instagram_url' => 'https://instagram.com/p/mv-shoot',
                'youtube_url' => null,
                'status' => 'available',
                'event_type' => 'shoot',
                'is_featured' => false,
            ],
            [
                'row_number' => 3,
                'event_date' => Carbon::create(2025, 7, 25, 20, 0, 0),
                'event_name' => 'Live Streaming Special',
                'event_description' => 'Special live streaming event with performances and member interactions.',
                'location' => 'Online Platform',
                'instagram_url' => null,
                'youtube_url' => 'https://youtube.com/live/special-stream',
                'status' => 'live',
                'event_type' => 'live_stream',
                'is_featured' => true,
            ],
            [
                'row_number' => 4,
                'event_date' => Carbon::create(2025, 8, 2, 18, 0, 0),
                'event_name' => 'Music Festival Performance',
                'event_description' => 'Special performance at the annual summer music festival.',
                'location' => 'Tokyo Big Sight',
                'instagram_url' => null,
                'youtube_url' => null,
                'status' => 'tba',
                'event_type' => 'performance',
                'is_featured' => false,
            ],
            [
                'row_number' => 5,
                'event_date' => Carbon::create(2025, 8, 10, 14, 0, 0),
                'event_name' => 'Photo Session Documentation',
                'event_description' => 'Professional photo session for upcoming promotional materials.',
                'location' => 'Harajuku Studio',
                'instagram_url' => 'https://instagram.com/p/photo-session',
                'youtube_url' => null,
                'status' => 'available',
                'event_type' => 'photoshoot',
                'is_featured' => false,
            ],
            [
                'row_number' => 6,
                'event_date' => Carbon::create(2025, 8, 18, 16, 0, 0),
                'event_name' => 'Radio Show Interview',
                'event_description' => 'Special interview session on popular radio show talking about our journey.',
                'location' => 'J-Wave Studio',
                'instagram_url' => 'https://instagram.com/p/radio-interview',
                'youtube_url' => null,
                'status' => 'available',
                'event_type' => 'interview',
                'is_featured' => false,
            ]
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}