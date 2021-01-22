<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Models\Course;

class SectionController extends Controller
{
    public function create(Request $request, string $courseUrl)
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
        
        $course = Course::where([
            'url' => $courseUrl, 
            'user_id' => Auth::user()->id
        ])->first();
        
        return view('section.update', [
            'course' => $course,
        ]);
    }
}
