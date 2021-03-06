<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

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
        $courseStudentsCount = $course->favoritedBy()->count();

        return view('course.show', [
            'course' => $course,
            'courseStudentsCount' => $courseStudentsCount,
        ]);
    }

    public function edit(string $course)
    {
        $course = Course::where(['url' => $course])->first();
        if (!$course) {
            return redirect()->back();
        }

        return view('course.edit', [
            'course' => $course,
        ]);
    }

    public function save(Request $request)
    {

        $this->validate($request, [
            'course_id' => 'required',
        ]);

        $course = Course::findOrFail($request->course_id);
        $course->fill($request->all());
        $course->save();

        return redirect()->back();
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

    public function delete(Request $request)
    {
        $this->validate($request, ['course_id' => 'required']);

        $course = Course::findOrFail($request->course_id);
        $course->delete();

        session()->flash('message-success', 'Curso deletado com sucesso!');

        return redirect()->route('instructor.index');
    }

    public function rate(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'rating' => 'required',
        ]);

        $course = Auth::user()
            ->ratedCourses()
            ->where(['course_id' => $request->course_id])
            ->get()->first();

        if (!$course) {
            $course = COurse::findOrFail($request->course_id);
            $course->ratedBy()->attach([
                Auth::user()->id => [
                    'rating' => $request->rating,
                ],
            ]);
            
        } else {
            return response('ok', 400);
        }

        return response('ok', 200);
    }
}
