<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use Carbon\Carbon;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Group Photo - Equivalent Debut',
                'description' => 'Official debut photo of Equivalent members in their signature costumes',
                'image_path' => 'gallery/Dokumentasi_1.jpg',
                'thumbnail_path' => 'gallery/thumbs/Dokumentasi_1-thumbs.jpg', // FIXED: Added 'gallery/' prefix
                'category' => 'group',
                'tags' => ['debut', 'group', 'official', 'costume'],
                'order' => 1,
                'is_featured' => true,
                'is_active' => true,
                'taken_date' => Carbon::parse('2025-01-15'),
                'photographer' => 'Studio Photography',
                'members_tagged' => [1, 2, 3, 4, 5], // All members
            ],
            [
                'title' => 'Performance at Hobby Fest',
                'description' => 'Equivalent performing at Semilir Hobby Fest 2025',
                'image_path' => 'gallery/Dokumentasi_2.jpg',
                'thumbnail_path' => 'gallery/thumbs/Dokumentasi_2-thumbs.jpg', // FIXED: Added 'gallery/' prefix
                'category' => 'performance',
                'tags' => ['performance', 'stage', 'hobby-fest', 'live'],
                'order' => 2,
                'is_featured' => true,
                'is_active' => true,
                'taken_date' => Carbon::parse('2025-02-16'),
                'photographer' => 'Event Photography',
                'members_tagged' => [1, 2, 3, 4, 5],
            ],
            [
                'title' => 'Behind The Scenes - Costume Fitting',
                'description' => 'Members trying on their new costumes for upcoming performance',
                'image_path' => 'gallery/Dokumentasi_3.jpg',
                'thumbnail_path' => 'gallery/thumbs/Dokumentasi_3-thumbs.jpg', // FIXED: Added 'gallery/' prefix
                'category' => 'behind-scenes',
                'tags' => ['bts', 'costume', 'preparation', 'candid'],
                'order' => 3,
                'is_featured' => true,
                'is_active' => true,
                'taken_date' => Carbon::parse('2025-02-10'),
                'photographer' => 'Staff',
                'members_tagged' => [1, 2, 3, 4, 5],
            ],
            [
                'title' => 'Cosplay Event Preparation',
                'description' => 'Getting ready for Lawang Sewu Cosplay Carnival',
                'image_path' => 'gallery/Dokumentasi_4.jpg',
                'thumbnail_path' => 'gallery/thumbs/Dokumentasi_4-thumbs.jpg', // FIXED: Added 'gallery/' prefix
                'category' => 'event',
                'tags' => ['cosplay', 'event', 'preparation', 'lawang-sewu'],
                'order' => 4,
                'is_featured' => true,
                'is_active' => true,
                'taken_date' => Carbon::parse('2025-02-20'),
                'photographer' => 'Event Team',
                'members_tagged' => [1, 2, 3, 4, 5],
            ],
            [
                'title' => 'Studio Photoshoot Session',
                'description' => 'Professional photoshoot for upcoming promotional materials',
                'image_path' => 'gallery/Dokumentasi_5.jpg',
                'thumbnail_path' => 'gallery/thumbs/Dokumentasi_5-thumbs.jpg', // FIXED: Added 'gallery/' prefix
                'category' => 'photoshoot',
                'tags' => ['photoshoot', 'professional', 'studio', 'promo'],
                'order' => 5,
                'is_featured' => true,
                'is_active' => true,
                'taken_date' => Carbon::parse('2025-01-25'),
                'photographer' => 'Professional Photographer',
                'members_tagged' => [1, 2, 3, 4, 5],
            ]
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}