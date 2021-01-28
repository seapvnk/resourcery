<div class="res-nav">
  <nav class=" navbar navbar-expand-lg bg-dark navbar-dark border border-0  px-3 p-1">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand text-primary float-left" href="{{ route('home') }}" style="margin: 0">
        <div class="logo">
          <span class="logo-icon">R</span>
          <span class="text-white">Rsrcy</span>
        </div>
      </a>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center align-items-none-md">
        <li><small class="px-2 py-2 mx-2 text-white" style="border-left: #ddd6 solid 1px"> {{ $course->name }}</small></li>
      </ul>
      
      <p class="mx-2 rate-a-course" style="color: #ccc">
        <i star-index="1" class="bi bi-star-fill"></i>
        <i star-index="2" class="bi bi-star-fill"></i>
        <i star-index="3" class="bi bi-star-fill"></i>
        <i star-index="4" class="bi bi-star-fill"></i>
        <i star-index="5" class="bi bi-star-fill"></i>
      </p>

      <button class="btn btn-outline-light"><span class="bi bi-share"></span> Compartilhar</button>
    
    </div>
  </nav>

</div>


<script>

$('.rate-a-course i').hover(function() {
  const index = Number($(this).attr('star-index'))
  for (let i = 1; i <= index; i++) {
    $(`i[star-index=${i}]`).css('color', 'gold')
  }
})

$('.rate-a-course i').mouseleave(function() {
  const index = Number($(this).attr('star-index'))
  for (let i = index; i > 0; i--) {
    $(`i[star-index=${i}]`).css('color', '#ccc')
  }
})

</script>