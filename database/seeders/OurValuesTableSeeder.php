<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('headlines')->insert([
            [
                'title' => 'We Have Made Headlines !',
                'short_description' => 'Exploring the Achievements Across Our Group Entities',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
