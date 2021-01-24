@extends('layouts.learn')

@section('title', $course->name)

@section('content')

    @include('partials.navigationLearn')

    <div class="res-lecture">
        @include('course.partials.embed', ['video' => $content->content])

        <div class="container px-4 py-2">
            <h3 class="bold">Sobre este curso</h3>
            <p>{{ $course->description }}</p>

            <div class="border-top"></div>
            Descrição: <br>
            {{ $course->overview }}
            
        </div>
    </div>
    
    <div class="res-aside">
        <div class="bg-white shadow">
            <p class="p-3 bold" style="border-radius: 0;margin: 0;">Conteúdo do curso</p>
        </div>
        <div class="accordion" id="accordionContentsTable" style="border-radius: 0;margin: 0; padding: 0">
            @foreach($course->sections->sortBy('order') as $section)
                @include('course.partials.accordionItem', ['lecture' => true])
            @endforeach
        </div>
    </div>

    @include('partials.footer')

@endsection

