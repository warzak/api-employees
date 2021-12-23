<?php

namespace Database\Factories;

use App\Models\Address;
use Blit\StatesAndCities\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'city_id' => City::pluck('id')[$faker->numberBetween(1,City::count()-1)],
            'name' => $faker->streetName(),
            'street' => $faker->streetAddress(),
            'number' => $faker->randomNumber(),
            'complement' => $faker->randomLetter,
            'district' => $faker->streetSuffix,
            'postal_code' => $faker->postcode(),
        ];
    }
}
