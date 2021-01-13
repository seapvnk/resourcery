@extends('layouts.default')

@section('title', $course->name)

@section('header')

<div class="container-fluid dark text-white p-4 row" style="background-color: #1e1e1c">

    <div class="course-info container px-4 pb-4 col">
        <h1 class="h2 bold" style="width: 630px">{{ $course->name }}</h1>
        <p class="pt-2 description" style="font-size: 18px">{{ $course->description }}</p>
        <div class="card-course-rating">
            <span class="star-number">4.6</span>
            <span class="star-rating">
                @include('partials.rating', ['rating' => 4.6])
            </span>
            <span class="rating-number">
                (24.120)
            </span>
            <span class="rating-number">
                124.120 alunos
            </span>
        </div>
        <p class="mt-2">Criado por <a class="link-author" href="">{{ $course->author->name }}</a></p>
        <p>
            Última atualização {{ date('m/Y', strtotime($course->updated_at)) }}
            <i class="mx-2 bi bi-globe2"></i> {{ $course->language }}
        </p>

        <button class="mt-2 btn btn-outline-light">Wishlist <i class="bi bi-heart"></i></button>
        <button class="mt-2 btn btn-outline-light">Compartilhar <i class="bi bi-share"></i></button>

    </div>
    
    <div class="col">
        <div class="card card-course-info text-dark shadow-sm">
            <img src="{{ $course->cover_picture_path }}" class="card-img-top" alt="..." style="background: #ccc">
            <div class="card-body px-4">
                <h5 class="card-title h2 bold">R$ 0,00 <sup>R$ 0,00</sup></h5>
                <p>Curso gratuito</p>
                <p class="price"><i class="bi bi-alarm"></i> Só mais 100 dias por este preço!</p>
                <button class="btn btn-red form-control bold">Acessar agora</button>
                <button class="btn btn-wish form-control bold">Adicionar a lista</button>
                <small>Não precisa cadastrar cartão de crédito</small>

                <p class="bold features-title">Este curso inclui: </p>
                <div class="features">
                    <p><i class="bi bi-laptop"></i> 30 horas de vídeo sob demanda</p>
                    <p><i class="bi bi-file-earmark-arrow-down"></i> 142 recursos para download</p>
                    <p><i class="bi bi-braces"></i> 14 exercícios práticos</p>
                    <p><i class="bi bi-info-circle-fill"></i> Acesso total vitalício</p>
                    <p><i class="bi bi-phone"></i> Acesso no dispositivo móvel e na TV</p>
                </div>
            </div>
        </div>
    </div> 

</div>

@endsection