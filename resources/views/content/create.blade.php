@extends('layouts.instructor')

@section('content')

<form class="form default-form p-4" method="POST" action="{{ route('content.save') }}">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger" style="text-align: left">
            Erros ao salvar alterações: <br>
            @foreach ($errors->all() as $error)
                <small>{{ $error }}</small> <br>
            @endforeach
        </div>
    @endif

    <strong>
        Criar conteúdo na seção {{ $section->name }} 
        do curso {{ $section->course->name }}
    </strong>

    <div class="border-top my-3"></div>

    <input type="hidden" name="section_id" value="{{ $section->id }}">

    <div class="form-group d-flex course-section">

        <span>
            <i class="bi bi-file-text"></i>
        </span>

        <input 
            type="text" 
            class="form-control" 
            name="name"
            placeholder="Nome do conteúdo" 
            value="{{ old('name') }}"
        >
    </div>

    <div class="form-group d-flex course-section">

        <span>
            <i class="bi bi-display"></i>
        </span>

        <input 
            type="text" 
            class="form-control" 
            name="content"
            placeholder="Link (do Youtube, se for vídeo)" 
            value="{{ old('content') }}"
        >
    </div>

    <p>Tempo (horas : minutos)</p>
    <div class="form-group d-flex course-section">

        <span>
            <i class="bi bi-clock"></i>
        </span>

        <input 
            type="time" 
            class="form-control" 
            name="duration"
            placeholder="Tempo estimado (hh:mm:ss)" 
        >
    </div>

    <div class="form-group d-flex course-section">

        <span>
            <i class="bi bi-app"></i>
        </span>

        <select class="form-control" name="type">
            <option value="video">Vídeo</option>
            <option value="reading">Leitura recomendada</option>
            <option disabled selected value="">Selecione o tipo de conteúdo</option>
        </select>
    </div>

    <input type="submit" value="Criar conteúdo" class="btn btn-control btn-red btn-lg mb-2">
</form>

@endsection
