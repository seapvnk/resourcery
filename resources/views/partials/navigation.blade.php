<div class="shadow-sm">
  <nav class="navbar navbar-expand-lg navbar-light bg-white border border-0  px-3 p-1 default-nav">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand text-primary" href="{{ route('home') }}">
        <div class="logo">
          <span class="logo-icon">R</span>
          Rsrcy
        </div>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center align-items-none-md">
      
          <li class="nav-item dropdown px-4">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Desenvolvimento e TI</a></li>
              <li><a class="dropdown-item" href="#">Artes e Design</a></li>
              <li><a class="dropdown-item" href="#">Negócios e Finanças</a></li>
              <li><a class="dropdown-item" href="#">Ensino e estudo acadêmico</a></li>
              <li><a class="dropdown-item" href="#">Desenvolvimento Pessoal</a></li>
              <li><a class="dropdown-item" href="#">Estilo de vida</a></li>
              <li><a class="dropdown-item" href="#">Idiomas</a></li>
              <li><a class="dropdown-item" href="#">Saúde e fitness</a></li>
            </ul>
          </li>

          <form class="d-flex">
            <button class="btn rounded-circle search-button d-flex justify-content-center" type="submit">
              <i class="bi bi-search"></i>
            </button>
            
            <input class="rounded-pill form-control me-2 search-input bg-light" type="search" placeholder="Pesquise qualquer coisa" aria-label="Search">
          </form>

          <li class="nav-item dropdown">
            <a href="#" class="link-secondary text-decoration-none px-4">Converse conosco</a>
          </li>

          <li class="nav-item dropdown">
            <a href="#" class="link-secondary text-decoration-none px-4">Instrutor</a>
          </li>

          @auth
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="link-secondary text-decoration-none px-3">Meu aprendizado</a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="link-secondary text-decoration-none px-2"> <i class="bi bi-heart"></i> </a>
                <a href="{{ url('/dashboard') }}" class="link-secondary text-decoration-none px-2"> <i class="bi bi-bell"></i> </a>
              </li>

              <li class="nav-item px-4">
                <a href="{{ url('/user/profile') }}">
                  <img width=35 src="{{ Auth::user()->profile_photo_url }}" alt="" class="img rounded-circle">
                </a>
              </li>
          @else
              <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg py-2">Fazer login</a>
              </li>
              
              @if (Route::has('register'))
                <li class="nav-item px-2">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg py-2">Registrar-se</a>
                </li>
              @endif
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  @auth
    <div class="p-3 px-4 bg-light default-nav-bottom border-top">
      <a href="" class="link-secondary">Desenvolvimento e TI</a>
      <a href="" class="link-secondary">Artes e design</a>
      <a href="" class="link-secondary">Negócios e finanças</a>
      <a href="" class="link-secondary">Ensino e estudo acadêmico</a>
      <a href="" class="link-secondary">Desenvolvimento pessoal</a>
      <a href="" class="link-secondary">Estilo de vida</a>
      <a href="" class="link-secondary">Idiomas</a>
      <a href="" class="link-secondary">Saúde e fitness</a>
    </div>
  @endauth
</div>