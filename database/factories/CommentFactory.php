<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $dateTime = $this->faker->dateTimeBetween('-1 years', 'now', );

        return [
            'post_id' => rand(1, 50),
            'subject' => $this->faker->text(70),
            'body' => $this->faker->text(1000),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];

    }
}
