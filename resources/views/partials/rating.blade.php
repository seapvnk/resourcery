@if ($rating > 4.6)
    @for ($i = 0; $i < 5; $i++)
        <i class="bi bi-star-fill"></i>
    @endfor
@else
    @for ($i = 0; $i < floor($rating); $i++)
        <i class="bi bi-star-fill"></i>
    @endfor

    @if ($rating - floor($rating) >= 0.5)
        <i class="bi bi-star-half"></i>
    @else
        <i class="bi bi-star"></i>
    @endif
    
    @for ($i = 0; $i < (5 - floor($rating) - 1); $i++)
        <i class="bi bi-star"></i>
    @endfor
@endif