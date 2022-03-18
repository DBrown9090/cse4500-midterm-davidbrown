<?php

namespace Database\Factories;

use App\Models\employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\employee::class;
    public function definition()
    {
        return [
            'Name'=> $this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'phone'=>$this->faker->unique()->phoneNumber(),
        ];
    }
}
