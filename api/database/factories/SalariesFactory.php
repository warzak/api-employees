<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Salaries;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalariesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salaries::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'employee_id' => Employee::pluck('id')[$faker->numberBetween(1,Employee::count()-1)],
            'value' =>$faker->randomFloat(2, 1500, 15000),
        ];
    }
}
