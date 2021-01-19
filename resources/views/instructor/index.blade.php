@extends('layouts.instructor')

@section('content')

    <div class="container create-course d-flex p-4 border">
        <h1 class="mx-4 px-4 display">Iniciar a criação de um curso</h1>
        <a href="{{ route('course.create') }}" class="btn btn-red">Crie seu curso</a>
    </div>

    <div class="container p-4">
        <h3>Meus cursos</h3>
        
        <div class="container course-list">
            @foreach($courses as $course)
                <div class="row">
                    <div class="col">
                        @include('course.partials.card', ['isList' => true])
                    </div>

                    <div class="col">
                        <form
                            class="invisible"
                            action="{{ route('course.delete') }}" 
                            delete-form="{{ $course->id }}"
                            method="POST"
                            id="course-delete-{{ $course->id }}"
                        >
                            @method('delete')
                            @csrf
                            <input type="text" name="course_id" value="{{ $course->id }}">
                        </form>

                        <button 
                            class="btn btn-outline-danger btn-delete-course" 
                            course-id="{{ $course->id }}"
                        >
                            <i class="bi bi-trash"></i> Excluir
                        </button>

                        <button class="btn btn-outline-secondary"><i class="bi bi-pencil"></i> Editar</button>
                    </div>
                </div>

                <div class="my-2 border-top"></div>
            @endforeach

            {{ $courses->links() }}
        </div>
    </div>

@endsection