@extends('layouts.instructor')

@section('content')

<form action="{{ route('course.create') }}" method="POST" class="default-form p-4">
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

        <div class="form-group d-flex">
            <span>
                <i class="bi bi-file-text"></i>
            </span>

            <input type="text" id="section-1" name="section" class="form-control" placeholder="Seção 1" required>

            <div class="btn-control d-flex flex-column">
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0" style="border-radius: 0"><i class="bi bi-arrow-up"></i></button>
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0" style="border-radius: 0"><i class="bi bi-arrow-down"></i></button>
            </div>

            <div class="btn-control d-flex flex-column">
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0 hover-delete" style="border-radius: 0"><i class="bi bi-trash"></i></button>
                <button class="btn btn-outline-secondary section-controller-button p-0 border-0 hover-edit" style="border-radius: 0"><i class="bi bi-pencil"></i></button>
            </div>

        </div>

        <input type="submit" value="Próximo" class="btn btn-control btn-red btn-lg mb-2">

    </form>

@endsection