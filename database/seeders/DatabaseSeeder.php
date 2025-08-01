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
<<<<<<< HEAD
            ScheduleSeeder::class,

=======
>>>>>>> f36e3795efb760ef00dc613c5e664113bc1128e3
            // Tambahkan seeder lainnya di sini jika ada
            // NewsSeeder::class,
            GallerySeeder::class,
        ]);
    }
}