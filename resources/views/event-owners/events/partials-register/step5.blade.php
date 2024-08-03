{{-- STEP5 --}}
{{-- image --}}
<div class="row justify-content-center mx-5 px-5">
    <label for="form-label" class="fw-bold mb-2 text-start">Main Photo*</label>
    <div class="col-12 mb-3">
        <input type="file" name="image[]" id="image" class="form-control" required style="border: 1px solid #84947C">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row justify-content-center mx-5 px-5">
    <label for="form-label" class="fw-bold mb-2 text-start">Photo*</label>
    <div class="col-12 mb-3">
        <input type="file" name="image[]" id="image" class="form-control" style="border: 1px solid #84947C" multiple>
        <p class="text-start mt-1">Acceptable formats: jpeg, jpg, png, gif only. <br> Max : 4 images. Min : 1 image.</p>
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>