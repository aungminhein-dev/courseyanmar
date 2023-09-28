<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::parse('2023-02-01');
        $endDate = Carbon::parse('2023-12-01');
        for ($i = 0; $i < 1500; $i++) {
            $randomDate = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp))->toDateString();
            User::factory()->create(['created_at' => $randomDate]);
        }
    }
}
