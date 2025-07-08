<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Aria Kusuma',
                'stage_name' => 'Aria',
                'position' => 'Leader, Main Vocal',
                'birth_date' => '2002-03-15',
                'nationality' => 'Indonesia',
                'bio' => 'Leader dan main vocal dari Equivalent dengan suara yang powerful.',
                'color_theme' => '#ff6b9d',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Sari Indah',
                'stage_name' => 'Sari',
                'position' => 'Main Dancer, Sub Vocal',
                'birth_date' => '2003-07-22',
                'nationality' => 'Indonesia',
                'bio' => 'Main dancer dengan gerakan yang enerjik dan penuh semangat.',
                'color_theme' => '#4ade80',
                'order' => 2,
                'is_active' => true
            ],
            // Add more members...
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}