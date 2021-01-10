<nav class="navbar navbar-expand-lg navbar-light bg-white border border-top-0 border-bottom-secondary px-3 p-1 default-nav">
  <div class="container-fluid">
    <a class="navbar-brand text-primary" href="#">
      <div class="logo">
        <span class="logo-icon">R</span>
        Rsrcy
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center align-items-none-md">
    
        <li class="nav-item dropdown px-4">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Desenvolvimento</a></li>
            <li><a class="dropdown-item" href="#">Negócios</a></li>
            <li><a class="dropdown-item" href="#">Finanças e contabilidade</a></li>
            <li><a class="dropdown-item" href="#">TI e Software</a></li>
            <li><a class="dropdown-item" href="#">Produtividade no escritório</a></li>
            <li><a class="dropdown-item" href="#">Desenvolvimento Pessoal</a></li>
            <li><a class="dropdown-item" href="#">Design</a></li>
            <li><a class="dropdown-item" href="#">Marketing</a></li>
            <li><a class="dropdown-item" href="#">Saúde e fitness</a></li>
            <li><a class="dropdown-item" href="#">Música</a></li>
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
          <a href="#" class="link-secondary text-decoration-none px-4">Saber mais</a>
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

<div class="p-3 px-4 bg-light shadow-sm shadow-bottom default-nav-bottom">
  <a href="" class="link-secondary">Desenvolvimento</a>
  <a href="" class="link-secondary">Negócios</a>
  <a href="" class="link-secondary">Finanças e contabilidade</a>
  <a href="" class="link-secondary">TI e software</a>
  <a href="" class="link-secondary">Produtividade no escritório</a>
  <a href="" class="link-secondary">Desenvolvimento Pessoal</a>
  <a href="" class="link-secondary">Design</a>
  <a href="" class="link-secondary">Marketing</a>
  <a href="" class="link-secondary">Saúde e fitness</a>
  <a href="" class="link-secondary">Música</a>
</div>

<script>

const dropDown = document.querySelector('#navbarDropdown');

dropDown.addEventListener('mouseover', () => {
  dropDown.click()
})


</script>