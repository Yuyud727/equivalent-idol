<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event_date' => Carbon::parse('2025-02-16'),
                'event_name' => 'Semilir Hobby Fest',
                'location' => 'Dusun Semilir, Semarang, Jawa Tengah',
                'status' => 'upcoming',
                'ticket_url' => 'https://example.com/tickets/hobby-fest',
                'description' => 'Festival hobi tahunan dengan berbagai pertunjukan dan pameran',
                'is_featured' => true,
                'order' => 1
            ],
            [
                'event_date' => Carbon::parse('2025-02-23'),
                'event_name' => 'Lawang Sewu Cosplay Carnival',
                'location' => 'Lawang Sewu, Semarang, Jawa Tengah',
                'status' => 'upcoming',
                'ticket_url' => 'https://example.com/tickets/cosplay-carnival',
                'description' => 'Karnaval cosplay di lokasi bersejarah Lawang Sewu',
                'is_featured' => true,
                'order' => 2
            ],
            [
                'event_date' => null, // TBA
                'event_name' => 'TBA',
                'location' => 'TBA',
                'status' => 'tba',
                'ticket_url' => null,
                'description' => 'Event akan diumumkan segera',
                'is_featured' => false,
                'order' => 3
            ],
            [
                'event_date' => null, // TBA
                'event_name' => 'TBA',
                'location' => 'TBA',
                'status' => 'tba',
                'ticket_url' => null,
                'description' => 'Event akan diumumkan segera',
                'is_featured' => false,
                'order' => 4
            ],
            [
                'event_date' => null, // TBA
                'event_name' => 'TBA',
                'location' => 'TBA',
                'status' => 'tba',
                'ticket_url' => null,
                'description' => 'Event akan diumumkan segera',
                'is_featured' => false,
                'order' => 5
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}