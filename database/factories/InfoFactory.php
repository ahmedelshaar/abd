<?php

namespace Database\Factories;

use App\Models\Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Info::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_title' => $this->faker->sentence,
            'site_description' => $this->faker->sentence,
            'site_logo' => 'images/default.jpg',
            'info_title' => $this->faker->sentence,
            'info_description' => $this->faker->sentence,
            'info_image' => 'images/default.jpg',
            'info_experience' => 1,
            'info_client' => 25,
            'info_resume' => 'images/default.jpg',
            'service_title' => $this->faker->sentence,
            'service_description' => $this->faker->sentence,
            'service_button_text' => $this->faker->sentence,
            'service_button_link' => $this->faker->sentence,
            'service_background' => 'images/default.jpg',
            'contact_description' => $this->faker->sentence,
            'contact_map' => $this->faker->sentence,
            'contact_image' => 'images/default.jpg',
        ];
    }
}
