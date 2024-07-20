{{-- STEP2 --}}
{{-- 予約情報 --}}
<div class="row justify-content-center mx-5 px-5">
    {{-- participants --}}
    <div class="col-lg-6 mb-3 text-start">
        <label for="max_participants" class="fw-bold mb-2 text-start">Max Participants*</label>
        <input type="number" name="max_participants" id="max_participants" class="form-control" required autocomplete="max_participants" autofocus style="border: 1px solid #84947C">
    </div>
    {{-- reservation deadline --}}
    <div class="col-lg-6 mb-3 text-start">
        <label for="app_deadline" class="fw-bold mb-2 text-start">Resrevation Deadline*</label>
        <input type="date" name="app_deadline" id="app_deadline" class="form-control" required autocomplete="app_deadline" autofocus style="border: 1px solid #84947C">
    </div>
    {{-- price / person --}}
    <div class="col-lg-12 mb-3 text-start">
        <label for="price" class="fw-bold mb-2 text-start">Price/Person*</label>
        <input type="number" name="price" id="price" class="form-control" required autocomplete="price" autofocus style="border: 1px solid #84947C" placeholder="¥1,000">
    </div>
</div>