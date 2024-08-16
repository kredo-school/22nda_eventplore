{{-- STEP3 --}}
{{-- category --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <div class="fw-bold mb-2 text-start">Category*</div>
    <p class="text-start mt-1">Max : 4 categories. Min : 1 category.</p>
    <div class="col-lg-6 col-sm-12">
        @forelse ($all_categories as $index => $category)
            @if ($index < 10)
                <div class="form-check mb-3 d-flex align-items-center">
                    @if (in_array($category->id, $selected_categories))
                        {{-- checked --}}
                        <input type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input green-check me-1" checked>
                    @else
                        <input type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input green-check me-1">
                    @endif
                    <label class="form-check-label text-capitalize" for="{{ $category->name }}">{{ $category->name }}</label>
                </div>
            @endif
        @empty
            <p>No categories available.</p>
        @endforelse
    </div>
    <div class="col-lg-6 col-sm-12">
        @forelse ($all_categories as $index => $category)
            @if ($index >= 10)
                <div class="form-check mb-3 d-flex align-items-center">
                    @if (in_array($category->id, $selected_categories))
                        {{-- checked --}}
                        <input type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input green-check me-1" checked>
                    @else
                        <input type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input green-check me-1">
                    @endif
                    <label class="form-check-label text-capitalize" for="{{ $category->name }}">{{ $category->name }}</label>
                </div>
            @endif
        @empty
            <p>No categories available.</p>
        @endforelse
    </div>
</div>

