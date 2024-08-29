<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionVisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mission_visions')->insert([
            [
                'image' => 'path/to/image1.jpg',
                'mission_description' => 'Our mission is to provide exceptional services...',
                'vision_description' => 'Our vision is to be a global leader...',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
