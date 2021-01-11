@extends('layouts.default')

@section('content')

    <form action="{{ route('login') }}" method="POST" class="default-form p-4">
        @csrf
        <strong>Faça login em sua conta da Udemy! </strong>

        <div class="border-top my-3"></div>

        @if ($errors->any())
            <div class="alert alert-danger" style="text-align: left">
                Erros ao efetuar o login: <br>
                @foreach ($errors->all() as $error)
                    <small>{{ $error }}</small> <br>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <span>
                <i class="bi bi-envelope-fill"></i>
            </span>
            
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
        </div>

        <div class="form-group">
            <span>
                <i class="bi bi-lock-fill"></i>
            </span>
            
            <input type="password" name="password" class="form-control" placeholder="Senha" required>
        </div>

        <input type="submit" value="Login" class="btn btn-control btn-red btn-lg mb-2">

        <div class="border-top my-3"></div>

        <p>Não tem uma conta? <a class="bold" href="{{ route('register') }}">Inscreva-se </a> </p>

    </form>

@endsection