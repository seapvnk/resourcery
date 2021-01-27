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
        $courseContent = Section::findOrFail($section);
        if ($courseContent->course->user_id != Auth::user()->id) {
            return redirect()->back();
        }

        return view('content.create', [
            'section' => $courseContent,
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
        $content = Content::find($request->content_id);
        $contentOrder = $content->order;

        if ($content->section->course->user_id == Auth::user()->id) {
            $content->delete();
        }

        foreach($content->section->contents as $currentContent) {
            if ($contentOrder < $currentContent->order) {
                $currentContent->order--;
                $currentContent->save(); 
            }
        }
        
        return redirect()->back();
    }

    public function edit(Request $request, string $courseUrl, string $section, string $content)
    {
        $content = Content::where([
            'section_id' => $section, 
            'id' => $content
        ])->get()->first();

        return view('content.edit', [
            'content' => $content,
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'content_id' => 'required',
        ]);

        $content = Content::findOrFail($request->content_id);

        if ($content->section->course->user_id == Auth::user()->id) {
            $content->fill($request->all());

            if ($request->duration) {
                $time = explode(":", $request->duration);
                $content->duration = mktime((int) $time[0], (int) $time[1], 0, 1, 1, 1970);
            }

            $content->save();
        }
        
        return redirect()->back(); 
    }

    public function orderUpdate(Request $request, string $method, int $content)
    {

        $courseContent = Content::find($content);
        if (!$courseContent->section->course->user_id == Auth::user()->id) {
            return redirect()->back();
        }

        $contents = $courseContent->section->contents->sortBy('order');

        if ($method == 'up') {
            $nextIndex = $contents->reverse()->search(function ($item, $key) use ($courseContent) {
                return $item->order < $courseContent->order;
            });
        } else {
            $nextIndex = $contents->search(function ($item, $key) use ($courseContent) {
                return $item->order > $courseContent->order;
            });
        }

        if ($nextIndex) {
            $nextContent = $contents[$nextIndex];

            $temp = $courseContent->order;
            $courseContent->order = $nextContent->order;
            $nextContent->order = $temp;

            $courseContent->save();
            $nextContent->save();
        }

        return redirect()->back();
    }

    public function todo(Request $request)
    {
        $this->validate($request, [
            'content_id' => 'required',
        ]);

        $content = Auth::user()
            ->lessionsDid()
            ->where([
                'content_id' => $request->content_id
        ])->get()
        ->first();


        if (!$content) {
            $content = Content::findOrFail($request->content_id);
            Auth::user()->lessionsDid()->syncWithoutDetaching($content);
        } else {
            Auth::user()->lessionsDid()->detach($content);
        }

        return response('ok', 200);
    }
}
