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
                $order = $course->sections->last()->order + 1;
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

    public function delete(Request $request)
    {
        $this->validate($request, [
            'section_id' => 'required',
        ]);

        $section = Section::findOrFail($request->section_id);
        $sectionOrder = $section->order;
        
        if ($section->course->user_id == Auth::user()->id) {
            $section->delete();
        }

        foreach($section->course->sections as $section) {
            if ($sectionOrder < $section->order) {
                $section->order--;
                $section->save(); 
            }
        }

        return redirect()->back();
    }

    public function orderUpdate(Request $request, string $method, int $section)
    {

        $courseSection = Section::find($section);
        if (!$courseSection->course->user_id == Auth::user()->id) {
            return redirect()->back();
        }

        $sections = $courseSection->course->sections->sortBy('order');

        if ($method == 'up') {
            $nextIndex = $sections->reverse()->search(function ($item, $key) use ($method, $courseSection) {
                return $item->order < $courseSection->order;
            });
        } else {
            $nextIndex = $sections->search(function ($item, $key) use ($method, $courseSection) {
                return $item->order > $courseSection->order;
            });
        }

        if ($nextIndex) {
            $nextSection = $sections[$nextIndex];

            $temp = $courseSection->order;
            $courseSection->order = $nextSection->order;
            $nextSection->order = $temp;

            $courseSection->save();
            $nextSection->save();
        }

        return redirect()->back();
    }

}
