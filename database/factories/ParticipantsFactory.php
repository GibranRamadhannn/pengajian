<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participants>
 */
class ParticipantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $randomNumber = random_int(1000, 9999);
        // Get the current date in the format Ymd
        $date = now()->format('Ymd');
        // Create the token
        $token = 'CI' . $date . '-' . $randomNumber;

        return [
            // Your participant attributes here, e.g.:
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'gender'=> 'W',
            'age'=>fake()->numberBetween(12, 40),
            'status_check_in' => 0,
            'barcode_check_in_1'=>$token

            // other fields
        ];
    }
}
