<div>
  <nav class=" navbar navbar-expand-lg navbar-light bg-white border border-0  px-3 p-1 default-nav">
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
            <li class="nav-item px-4">
                <a href="{{ url('/user/profile') }}">
                    <img width=35 src="{{ Auth::user()->profile_photo_url }}" alt="" class="img rounded-circle">
                </a>
            </li>
        </ul>
        
        <a href="javascript: window.history.back()"><i class="bi bi-arrow-left"></i></a>
        <div class="clearfix"></div>
        
      </div>
    </div>
  </nav>

</div>