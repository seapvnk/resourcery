
<div class="{{ isset($isList)? 'row' : 'card' }} card-course" onclick="window.location = '{{ route('course.show', ['course' => $course->url]) }}'">
    <img src="{{ $course->cover_picture_path }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $course->name }}</h5>
        
        @isset($isList)
            <p>{{ $course->description }}</p>
        @endisset

        <small>{{ $course->author->name }}</small>
        <div class="card-course-rating">
            <span class="star-number">4.6</span>
            <span class="star-rating">
                @include('partials.rating', ['rating' => 4.6])
            </span>
            <span class="rating-number">
                (24.120)
            </span>
        </div>
        
        @isset($isList)
            <small class="card-course-info">
                {{ $course->totalHours() }} horas no total • {{ count($course->sections) }} aulas
            </small>
        @endisset

        <span class="card-course-price">Gratuito</span>
    </div>
</div>