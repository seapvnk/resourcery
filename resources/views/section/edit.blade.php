@extends('layouts.instructor')

@section('content')

<div class="invisible">

    @foreach ($section->contents as $content)
        <form method="POST" class="invisible d-none" id="content-delete-{{ $content->id }}" action="{{ route('content.delete') }}">
            @csrf
            @method('delete')
            <input type="hidden" name="content_id" value="{{ $content->id }}">
        </form>
    @endforeach
</div>

<form class="form default-form p-4" method="POST" action="{{ route('section.save') }}">
    @csrf
    <strong>
        Editar conteúdos da seção {{ $section->name }} 
        do curso {{ $course->name }}
    </strong>

    <div class="border-top my-3"></div>
    <div class="form-group d-flex course-content">

        <span>
            <i class="bi bi-file-text"></i>
        </span>

        <input type="hidden" name="section_id" class="form-control" value="{{ $section->id }}" placeholder="Nome da seção" required>
        <input type="text" name="name" class="form-control" value="{{ $section->name }}" placeholder="Nome da seção" required>

    </div>

    <input type="submit" value="Atualizar seção" class="btn btn-control btn-blue btn-lg mb-2">

    @if ($errors->any())
        <div class="alert alert-danger" style="text-align: left">
            Erros ao salvar alterações: <br>
            @foreach ($errors->all() as $error)
                <small>{{ $error }}</small> <br>
            @endforeach
        </div>
    @endif

    @foreach ($section->contents->sortBy('order') as $content)
        @include('content.partials.contentEdit')
    @endforeach
    
    <a href="{{ route('content.create', ['section' => $section]) }}" class="btn btn-control btn-red btn-lg mb-2 text-white">Criar conteúdo</a>

</form>

@endsection