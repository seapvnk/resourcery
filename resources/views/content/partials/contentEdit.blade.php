<div class="form-group d-flex course-section">

    <span>
        <i class="bi bi-file-text"></i>
    </span>

    <input 
        type="text" 
        class="form-control" 
        disabled 
        placeholder="{{ $content->name }}" 
        value="{{ $content->name }}"
    >

    <div class="btn-control d-flex flex-column">
        <a
            href="{{ route('content.order', ['method' => 'up', 'content' => $content->id]) }}"
            class="btn btn-outline-secondary section-controller-button p-0 border-0" 
            style="border-radius: 0"
        >
            <i class="bi bi-arrow-up"></i>
        </a>
        
        <a 
            href="{{ route('content.order', ['method' => 'down', 'content' => $content->id]) }}"
            class="btn btn-outline-secondary section-controller-button p-0 border-0" 
            style="border-radius: 0">
            <i class="bi bi-arrow-down"></i>
        </a>
    </div>
    
    <div class="btn-control d-flex flex-column">
        <button 
            content-id="{{ $content->id }}" 
            class="btn-delete-content btn btn-outline-secondary 
                    section-controller-button p-0 border-0 hover-delete" 
            style="border-radius: 0"
        >
            <i class="bi bi-trash"></i>
        </button>

        <a
            href="{{ route('content.edit', ['courseUrl' => $course->url, 'section' => $section->id, 'content' => $content->id]) }}" 
            class="btn btn-outline-secondary section-controller-button p-0 border-0 hover-edit" 
            style="border-radius: 0"
        >
            <i class="bi bi-pencil"></i>
        </a>

    </div>

</div>
