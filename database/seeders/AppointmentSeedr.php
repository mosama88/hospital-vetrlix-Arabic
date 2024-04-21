<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('appointments')->delete();
    $appointments = [
        ['name' => 'السبت'],
        ['name' => 'الأحد'],
        ['name' => 'الإثنين'],
        ['name' => 'الثلاثاء'],
        ['name' => 'الأربعاء'],
        ['name' => 'الخميس'],
        ['name' => 'الجمعه'],
    ];

    foreach($appointments as $appointment){
        Appointment::create($appointment);
    }

    }
}
