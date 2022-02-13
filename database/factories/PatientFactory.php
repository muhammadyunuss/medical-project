<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->streetAddress(),
            'pekerjaan' => $this->faker->jobTitle(),
            'agama' => $this->faker->creditCardType(),
            'umur' => $this->faker->numberBetween($min = 1, $max = 55),
            'hp' => $this->faker->phoneNumber(),
            'kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'status_menikah' => $this->faker->randomElement(['Sudah Menikah', 'Belum Menikah']),
            'created_by' => $this->faker->name(),
            'updated_by' => $this->faker->name(),
        ];
    }
}
