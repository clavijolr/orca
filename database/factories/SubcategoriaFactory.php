<?php

namespace Database\Factories;

use App\Models\Subcategoria;
use Illuminate\Database\Eloquent\Factories\Factory;


class SubcategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcategoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoria_id'=>1,
            'subcategoria'=>$this->faker->unique()->name()
        ];
    }
}
