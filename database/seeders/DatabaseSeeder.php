<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Laptop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@mail.test',
            'password' => bcrypt('password'),
        ]);

        Brand::factory(5)->create();
        Laptop::factory(10)->create();
    }
}
