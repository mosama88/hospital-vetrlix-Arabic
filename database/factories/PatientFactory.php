<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthDate = $this->faker->dateTimeThisCentury()->format('Y-m-d');
        $bloodTypes = [1, 2, 3, 4, 4, 6, 7];
// Define an array of genders
        $genders = ['male', 'female'];

        // Generate a random gender
        $randomGender = $this->faker->randomElement($genders);
        return [
            'nation_number' => $this->generatePhoneNumber(14),
            'name'=> $this->faker->name,
            'email'=> $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // Hashing the password using bcrypt
            'phone' => $this->faker->regexify('/^(012|015|010|011)[0-9]{8}$/'),
        'birth_date' => $birthDate,
            'type_blood' => $this->faker->randomElement($bloodTypes),
            'gender' => $randomGender,
            'sick_history'=>$this->faker->paragraph(2),
            'address_id'=>Address::all()->random()->id,


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



