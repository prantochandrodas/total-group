<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home_abouts')->insert([
            [
                'image' => 'about_image1.jpg', // path or filename
                'title' => 'Our Mission',
                'description' => 'Our mission is to deliver exceptional services and unparalleled quality to our customers...',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
