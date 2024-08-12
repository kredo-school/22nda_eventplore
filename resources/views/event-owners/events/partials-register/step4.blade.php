{{-- STEP4 --}}
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css">

{{-- area --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <label for="area_id" class="form-label fw-bold mb-2 text-start">Area*</label>
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
    <div class="mb-3 position-relative" id="search-container">
        <input type="text" id="search_address" name="search_address" class="form-control" style="border: 1px solid #84947C"/>
    </div>
    <div class="mb-3">
        <input type="text" name="address" id="address" class="form-control" style="border: 1px solid #84947C" placeholder="Enter full address" autocomplete="street-address">
    </div>
    <div class="col-6 mb-3">
        {{-- hidden latitude --}}
        <input type="hidden" name="latitude" id="latitude">
    </div>
    <div class="col-6 mb-3">
        {{-- hidden longitude --}}
        <input type="hidden" name="longitude" id="longitude">
    </div>
</div>
{{-- show map --}}
<div class="row justify-content-center mx-5 px-5 mb-5">
    <div id="map-container" class="col-12" style="height: 300px;">
        <div id="map" class="w-100 h-100 rounded"></div>
    </div>
</div>
