<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Section;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q', false);

        if ($search) {
            $courses = Course::where('name', 'like', "%{$search}%")->paginate(16);
        } else {
            return redirect()->route('home');
        }

        return view('course.list', [
            'courses' => $courses,
            'category' => '',
        ]);
    }

    public function show(string $course)
    {
        $course = Course::where(['url' => $course])->first();

        return view('course.show', [
            'course' => $course,
        ]);
    }

    public function list(Request $request, string $category)
    {
        $search = $request->query('q', false);

        if ($search) {
            $courses = Course::where(['category' => $category])
                ->where('name', 'like', "%{$search}%")
                ->paginate(16);
        } else {
            $courses = Course::where(['category' => $category])->paginate(16);
        }

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

        return redirect()->route('section.update', ['courseUrl' => $course->url]);

    }

    public function createSection(Request $request, string $courseUrl)
    {
        $course = Course::where([
            'url' => $courseUrl, 
            'user_id' => Auth::user()->id
        ])->first();

        if ($request->section) {
            $this->validate($request, [
                'section' => 'required|min:3|max:255',
            ]);

            if ($course->sections->last()) {
                $order = $course->sections->last()->order;
            } else {
                $order = 1;
            }

            $newSection = Section::make([
                "name" => $request->section,
                "order" => $order,
            ]);
            $course->sections()->save($newSection);
        }

        if (!$course) {
            redirect()->route('home');
        }
        
        return view('section.update', [
            'course' => $course,
        ]);
    }

    public function delete(Request $request)
    {
        $this->validate($request, ['course_id' => 'required']);

        $course = Course::findOrFail($request->course_id);
        $course->delete();

        session()->flash('message-success', 'Curso deletado com sucesso!');

        return redirect()->route('instructor.index');
    }
}
