<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Section;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'section_id' => Section::all()->random()->id,
        ];
    }
}
