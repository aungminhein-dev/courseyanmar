<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone'=>'09797957976',
            'address'=>'Yangon',
            'password'=>Hash::make('admin123'),
            'role'=> 'admin',
            'gender'=>'male',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone'=>'09797957976',
            'address'=>'Yangon',
            'password'=>Hash::make('user1234'),
            'role'=> 'user',
            'gender'=>'male',
        ]);
        \App\Models\Category::create([
            'name' => 'Web Development',
            'description' => 'Lorem ipsum dolor imet',
            'image'=> 'assets/images/dashboard/img_1.jpg'
        ]);
        \App\Models\Course::create([
            'name' => 'A to Z Training',
            'description' => 'Lorem ipsum dolor imet',
            'image'=> 'assets/images/dashboard/img_1.jpg',
            'duration' => '3 hours',
            'price' => '250000mmk',
            'instructor' => 'Sir Joseph',
            'rating' => '9.5',
            'buyer_count' => '1000',
            'view_count' => '1000',
            'category_id'=> 1,
        ]);
    }
}
