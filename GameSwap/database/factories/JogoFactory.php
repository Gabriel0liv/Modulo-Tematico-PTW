<?php

namespace Database\Factories;

use App\Models\Console;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsoleFactory extends Factory
{
    protected $model = Console::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->word,
            'preco' => $this->faker->randomFloat(2, 100, 500),
        ];
    }
}
