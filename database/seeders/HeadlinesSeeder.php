<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeadlinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('headlines')->insert([
            [
                'title' => 'Our Values',
                'short_description' => 'At our core, we embody fundamental beliefs that drive excellence and integrity.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
