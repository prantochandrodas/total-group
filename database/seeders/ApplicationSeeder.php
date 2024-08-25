<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            [
                'company_name' => 'Tech Solutions Ltd.',
                'email' => 'contact@techsolutions.com',
                'address' => '123 Tech Lane, Silicon Valley, CA',
                'logo' => 'tech_solutions_logo.png',
                'phone_1' => '+1234567890',
                'phone_2' => '+0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
