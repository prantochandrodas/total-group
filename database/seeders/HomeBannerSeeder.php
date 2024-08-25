<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home_banners')->insert([
            [
                'title' => 'Welcome to Our Website',
                'video' => 'https://example.com/video1.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]); 
    }
}
