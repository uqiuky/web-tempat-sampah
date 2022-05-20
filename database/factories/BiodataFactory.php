<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BiodataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'birth_date' => $this->faker->buildingNumber(),
            'gender' => Str::random('male'||'female'),
            // 'email_verified_at' => now(),            
            'phone' => $this->faker->phoneNumber(),            
            'address' => $this->faker->address(),            
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'photo' => Str::random(10),
            'user_id',
        ];
    }
}
