<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        $socialMedia = [
            [
                'platform' => 'YouTube',
                'url' => 'https://youtube.com/@equivalent',
                'icon_class' => 'fab fa-youtube',
                'order' => 1,
                'is_active' => true
            ],
            [
                'platform' => 'TikTok',
                'url' => 'https://tiktok.com/@equivalent',
                'icon_class' => 'fab fa-tiktok',
                'order' => 2,
                'is_active' => true
            ],
            [
                'platform' => 'Instagram',
                'url' => 'https://instagram.com/equivalent',
                'icon_class' => 'fab fa-instagram',
                'order' => 3,
                'is_active' => true
            ],
            [
                'platform' => 'Facebook',
                'url' => 'https://facebook.com/equivalent',
                'icon_class' => 'fab fa-facebook',
                'order' => 4,
                'is_active' => true
            ],
            [
                'platform' => 'WhatsApp',
                'url' => 'https://wa.me/6281234567890',
                'icon_class' => 'fab fa-whatsapp',
                'order' => 5,
                'is_active' => true
            ],
            [
                'platform' => 'Spotify',
                'url' => 'https://open.spotify.com/artist/equivalent',
                'icon_class' => 'fab fa-spotify',
                'order' => 6,
                'is_active' => true
            ]
        ];

        foreach ($socialMedia as $social) {
            SocialMedia::create($social);
        }
    }
}