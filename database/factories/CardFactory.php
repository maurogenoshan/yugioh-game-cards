<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'first_edition' => $this->faker->boolean,
            'serial_code' => $this->faker->realText($this->faker->numberBetween(10, 10)),
            'ATK' => $this->faker->randomElement(array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10')),
            'DEF' => $this->faker->randomElement(array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10')),
            'starts' => $this->faker->randomElement(array('1', '2', '3', '4', '5')),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'date_created' => $this->faker->dateTime(),
        ];
    }
}
