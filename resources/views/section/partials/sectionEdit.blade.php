<div class="form-group d-flex course-section">

    <span>
        <i class="bi bi-file-text"></i>
    </span>

    <input type="text" class="form-control" disabled placeholder="{{ $section->name }}" value="{{ $section->name }}">

    <div class="btn-control d-flex flex-column">
        <button class="btn btn-outline-secondary section-controller-button p-0 border-0" style="border-radius: 0"><i class="bi bi-arrow-up"></i></button>
        <button class="btn btn-outline-secondary section-controller-button p-0 border-0" style="border-radius: 0"><i class="bi bi-arrow-down"></i></button>
    </div>

    
    
    <div class="btn-control d-flex flex-column">
        <button section-id="{{ $section->id }}" class="btn-delete-section btn btn-outline-secondary section-controller-button p-0 border-0 hover-delete" style="border-radius: 0"><i class="bi bi-trash"></i></button>
        <button class="btn btn-outline-secondary section-controller-button p-0 border-0 hover-edit" style="border-radius: 0"><i class="bi bi-pencil"></i></button>
    </div>

</div>

