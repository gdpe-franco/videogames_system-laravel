<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videogame>
 */
class VideogameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->word(),
            'image' => $this->faker->image(null, 400, 320, null, false),
            'rating_id' => $this->faker->numberBetween(1,7),
            'console_id' => $this->faker->numberBetween(1,4),
            'purchase_price' => $pprice = $this->faker->randomFloat(2),
            'sale_price' => $pprice*1.4,
            'url' => Str::slug($title)
        ];
    }
}
