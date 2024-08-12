<div class="row justify-content-center mx-5 px-5">
    <label for="event_name" class="fw-bold mb-2 text-start">Event Name*</label>
    <div class="col-12 mb-3">
        <input id="event_name" type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" required autocomplete="off" autofocus placeholder="Event Name" style="border: 1px solid #84947C">
        @error('event_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row justify-content-center mx-5 px-5">
    <div class="col-lg-6 mb-3 text-start">
        <label for="start_date" class="fw-bold mb-2 text-start">Start Date*</label>
        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" required autocomplete="start_date" autofocus style="border: 1px solid #84947C">
        @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-lg-6 mb-3 text-start">
        <label for="finish_date" class="fw-bold mb-2 text-start">Finish Date*</label>
        <input type="date" name="finish_date" id="finish_date" class="form-control @error('finish_date') is-invalid @enderror" required autocomplete="finish_date" autofocus style="border: 1px solid #84947C">
        @error('finish_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-lg-6 mb-3 text-start">
        <label for="start_time" class="fw-bold mb-2 text-start">Start Time*</label>
        <input type="time" name="start_time" step="1800" value="00:00" id="start_time" class="form-control @error('start_time') is-invalid @enderror" required autocomplete="start_time" autofocus style="border: 1px solid #84947C">
        @error('start_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-lg-6 mb-3 text-start">
        <label for="finish_time" class="fw-bold mb-2 text-start">Finish Time*</label>
        <input type="time" name="finish_time" step="1800" value="00:00" id="finish_time" class="form-control @error('finish_time') is-invalid @enderror" required autocomplete="finish_time" autofocus style="border: 1px solid #84947C">
        @error('finish_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row justify-content-center mx-5 px-5">
    <label for="details" class="fw-bold mb-2 text-start">Content*</label>
    <div class="col-12 mb-3">
        <textarea name="details" id="details" rows="3" class="form-control @error('details') is-invalid @enderror" required placeholder="Content" style="border: 1px solid #84947C"></textarea>
        @error('details')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row justify-content-center mx-5 px-5">
    <label for="history" class="fw-bold mb-2 text-start">History*</label>
    <div class="col-12 mb-3">
        <textarea name="history" id="history" rows="3" class="form-control @error('history') is-invalid @enderror" required placeholder="History" style="border: 1px solid #84947C"></textarea>
        @error('history')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
