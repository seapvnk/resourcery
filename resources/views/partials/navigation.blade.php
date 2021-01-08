<nav class="navbar navbar-expand-lg navbar-light bg-white border border-bottom-secondary p-2 default-nav">
  <div class="container-fluid">
    <a class="navbar-brand text-primary" href="#">Resourcery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center align-items-none-md">
    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        <form class="d-flex">
          <button class="btn rounded-circle search-button d-flex justify-content-center" type="submit">
            <i class="bi bi-search"></i>
          </button>
          
          <input class="rounded-pill form-control me-2 search-input bg-light" type="search" placeholder="Search" aria-label="Search">
        </form>

        <li class="nav-item dropdown">
          <a href="#" class="link-secondary text-decoration-none">Contato</a>
        </li>

        @auth
            <li class="nav-item">
              <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline btn-lg">Dashboard</a>
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

<script>

const dropDown = document.querySelector('#navbarDropdown');

dropDown.addEventListener('mouseover', () => {
  dropDown.click()
})


</script>