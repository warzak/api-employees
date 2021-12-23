<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'address_id' => Address::pluck('id')[$faker->numberBetween(1,Address::count()-1)],
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'email' => $faker->unique()->safeEmail(),
            'cpf' => $faker->unique()->cpf(false),
            'rg' => $faker->unique()->rg(false),
            'birthday' => $faker->date,
        ];
    }
}
