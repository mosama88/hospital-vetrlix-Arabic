<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        \App\Models\Appointment::factory(7)->create();

        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            SectionSeeder::class,
            DoctorSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
