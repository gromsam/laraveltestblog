<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

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
            'title' => $this->faker->text(30),
            'image' => 'https://via.placeholder.com/450x300',
            'text' => $this->faker->text(2000),
            'like' => rand(10, 35),
            'view' => rand(50,110),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
            'published' => 1
        ];

    }
}
