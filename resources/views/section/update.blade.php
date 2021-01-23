@extends('layouts.instructor')

@section('content')

<div class="invisible">

    @foreach ($course->sections as $section)
        <form method="POST" class="invisible d-none" id="section-delete-{{ $section->id }}" action="{{ route('section.delete', ['courseUrl' => $section->course->url]) }}">
            @csrf
            @method('delete')
            <input type="hidden" name="section_id" value="{{ $section->id }}">
        </form>
    @endforeach
</div>

<form action="#" method="POST" class="default-form p-4">
        @csrf
        <strong>Editar seções do curso *{{ $course->name }}</strong>

        <div class="border-top my-3"></div>

        @if ($errors->any())
            <div class="alert alert-danger" style="text-align: left">
                Erros ao salvar alterações: <br>
                @foreach ($errors->all() as $error)
                    <small>{{ $error }}</small> <br>
                @endforeach
            </div>
        @endif

        @foreach ($course->sections as $section)
            @include('section.partials.sectionEdit')
        @endforeach
        
        <div class="form-group d-flex course-section">


            <span>
                <i class="bi bi-file-text"></i>
            </span>

            <input type="text" name="section" class="form-control" placeholder="Nova seção" required>

            <div class="btn-control d-flex flex-column">
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0" style="border-radius: 0"><i class="bi bi-arrow-up"></i></button>
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0" style="border-radius: 0"><i class="bi bi-arrow-down"></i></button>
            </div>

            <div class="btn-control d-flex flex-column">
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0 hover-delete" style="border-radius: 0"><i class="bi bi-trash"></i></button>
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0 hover-edit" style="border-radius: 0"><i class="bi bi-pencil"></i></button>
            </div>

        </div>

        <input type="submit" value="Criar seção" class="btn btn-control btn-red btn-lg mb-2">

    </form>

@endsection