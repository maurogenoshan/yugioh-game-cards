<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(array('Monstruo', 'Monstruos de Efecto', 'Monstruos de Ritual', 'Cartas de Trampa de Contraefecto')),
            'parent_id' => $this->faker->randomElement(array('Monstruos Normales', 'Monstruos de Efecto', 'Monstruos de Ritual', 'Cartas de Trampa de Contraefecto'))
        ];
    }
}
