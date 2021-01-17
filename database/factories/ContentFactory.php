<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'content' => 'https://www.youtube.com/watch?v=gvzC8MmC850',
            'duration' => 628,
            'type' => 'video',
        ];
    }

    public function createReadingContent()
    {
        return [
            'name' => $this->faker->sentence(2),
            'content' => 'https://laravel.com/docs/8.x/',
            'duration' => 628,
            'type' => 'reading',
        ];
    }
}
