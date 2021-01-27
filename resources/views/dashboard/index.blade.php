@extends('layouts.default')

@section('header')

    <div class="px-4 container-fluid dark text-white p-4 row" style="background-color: #505763">
        <h3 class="mx-4 p-4">Meu aprendizado</h3>
    </div>

@endsection

@section('content')

    <div class="container">
        <div class="p-2">

            <div class="row">
                @foreach ($courses as $course)
                    @include('course.partials.card', ['dashboard' => true])
                @endforeach
            </div>

            {{ $courses->links() }}
            
        </div>
    </div>

@endsection