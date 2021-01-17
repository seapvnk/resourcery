@extends('layouts.instructor')

@section('content')

    <div class="container create-course d-flex p-4 border">
        <h1 class="mx-4 px-4 display">Iniciar a criação de um curso</h1>

        <a href="{{ route('course.create') }}" class="btn btn-red">Crie seu curso</a>
    </div>

@endsection