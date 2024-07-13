{{-- STEP2 --}}
{{-- category --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <label for="form-label" class="fw-bold mb-2 text-start">Category*</label>
    @foreach ($categories as $create => $category)
        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3 d-flex align-items-center">
            <input class="form-check-input green-check me-1" type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}">
            <label class="form-check-label text-capitalize" for="{{ $category->name }}">{{ $category->name }}</label>
        </div>
    @endforeach  
</div>


