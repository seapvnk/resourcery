@extends('layouts.default')

@section('content')
    <div class="hero p-4" style="background-image: url('https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80')">
        <div class="shadow bg-white hero-card p-4">
            <h3>Busque sempre mais</h3>
            <p>O aprendizado mantém você à frente. Adquira habilidades procuradas que vão deixar todos impressionados.</p>
        </div>
    </div>

    <div class="bg-white hero-card-bottom p-1">
        <h3>Busque sempre mais</h3>
        <p>O aprendizado mantém você à frente. Adquira habilidades procuradas que vão deixar todos impressionados.</p>
    </div>

    <div class="p-4">
        <h3 class="mt-4 bold">Alunos estão assistindo</h2>

        <div class="row">
            @foreach ($courses as $course)
                @include('course.partials.card')
            @endforeach
        </div>
        
    </div>

@endsection