<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function favorite(string $course)
    {
        $course = Course::where(['url' => $course])->get()->first();

        if ($course) {
            Auth::user()->favorites()->syncWithoutDetaching($course);
        }

        return redirect()->back();
    }
    
    public function removeFavorite(string $course)
    {
        $course = Course::where(['url' => $course])->get()->first();

        if ($course) {
            Auth::user()->favorites()->detach($course);
        }

        return redirect()->back();
    }

    public function dashboard()
    {
        $courses = Auth::user()->favorites()->paginate(12);
        
        return view('dashboard.index', [
            'courses' => $courses,
        ]);
    }

}
