@extends('layouts.default')

@section('title', 'Cursos on-line de ' . $category)

@section('content')

    <div class="course-list">
        @if ($courses->isNotEmpty())
            <h1>Cursos de {{ $category }}</h1>
            <h2>Todos os cursos em {{ $category }}</h2>

            <div class="courses-container">
                @foreach($courses as $course)
                    <div class="border-bottom mt-1 my-3 divisor"></div>
                    @include('course.partials.card', ['isList' => true])
                @endforeach

                {{ $courses->links() }}
            </div>
        @else
            <h1>Nenhum curso encontrado nesses critérios</h1>
        @endif
    </div>

@endsection