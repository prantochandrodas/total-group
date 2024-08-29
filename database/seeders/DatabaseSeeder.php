<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(HomeBannerSeeder::class);
        $this->call(HomeAboutSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(OurValuesTableSeeder::class);
        $this->call(HeadlinesSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(MissionVisionSeeder::class);
    }
}
