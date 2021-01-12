
<div class="card card-course" onclick="window.location = '{{ route('course.show', ['course' => $course->url]) }}'">
    <img src="{{ $course->cover_picture_path }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $course->name }}</h5>
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
        <span class="card-course-price">Gratuito</span>
    </div>
</div>