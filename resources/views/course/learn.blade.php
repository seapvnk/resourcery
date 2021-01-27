@extends('layouts.learn')

@section('title', $course->name)

@section('content')

    @include('partials.navigationLearn')

    <div class="res-lecture">
        
        @if ($content->type == 'video')
            @include('course.partials.embed', ['video' => $content->content])
        @else
            <div class="container border mb-4 shadow-sm p-4" >
                <div class="mb-4"></div>

                <h3 class="h1"><i class="bi bi-file-text"></i>{{ $content->name }}</h2>
                <a 
                    target="_blank"
                    href="{{ $content->content }}" class="link-default text-center"
                    style="font-size: 24px; width: 100%; text-decoration: none"
                >
                    <i class="bi bi-link"></i> {{ $content->content }}
                </a>

                <div class="mb-4"></div>
            </div>

            <div class="border-bottom"></div>
        @endif

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

