<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:courses|max:255',
            'cover_picture_path' => 'required',
            'language' => 'required',
            'description' => 'required|min:10|max:255',
            'overview' => 'required|min:100|max:1000',
            'category' => 'required',
        ]);

        $course = Course::make($request->all());
        $course->url = Str::slug($course->name, '-');

        Auth::user()->courses()->save($course);

        return redirect()->route('section.create', ['courseUrl' => $course->url]);

    }

    public function createSection(string $courseUrl)
    {
        $course = Course::where([
            'url' => $courseUrl, 
            'user_id' => Auth::user()->id
        ])->first();

        if (!$course) {
            redirect()->route('home');
        }
        
        return view('section.update', [
            'course' => $course,
        ]);
    }
}
