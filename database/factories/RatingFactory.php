<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'script_id' =>$this->faker->numberBetween(1,10) ,
            'script_user_id' =>$this->faker->numberBetween(1,10) ,
            'rating_user_id' =>$this->faker->numberBetween(1,10) ,
            'rating' =>$this->faker->numberBetween(0,2) ,
        ];
    }
}
