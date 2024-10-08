{{-- STEP7 --}}
{{-- link --}}
<div class="row justify-content-center mx-5 px-5 mb-3">
    <div class="col-lg-4 mb-3 text-start">
        <i class="fab fa-facebook icon-md" style="color: #0C2C04"></i>
        <input type="url" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link', $event->facebook_link) }}" style="border: 1px solid #84947C">
    </div>
    <div class="col-lg-4 mb-3 text-start">
        <i class="fa-brands fa-x-twitter icon-md" style="color: #0C2C04"></i>
        <input type="url" name="x_link" id="x_link" class="form-control" value="{{ old('x_link', $event->x_link) }}" style="border: 1px solid #84947C">
    </div>
    <div class="col-lg-4 mb-3 text-start">
        <i class="fab fa-instagram icon-md" style="color: #0C2C04"></i>
        <input type="url" name="insta_link" id="insta_link" class="form-control" value="{{ old('insta_link', $event->insta_link) }}" style="border: 1px solid #84947C">
    </div>
</div>
<div class="row justify-content-center mx-5 px-5">
    <label for="official" class="fw-bold mb-2 text-start">Official Website</label>
    <div class="col-12 mb-3">
        <input type="url" name="official" id="official" class="form-control" value="{{ old('official', $event->official) }}" style="border: 1px solid #84947C">
    </div>
</div>