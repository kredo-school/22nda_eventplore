{{-- STEP4 --}}
{{-- area --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <label for="area" class="form-label fw-bold mb-2 text-start">Area</label>
    <div class="col-12">
        <select class="form-select me-2 form-control" id="area_id" name="area_id" style="border: 1px solid #84947C">
            <option value="" hidden selected>Select Area</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
    </div>
</div>
{{-- map --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <label for="address" class="form-label fw-bold mb-2 text-start">Address*</label>
    {{-- search box --}}
    <div class="col-12 mb-3 position-relative" id="search">
        <input type="text" id="address" class="form-control" style="border: 1px solid #84947C" placeholder="Enter address" />
        <button class="border-0" onclick="searchLocation()"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</div>
{{-- show map --}}
<div class="row justify-content-center mx-5 px-5 mb-5">
    <div id="map" class="w-100 rounded" style="height: 300px;"></div>
</div>
