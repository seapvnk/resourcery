<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Course;

class LearnController extends Controller
{
    public function index(string $course, $lecture = null)
    {
        $course = Course::where(['url' => $course])->get()->first();
        if (!$course) {
            return redirect()->back();
        }

        if ($lecture) {
            $lecture = Content::findOrFail($lecture);
        } else {
            $lecture = $course
                ->sections->first()
                ->contents->first();
        }

        return view('course.learn', [
            'course' => $course,
            'content' => $lecture,
        ]);
    }
}
