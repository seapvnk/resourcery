@extends('layouts.default')

@section('title', $course->name)

@section('header')

<div class="container-fluid dark text-white p-4 row" style="background-color: #1e1e1c">

    <div class="course-info container px-4 pb-4 col">
        <a href="{{ route('course.list', $course->category) }}" class="mb-2 link-category">{{ $course->category }}</a>
        <h1 class="h2 bold" style="width: 630px">{{ $course->name }}</h1>
        <p class="pt-2 description" style="font-size: 18px">{{ $course->description }}</p>
        <div class="card-course-rating">
            <span class="star-number">{{ sprintf("%.1f", $course->ratingAverage()) }}</span>
            <span class="star-rating">
                @include('partials.rating', ['rating' => $course->ratingAverage()])
            </span>
            <span class="rating-number">
                ({{ $course->ratings() }})
            </span>
            <span class="rating-number">
                {{ $courseStudentsCount }} {{ $courseStudentsCount !== 1? 'alunos' : 'aluno' }}
            </span>
        </div>
        <p class="mt-2">Criado por <a class="link-author" href="">{{ $course->author->name }}</a></p>
        <p>
            Última atualização {{ date('m/Y', strtotime($course->updated_at)) }}
            <i class="mx-2 bi bi-globe2"></i> {{ $course->language }}
        </p>

        <a href="{{ route('course.favorite', ['course' => $course->url]) }}" class="mt-2 btn btn-outline-light">Wishlist <i class="bi bi-heart"></i></a>
        <button class="mt-2 btn btn-outline-light">Compartilhar <i class="bi bi-share"></i></button>

    </div>
    
    <div class="col">
        <div class="card card-course-info text-dark shadow-sm">
            <img src="{{ $course->cover_picture_path }}" class="card-img-top" alt="..." style="background: #ccc">
            <div class="card-body px-4" style="z-index: 9999">
                <h5 class="card-title h2 bold">R$ 0,00 <sup>R$ 0,00</sup></h5>
                <p>Curso gratuito</p>
                <p class="price"><i class="bi bi-alarm"></i> Só mais 100 dias por este preço!</p>
                
                <button onclick="window.location = '{{ route('course.learn', ['course' => $course->url]) }}'" class="btn btn-red form-control bold">Acessar agora</button>
                @auth
                    <button 
                        onclick="window.location = '{{ route(!Auth::user()->hasFavorite($course->id)? 'course.favorite' : 'course.removeFavorite', ['course' => $course->url]) }}'" 
                        class="btn btn-wish form-control bold"
                    >
                        {{  !Auth::user()->hasFavorite($course->id)? 'Adicionar a lista' : 'Remover da lista' }}
                    </button>
                @endauth
           
                <small>Não precisa cadastrar cartão de crédito</small>

                <p class="bold features-title">Este curso inclui: </p>
                <div class="features">
                    <p><i class="bi bi-laptop"></i> {{ floor($course->totalTime() / 3600) }} horas de vídeo sob demanda</p>
                    <p><i class="bi bi-file-earmark-arrow-down"></i> {{ $course->countReadings() }} leituras relacionadas</p>
                    <p><i class="bi bi-braces"></i> Exercícios práticos</p>
                    <p><i class="bi bi-info-circle-fill"></i> Acesso total vitalício</p>
                    <p><i class="bi bi-phone"></i> Acesso no dispositivo móvel e na TV</p>
                </div>
            </div>
        </div>
    </div> 

</div>

@endsection


@section('content')

    <div class="container m-4 show-container course-show">

        <div class="container mx-4 p-4 bg-light border rounded">
            <h3>O que você aprenderá</h3>

            <p class="px-4">
                @foreach(explode("\r\n", $course->overview) as $paragraph)
                    {{ $paragraph }} <br>
                @endforeach
            </p>
        </div>
        
        <div class="container course-content mx-4 pt-4 course-show"  style="padding: 0">
            
            <h2 class="py-4">Conteúdo do curso</h2>

            <div class="curriculum-length">
                {{ count($course->sections) != 1? count($course->sections) . ' seções' : count($course->sections) . ' seção'  }} • 
                {{ $course->totalLessons() != 1? $course->totalLessons() . ' aulas' : $course->totalLessons() . ' aula' }} • 
                Duração total: {{ $course->totalTimeInBrazilLocale() }}
            </div>

            <div class="accordion" id="accordionContentsTable">
                @foreach($course->sections->sortBy('order') as $section)
                    @include('course.partials.accordionItem')
                @endforeach
            </div>

        </div>
    </div>

@endsection