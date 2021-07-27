<?php

namespace Database\Factories;

use App\Models\Cate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
