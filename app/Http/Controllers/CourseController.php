<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function show(string $course)
    {
        $course = Course::where(['url' => $course])->first();

        return view('course.show', [
            'course' => $course,
        ]);
    }

    public function list(string $category)
    {
        $courses = Course::where(['category' => $category])->paginate(16);

        return view('course.list', [
            'courses' => $courses,
            'category' => $category,
        ]);
    }
}
