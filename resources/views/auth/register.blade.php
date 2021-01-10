@extends('layouts.default')

@section('content')

    <form action="{{ route('register') }}" method="POST" class="default-form p-4">
        @csrf
        <strong>Inscreva-se e comece a aprender!</strong>

        <div class="border-top my-3"></div>

        <div class="form-group">
            <span>
                <i class="bi bi-person-fill"></i>
            </span>

            <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
        </div>
        
        <div class="form-group">
            <span>
                <i class="bi bi-person-fill"></i>
            </span>
            
            <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
        </div>

        <div class="form-group">
            <span>
                <i class="bi bi-person-fill"></i>
            </span>
            
            <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
        </div>

        <input type="submit" value="Inscrever-se" class="btn btn-control btn-red btn-lg mb-2">

        <small >Ao inscrever-se, você concorda com nossos <a href="#">Termos de uso</a> e nossa <a href="">Política de privacidade</a>.</small> 
        <div class="border-top my-3"></div>

        <p>Já tem uma conta? <a class="bold" href="{{ route('login') }}">Login</a> </p>

    </form>

@endsection