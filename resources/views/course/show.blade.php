@extends('layouts.default')

@section('title', $course->name)

@section('header')

<div class="container-fluid dark text-white p-4 row" style="background-color: #1e1e1c">

    <div class="course-info container px-4 pb-4 col">
        <a href="{{ route('course.list', $course->category) }}" class="mb-2 link-category">{{ $course->category }}</a>
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


@section('content')

    <div class="container m-4 show-container">
        <div class="container mx-4 p-4 bg-light border rounded">
            <h3>O que você aprenderá</h3>

            <p class="px-4">{{ $course->overview }}</p>
        </div>
        
        <div class="container course-content mx-4 pt-4"  style="padding: 0">
            
            <h2 class="py-4">Conteúdo do curso</h2>

            <div class="curriculum-length">
                33 seções • 549 aulas • Duração total: 126h 14m
            </div>

            <div class="accordion" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bold d-flex justify-content-start" style="text-align: left" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="title col">Accordion Item #1</div>
                            <div class="text-muted px-3" style="font-weight: 400; font-size: 14px">5 aulas  • 25m</div>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="course-item d-flex mb-3">
                                <div class="col course-item-text">
                                    <i class="bi bi-play-circle-fill"></i>
                                    <span class="mx-3">Lorem, ipsum dolor.</span>
                                </div>
                                <div class="text-muted small">03:39</div>
                            </div>
                            <div class="course-item d-flex mb-3">
                                <div class="col course-item-text">
                                    <i class="bi bi-file-text"></i>
                                    <span class="mx-3">Lorem, ipsum dolor.</span>
                                </div>
                                <div class="text-muted small">00:59</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bold" style="border-bottom: 1px solid #ccc !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection