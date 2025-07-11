<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Call all seeders for Equivalent Idol website
        $this->call([
            EventSeeder::class,
            MemberSeeder::class,
            SocialMediaSeeder::class,
            ScheduleSeeder::class,

            // Tambahkan seeder lainnya di sini jika ada
            // NewsSeeder::class,
            GallerySeeder::class,
        ]);
    }
}