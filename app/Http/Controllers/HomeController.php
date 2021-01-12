<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function home()
    {
        $courses = Course::paginate(4);

        return view('home.index', [
            'courses' => $courses,
        ]);
    }
}
