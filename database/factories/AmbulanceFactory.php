<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ambulance>
 */
class AmbulanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carModels = ['Mitsubishi','BMW','BYD','Mercedes','Hyundai','Daewoo','Honda'];

        return [
'name'=>$this->faker->name,
'car_number' => $this->faker->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}'), // Generate a random car number pattern
'car_model' => $this->faker->randomElement($carModels),
'car_year_model' => $this->faker->numberBetween(2000, date('Y')), // Generate a random year between 1950 and current year
'license_number'=>$this->generatePhoneNumber(14),
'phone' => $this->faker->regexify('/^(012|015|010)[0-9]{8}$/'),
'available' => $this->faker->numberBetween(1, 2), // Generate a random number between 1 and 2
'type'=>$this->faker->numberBetween(1, 2),
'notes'=>$this->faker->paragraph(2),
        ];
    }

    private function generatePhoneNumber($digits)
    {
        $phoneNumber = '0'; // Assuming it's a national number
        // Generate the remaining digits randomly
        for ($i = 1; $i < $digits; $i++) {
            $phoneNumber .= mt_rand(0, 9);
        }

        return $phoneNumber;
    }
}

