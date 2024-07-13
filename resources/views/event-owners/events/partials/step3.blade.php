{{-- STEP3 --}}
{{-- area --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <label for="area" class="h4 form-label mb-2">Area</label>
    <select class="form-select me-2" id="area" name="area">
        <option value="" hidden selected>Select Area</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
    </select>
</div>
{{-- map --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <label for="form-label" class="fw-bold mb-2 text-start">Address*</label>
    {{-- search box --}}
    <div class="col-12 mb-3 position-relative">
        <input id="address" type="text" class="form-control" name="address" required autocomplete="address" autofocus placeholder="1-1-1 Minatomirai Nishi-ku, Yokohama, Japan" style="border: 1px solid #84947C" onchange="searchHandler()">
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="map-container border rounded mt-2 position-absolute z-1 bg-white">
            <ul id="search-container" class="text-start list-unstyled p-0 m-0 ms-2 ps-2"></ul>
        </div>
    </div>
</div>
{{-- show map --}}
<div class="row justify-content-center mx-5 px-5 mb-5">
    <div id="map" class="w-100 rounded" style="height: 300px;"></div>
</div>