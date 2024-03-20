<?php

namespace Database\Seeders;

use App\Models\Booking;
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

        User::factory()->create([
            'name' => 'Demo',
            'email' => 'demo@test.test',
        ]);

        Booking::create([
            'church_id' => 1,
            'date' => now(),
            'slot_id' => 1,
            'name' => 'Doe',
            'date_of_birth' => now()->subYears(20),
            'date_of_wedding' => now()->subYears(5)
        ]);
    }
}
