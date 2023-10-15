<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $startYear = 2022;
        $endYear = 2023;
        $numberOfUsers = 20;

        for ($year = 2023; $year <= 2024;$year++) {
            for ($month = 1; $month <= 12; $month++) {
                User::factory($numberOfUsers)->create([
                    'created_at' => now()->setYear($year)->setMonth($month),
                    'updated_at' => now()->setYear($year)->setMonth($month),
                ]);
            }
        }
    }
}
