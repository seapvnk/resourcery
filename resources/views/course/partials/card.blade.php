
<div 
    class="{{ isset($isList)? 'row' : 'card' }} card-course"
    
    @isset($dashboard) 
        onclick="window.location = '{{ route('course.learn', ['course' => $course->url]) }}'"
    @else
        onclick="window.location = '{{ route('course.show', ['course' => $course->url]) }}'"
    @endisset
>
    <img src="{{ $course->cover_picture_path }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $course->name }}</h5>
        
        @isset($isList)
            <p>{{ $course->description }}</p>
        @endisset

        <small>{{ $course->author->name }}</small>
        <div class="card-course-rating">
            <span class="star-number">{{ sprintf("%.1f", $course->ratingAverage()) }}</span>
            <span class="star-rating">
                @include('partials.rating', ['rating' => $course->ratingAverage()])
            </span>
            <span class="rating-number">
                ({{ $course->ratings() }})
            </span>
        </div>
        
        @isset($isList)
            <small class="card-course-info">
                {{ $course->totalHours() }} horas no total • {{ $course->totalLessons() }} aulas
            </small>
        @endisset

        <span class="card-course-price">Gratuito</span>
    </div>
</div>