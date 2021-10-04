<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $dateTime = $this->faker->dateTimeBetween('-3 years', 'now', );

        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->text(10),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];
    }
}
