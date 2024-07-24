{{-- STEP6 --}}
{{-- local information --}}
{{-- parking --}}
<div class="row justify-content-center mx-5 px-5 mb-4">
    <div class="col-3">
        <i class="fa-brands fa-product-hunt icon-lg"></i>
    </div>
    <div class="col-9">
        <input id="parking" type="text" class="form-control" name="parking" required autocomplete="parking" autofocus placeholder="Add parking information" style="border: 1px solid #84947C">
        @error('parking')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- train --}}
<div class="row justify-content-center mx-5 px-5 mb-4">
    <div class="col-3">
        <i class="fa-solid fa-train-subway icon-lg"></i>
    </div>
    <div class="col-9">
        <input id="train" type="text" class="form-control" name="train" required autocomplete="train" autofocus placeholder="Add train/bus information" style="border: 1px solid #84947C">
        @error('train')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- toilet --}}
<div class="row justify-content-center mx-5 px-5 mb-4">
    <div class="col-3">
        <i class="fa-solid fa-restroom icon-lg"></i>
    </div>
    <div class="col-9">
        <input id="toilet" type="text" class="form-control" name="toilet" required autocomplete="toilet" autofocus placeholder="Add toilet information" style="border: 1px solid #84947C">
        @error('toilet')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- weather --}}
<div class="row justify-content-center mx-5 px-5 mb-4">
    <div class="col-3">
        <i class="fa-solid fa-cloud-showers-heavy icon-lg"></i>
    </div>
    <div class="col-9">
        <input id="weather" type="text" class="form-control" name="weather" required autocomplete="weather" autofocus placeholder="Add weather information" style="border: 1px solid #84947C">
        @error('weather')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- category --}}
<div class="row justify-content-center mx-5 px-5 mb-4">
    <div class="col-3">
        <select name="category" id="category" class="form-select me-2 required">
            <option value="" hidden>Category</option>
            @foreach ($categories as $index => $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
    </div>
    <div class="col-9">
        <input id="add_info" type="text" class="form-control" name="add_info" required autocomplete="add_info" autofocus placeholder="Add more information" style="border: 1px solid #84947C">
        @error('add_info')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
