<?php

namespace Database\Factories;

use App\Models\about;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = about::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'images/default.jpg',
            'subtitle1' => $this->faker->sentence,
            'subtitle2' => $this->faker->sentence,
            'subtitle3' => $this->faker->sentence,
            'title1' => $this->faker->sentence,
            'title2' => $this->faker->sentence,
            'title3' => $this->faker->sentence,
            'description1' => $this->faker->sentence,
            'description2' => $this->faker->sentence,
            'description3' => $this->faker->sentence,
        ];
    }
}
