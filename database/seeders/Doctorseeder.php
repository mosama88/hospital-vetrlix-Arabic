<?php
namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class Doctorseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                Doctor::factory()->count(30)->create();
                $Appointments = Appointment::all();

                Doctor::all()->each(function ($doctor) use ($Appointments) {
                $doctor->doctorappointments()->attach(
                $Appointments->random(rand(1,7))->pluck('id')->toArray()
                );
        });

        #######################################################################################

// $doctors = Doctor::factory()->count(30)->create();


// foreach($doctors as $doctor){
//     $appointments = Appointment::all()->random()->id;
//     $doctor -> doctorappointments()->attach($appointments);
// }



    }
}
