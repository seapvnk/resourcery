<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;
use App\Models\Section;
use App\Models\Course;

class ContentController extends Controller
{
    public function create(Request $request, string $section)
    {
        $courseSection = Section::findOrFail($section);
        if ($courseSection->course->user_id != Auth::user()->id) {
            return redirect()->back();
        }

        return view('content.create', [
            'section' => $courseSection,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'section_id' => 'required',
            'name' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'duration' => 'required|max:5|min:3',
            'type' => 'required|in:video,reading',
        ]);

        $section = Section::findOrFail($request->section_id);
        if ($section->course->user_id != Auth::user()->id) {
            return redirect()->back();
        }

        $time = explode(":", $request->duration);
        $content = Content::make($request->all());

        if ($section->contents->last()) {
            $order = $section->contents->last()->order + 1;
        } else {
            $order = 1;
        }

        $content->order = $order;
        $content->duration = mktime((int) $time[0], (int) $time[1], 0, 1, 1, 1970);

        $section->contents()->save($content);

        return redirect()->route('section.edit', [
            'courseUrl' => $section->course->url, 
            'section' => $section->id
        ]);

    }

    public function delete(Request $request)
    {
        return view('welcome');
    }
}
