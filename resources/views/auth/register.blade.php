@extends('layouts.default')

@section('content')

    <form action="{{ route('register') }}" method="POST" class="default-form p-4">
        @csrf
        <strong>Inscreva-se e comece a aprender!</strong>

        <div class="border-top my-3"></div>

        @if ($errors->any())
            <div class="alert alert-danger" style="text-align: left">
                Erros ao registrar-se: <br>
                @foreach ($errors->all() as $error)
                    <small>{{ $error }}</small> <br>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <span>
                <i class="bi bi-person-fill"></i>
            </span>

            <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
        </div>
        
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

        <input type="submit" value="Inscrever-se" class="btn btn-control btn-red btn-lg mb-2">

        <small >Ao inscrever-se, você concorda com nossos <a href="#">Termos de uso</a> e nossa <a href="">Política de privacidade</a>.</small> 
        <div class="border-top my-3"></div>

        <p>Já tem uma conta? <a class="bold" href="{{ route('login') }}">Login</a> </p>

    </form>

@endsection