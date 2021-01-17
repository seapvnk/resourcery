<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Course;
use App\Models\Section;
use App\Models\Content;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for ($i = 0; $i < 5; $i++) {
            $user = User::factory()->make();
            $user->save();

            for ($j = 0; $j < 3; $j++) {
                $course = Course::factory()->make();
                $user->courses()->save($course);
                
                for ($k = 1; $k <= 10; $k++) {
                    $section = Section::factory()->make();
                    $section->order = $k;
                    $course->sections()->save($section);

                    for ($l = 1; $l <= 15; $l++) {
                        $content = Content::factory()->make();
                        $content->order = $l;
                        $section->contents()->save($content);
                    }
                }
            }
            
        }


    }
}
