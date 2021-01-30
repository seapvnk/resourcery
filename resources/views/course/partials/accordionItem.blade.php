<div class="accordion-item">
    <h2 class="accordion-header" id="heading{{ $loop->index }}">
        <button class="accordion-button bold d-flex justify-content-start" style="{{ $loop->last? 'border-bottom: 1px solid #ccc !important;' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
            <div class="title col">{{ $section->name }}</div>
            <div class="text-muted px-3" style="font-weight: 400; font-size: 14px">
                {{ count($section->contents) }} aulas  • {{ $section->totalTimeInBrazilLocale() }}
            </div>
        </button>
    </h2>
    <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionContentsTable">
        <div class="accordion-body border-top">

            @foreach($section->contents->sortBy('order') as $content)
                <div class="course-item d-flex mb-3">
                    
                    <div class="col course-item-text">
                        @if(null !== Auth::user() && isset($lecture))
                            <input 
                                style="border: 1px solid #ccc !important" 
                                class="form-check-input" 
                                type="checkbox" 
                                value="" 
                                id="flexCheckDefault"
                                {{ Auth::user()->didThisLession($content->id)? 'checked' : '' }}
                                onclick="markAsDid('{{ $content->id }}')"
                            >
                        @else
                            @if ($content->type == 'video')
                                <i class="bi bi-play-circle-fill"></i>
                            @else
                                <i class="bi bi-file-text"></i>
                            @endif
                        @endif

                        @isset($lecture)<a href="{{ route('course.learn', ['course' => $course->url, 'lecture' => $content->id]) }}">@endisset
                        
                        <span class="mx-3">{{ $content->name }}</span>
                        
                        @isset($lecture)</a>@endisset

                    </div>

                    @if (date('H', $content->duration) == 0)
                        <div class="text-muted small">{{ date('i:s', $content->duration) }}</div>
                    @else
                        <div class="text-muted small">{{ date('H:i:s', $content->duration) }}</div>
                    @endif
                </div>
            @endforeach

        </div>
    </div>
</div>
