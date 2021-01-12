<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titleBegin = Str::random(7);
        $titleYear = date("Y");
        return [
            'name' =>  "$titleBegin [$titleYear]  - " . $this->faker->sentence(2),
            'language' => Arr::random(['PT', 'EN', 'ES']),
            'description' => $this->faker->sentence(5),
            'overview' => $this->faker->sentence(25),
            'cover_picture_path' => Arr::random([
                'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/220px-Laravel.svg.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/220px-React-icon.svg.png',
            ]),
        ];
    }
}
