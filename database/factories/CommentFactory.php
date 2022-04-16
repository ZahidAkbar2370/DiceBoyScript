<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "question_id" => $this->faker->numberBetween(1,10),
            "commented_user_id" => $this->faker->numberBetween(1,10),
            "comment_to_user_id" => $this->faker->numberBetween(1,10),
            "comment" => $this->faker->text(),
        ];
    }
}
