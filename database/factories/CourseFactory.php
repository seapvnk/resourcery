<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    use SoftDeletes;

    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titlePrefix = Arr::random([
            'Advanced',
            'The modern',
            'The complete',
            'Ultimate',
            'Master the'
        ]);

        $titleSubject = Arr::random([
            'React framework',
            'Laravel framework',
            'Javascript language',
            'PHP language'
        ]);

        $titleEnd = Arr::random([
            'From Scratch',
            'For Beginners',
            'From Basics to Advanced'
        ]);

        $schoolName = $this->faker->name . Arr::random(['.io', 'Web', 'Masters']);
        $courseName = "$schoolName  - $titlePrefix $titleSubject $titleEnd";

        return [
            'name' =>  $courseName,
            'language' => Arr::random(['Português', 'Español', 'English']),
            'description' => $this->faker->sentence(5),
            'overview' => $this->faker->sentence(25),
            'url' => Str::slug($courseName, '-'),
            'cover_picture_path' => Arr::random([
                'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/220px-Laravel.svg.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/220px-React-icon.svg.png',
            ]),
            'category' => Arr::random([
                'Desenvolvimento e TI',
                'Artes e design',
                'Negócios e finanças',
                'Ensino e estudo acadêmico',
                'Desenvolvimento pessoal',
                'Estilo de vida',
                'Idiomas',
                'Saúde e fitness',
            ])
        ];
    }
}
