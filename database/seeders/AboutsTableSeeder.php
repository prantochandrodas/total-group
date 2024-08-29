<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'image' => 'about_image_1.png',
                'home_title' => 'Welcome to Our Company',
                'short_description' => 'We are a leading company in our industry.',
                'about_title' => 'About Us',
                'long_description' => 'Our company was founded on the principles of quality and innovation...',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
