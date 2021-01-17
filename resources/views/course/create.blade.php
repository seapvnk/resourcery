@extends('layouts.instructor')

@section('content')

<form action="{{ route('course.create') }}" method="POST" class="default-form p-4">
        @csrf
        <strong>Informações básicas sobre o curso</strong>

        <div class="border-top my-3"></div>

        @if ($errors->any())
            <div class="alert alert-danger" style="text-align: left">
                Erros ao criar o curso: <br>
                @foreach ($errors->all() as $error)
                    <small>{{ $error }}</small> <br>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <span>
                <i class="bi bi-file-text"></i>
            </span>

            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nome do curso" required>
        </div>

        <div class="form-group">
            <span>
                <i class="bi bi-file-image"></i>
            </span>
            
            <input type="text" value="{{ old('cover_picture_path') }}" name="cover_picture_path" class="form-control" placeholder="Link para foto do curso" required>
        </div>
        
        <div class="form-group">
            <span>
                <i class="bi bi-globe"></i>
            </span>
            
            <select name="language" class="form-control" value="{{ old('language') }}">
                <option disabled selected>Selecione um idioma</option>
                <option value="Português">Português</option>
                <option value="English">English</option>
                <option value="Español">Español</option>
            </select>
        </div>

        <div class="form-group">
            <span>
                <i class="bi bi-file-text"></i>
            </span>
            
            <input type="description" value="{{ old('description') }}" name="description" class="form-control" placeholder="Breve descrição" required>
        </div>

        <div class="form-group">
            <span>
                <i class="bi bi-file-text"></i>
            </span>
            
            <textarea type="text" name="overview" class="form-control" placeholder="Proposta do curso/conteúdos" required>{{ old('overview') }}</textarea>
        </div>

        <div class="form-group">
            <span>
                <i class="bi bi-list"></i>
            </span>

            <select name="category" class="form-control" value="{{ old('cateogory') }}">
                <option disabled selected>Selecione uma categoria</option>
                @foreach([
                    'Desenvolvimento e TI',
                    'Artes e design',
                    'Negócios e finanças',
                    'Ensino e estudo acadêmico',
                    'Desenvolvimento pessoal',
                    'Estilo de vida',
                    'Idiomas',
                    'Saúde e fitness',
                ] as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Próximo" class="btn btn-control btn-red btn-lg mb-2">

    </form>

@endsection