{{-- STEP1 --}}
{{-- 基本情報 --}}
<div class="row justify-content-center mx-5 px-5">
    <label for="form-label" class="fw-bold mb-2 text-start">Event Name*</label>
    <div class="col-12 mb-3">
        <input id="event_name" type="text" class="form-control" name="event_name" required autocomplete="event_name" autofocus placeholder="Event Name" style="border: 1px solid #84947C">
        @error('event_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- Event Date --}}
<div class="row justify-content-center mx-5 px-5">
    <div class="col-lg-6 mb-3 text-start">
        <label for="start_date" class="fw-bold mb-2 text-start">Start Date*</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required autocomplete="start_date" autofocus style="border: 1px solid #84947C">
    </div>
    <div class="col-lg-6 mb-3 text-start">
        <label for="finish_date" class="fw-bold mb-2 text-start">Finish Date*</label>
        <input type="date" name="finish_date" id="finish_date" class="form-control" required autocomplete="finish_date" autofocus style="border: 1px solid #84947C">
    </div>
    <div class="col-lg-6 mb-3 text-start">
        <label for="start_time" class="fw-bold mb-2 text-start">Start Time*</label>
        <input type="time" name="start_time" id="start_time" class="form-control" required autocomplete="start_time" autofocus style="border: 1px solid #84947C">
    </div>
    <div class="col-lg-6 mb-3 text-start">
        <label for="finish_time" class="fw-bold mb-2 text-start">Finish Time*</label>
        <input type="time" name="finish_time" id="finish_time" class="form-control" required autocomplete="finish_time" autofocus style="border: 1px solid #84947C">
    </div>
</div>
{{-- Content --}}
<div class="row justify-content-center mx-5 px-5">
    <label for="form-label" class="fw-bold mb-2 text-start">Content*</label>
    <div class="col-12 mb-3">
        <textarea name="details" id="details" rows="3" class="form-control" required placeholder="Content" style="border: 1px solid #84947C"></textarea>
        @error('details')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- History --}}
<div class="row justify-content-center mx-5 px-5">
    <label for="form-label" class="fw-bold mb-2 text-start">History*</label>
    <div class="col-12 mb-3">
        <textarea name="history" id="history" rows="3" class="form-control" required placeholder="History" style="border: 1px solid #84947C"></textarea>
        @error('history')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>