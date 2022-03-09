<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstName = $this->faker->unique()->name();
        $lastName = $this->faker->lastName();
        return [
            'fullname' => $firstName.''.$lastName,
            'login' => $firstName,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'current_balance' => $this->faker->randomFloat(10, 1, 500),
            'admin_id'  => Admin::inRandomOrder()->first()->id,
        ];
    }
}
