<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'background_image' => 'path/to/background-image.jpg',
            'title' => 'Contact Us',
            'location_icon' => 'path/to/location-icon.png',
            'location_title' => 'Head Office',
            'location' => '123 Main Street, City, Country',
            'contact_icon' => 'path/to/contact-icon.png',
            'contact_title' => 'Phone',
            'contact_number' => '+123456789',
            'map_image' => 'path/to/map-image.png',
            'map_link' => 'https://maps.google.com/?q=123+Main+Street',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
