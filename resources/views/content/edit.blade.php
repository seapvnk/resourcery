@extends('layouts.instructor')

@section('content')

<form class="form default-form p-4" method="POST" action="{{ route('content.update') }}">
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
        Editar conteúdo "{{ $content->name }}" 
        na seção {{ $content->section->name }} 
        do curso {{ $content->section->course->name }}
    </strong>

    <div class="border-top my-3"></div>

    <input type="hidden" name="content_id" value="{{ $content->id }}">

    <div class="form-group d-flex course-section">

        <span>
            <i class="bi bi-file-text"></i>
        </span>

        <input 
            type="text" 
            class="form-control" 
            name="name"
            placeholder="Nome do conteúdo" 
            value="{{ $content->name }}"
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
            value="{{ $content->content }}"
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
            value="{{ date("H:i", $content->duration) }}"
            placeholder="Tempo estimado (hh:mm:ss)" 
        >
    </div>

    <div class="form-group d-flex course-section">

        <span>
            <i class="bi bi-app"></i>
        </span>

        <select class="form-control" name="type">
            <option {{ $content->type == 'reading'? 'selected' : '' }} value="reading">Leitura recomendada</option>
            <option {{ $content->type == 'video'? 'selected' : '' }} value="video">Vídeo</option>
            <option disabled selected value="">Selecione o tipo de conteúdo</option>
        </select>
    </div>

    <input type="submit" value="Salvar alterações" class="btn btn-control btn-red btn-lg mb-2">
</form>

@endsection
