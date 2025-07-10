<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailMember;
use Carbon\Carbon;

class DetailMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
            [
                'member_no' => 1,
                'name' => 'Ami',
                'photo' => 'members/Ami.jpg',
                'color' => '#ef4444',
                'birth_date' => '2002-03-15',
                'jiko' => 'Konnichiwa! Watashi wa Ami desu! Equivalent no leader toshite, minna no kokoro wo hitotsu ni suru koto ga watashi no shimei da to omotte imasu. Ongaku wo tsujite, sekai ni ai to byoudou wo tsutaetai desu. Issho ni ganbarimashou!'
            ],
            [
                'member_no' => 2,
                'name' => 'Alyaa',
                'photo' => 'members/Alyaa.jpg',
                'color' => '#ec4899',
                'birth_date' => '2003-07-22',
                'jiko' => 'Halo semua! Aku Alyaa dari Equivalent! Sebagai main dancer, aku selalu berusaha memberikan yang terbaik di setiap penampilan. Dance adalah passion ku dan aku senang bisa berbagi energi positif melalui gerakan. Mari kita dance bersama!'
            ],
            [
                'member_no' => 3,
                'name' => 'Ame',
                'photo' => 'members/Ame.jpg',
                'color' => '#fbbf24',
                'birth_date' => '2002-11-08',
                'jiko' => 'Hello everyone! I am Ame, the visual of Equivalent. Music has always been my sanctuary, and I hope my voice can bring comfort and joy to everyone who listens. Let us create beautiful memories together through our songs!'
            ],
            [
                'member_no' => 4,
                'name' => 'Ina',
                'photo' => 'members/Ina.jpg',
                'color' => '#a855f7',
                'birth_date' => '2003-01-30',
                'jiko' => 'Yo yo yo! Ina in the house! Sebagai main rapper Equivalent, aku bawa flow dan lirik yang real. Musik rap itu cara aku ekspresikan diri dan menyampaikan pesan equality yang kita bawa. Keep it 100, always!'
            ],
            [
                'member_no' => 5,
                'name' => 'Cantikkun',
                'photo' => 'members/Cantikkun.jpg',
                'color' => '#3b82f6',
                'birth_date' => '2004-05-12',
                'jiko' => 'Hai hai~ Cantikkun disini! Sebagai maknae Equivalent, aku pengen tunjukin kalau yang muda juga bisa bersinar! Dance dan perform itu passion banget buat aku. Ayo kita buat stage yang memorable bareng-bareng!'
            ]
        ];

        foreach ($members as $memberData) {
            DetailMember::updateOrCreate(
                ['member_no' => $memberData['member_no']],
                $memberData
            );
        }

        $this->command->info('Detail member data seeded successfully!');
    }
}