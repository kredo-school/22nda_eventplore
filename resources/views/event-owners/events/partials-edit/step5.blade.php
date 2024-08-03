{{-- STEP5 --}}
{{-- images --}}
<div class="row justify-content-center mx-5 px-5">
    <div class="container-fluid p-0 mb-4">
        <div class="d-flex flex-wrap w-100 mb-2 image-part" style="height: 100%; overflow-x: auto;">
            @php
                $images = $event->eventImages;
                $firstImage = $images->first();
                $otherImages = $images->slice(1);
                $totalOtherImages = $otherImages->count();
                $totalImages = $images->count();
            @endphp
            {{-- メイン写真 --}}
            <div class="justify-content-center p-1 main-image" id="{{ $firstImage->image }}" style="flex: 1; position: relative;">
                <img src="{{ $firstImage->image }}" class="img-fluid w-100 h-100 main-image-preview" style="object-fit: cover;" alt="#">
                {{-- カメラアイコン→押すとファイル選択できる --}}
                <label for="file-input-main" class="edit-image">
                    <i class="fa-solid fa-camera-retro"></i>
                </label>
                <input type="file" name="image[]" id="file-input-main" class="form-control d-none" onchange="previewImage(this, 'main-image-preview')">
                {{-- 削除アイコン --}}
                <button type="button" class="delete-image" data-image-id="{{ $firstImage->id }}">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            {{-- 他の画像 --}}
            <div class="d-flex flex-wrap other-images">
                @foreach($otherImages as $index => $image)
                    <div class="w-50 p-1" id="{{ $image->id }}" style="position: relative;">
                        <img src="{{ $image->image }}" class="img-fluid other-image-preview-{{ $index }}"  style="object-fit: cover; aspect-ratio: 1;" alt="#">
                        {{-- カメラアイコン→押すとファイル選択できる --}}
                        <label for="file-input-{{ $index }}" class="edit-image">
                            <i class="fa-solid fa-camera-retro"></i>
                        </label>
                        <input type="file" name="{{$image->id}}" id="file-input-{{ $index }}" class="form-control d-none" onchange="previewImage(this, 'other-image-preview-{{ $index }}')">
                        {{-- 削除アイコン --}}
                        <button type="button" class="delete-image" data-image-id="{{ $image->id }}">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if($totalImages < 5)
        <label for="form-label" class="fw-bold mb-2 text-start">New image</label>
        <div class="col-12 mb-3">
            <input type="file" name="new-image" id="image" class="form-control" style="border: 1px solid #84947C">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif
</div>

