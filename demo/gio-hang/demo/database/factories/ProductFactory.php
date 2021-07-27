<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Cate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cate = Cate::query()->pluck('id')->toArray();
        return [
            'name' =>$this->faker->name(),
            'price' =>$this->faker->numberBetween(),
            'img' =>'default-product-image.png',
            'cate_id' => $this->faker->randomElement($cate),
        ];
    }
}
