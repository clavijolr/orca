<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pessoa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nome=$this->faker->unique()->name();
        return [
            'nome' =>$nome,
            'razao' => $nome.' LTDA.',
            'cpfcnpj' => strval(rand(10000000000000,99999999999999)),
        ];
    }
}
