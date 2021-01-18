<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;

class InstructorController extends Controller
{
    public function index()
    {
        $courses = Course::where(['user_id' => Auth::user()->id])->paginate(1);

        return view('instructor.index', [
            'courses' => $courses,
        ]);
    }
}
