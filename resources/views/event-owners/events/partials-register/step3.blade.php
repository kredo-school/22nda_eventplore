{{-- STEP3 --}}
{{-- category --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <div class="fw-bold mb-2 text-start">Category*</div>
    <p class="text-start mt-1">Max : 4 categories. Min : 1 category.</p>
    <div class="col-lg-6 col-sm-12">
        @foreach ($categories as $index => $category)
            @if ($index < 10)
                <div class="form-check mb-3 d-flex align-items-center">
                    <input class="form-check-input green-check me-1" type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}">
                    <label class="form-check-label text-capitalize" for="{{ $category->name }}">{{ $category->name }}</label>
                </div>
            @endif
        @endforeach
    </div>
    <div class="col-lg-6 col-sm-12">
        @foreach ($categories as $index => $category)
            @if ($index >= 10)
                <div class="form-check mb-3 d-flex align-items-center">
                    <input class="form-check-input green-check me-1" type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}">
                    <label class="form-check-label text-capitalize" for="{{ $category->name }}">{{ $category->name }}</label>
                </div>
            @endif
        @endforeach
    </div>
</div>



