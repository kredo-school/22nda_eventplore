<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@vite(['resources/js/star.js'])

<div class="modal fade" id="all-reviews-page" tabindex="-1" aria-labelledby="all-reviews-pageLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('reviews.store', $event->id) }}" method="post" id="review-form">
            @csrf
            <div class="modal-content mt-5">
                <div class="modal-header border-0 d-flex justify-content-center align-items-center mt-3">
                    <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-family: EB Garamond">
                    <div class="align-items-center justify-content-center flex-row d-flex">
                        {{--  レビューの星　--}}
                        <div style="width: 320px; height: 180px; border: 1px solid #0C2C04" class="review-star-container rounded d-flex flex-column justify-content-center align-items-center ms-5">
                            @php
                            $averageRating = number_format($averageRating, 1);
                            $fullStars = floor($averageRating);
                            $halfStar = ($averageRating > $fullStars) ? true : false;
                            @endphp
                            <div>
                                <span class="h1 mb-2">{{ $averageRating }}</span>
                            </div>
                            <div class="mb-2 d-flex align-items-center">
                                {{-- フルの星 --}}
                                @for ($i = 1; $i <= $fullStars; $i++)
                                    <i class="fa-solid fa-star fa-2x"></i>
                                @endfor

                                {{-- 半分の星 --}}
                                @if ($halfStar)
                                    <i class="fa-solid fa-star fa-2x half-filled"></i>
                                @endif

                                {{-- 空の星 --}}
                                @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                    <i class="fa-solid fa-star fa-2x empty"></i>
                                @endfor

                            </div>
                            <div class="text-center">
                                <p class="h6">( The average score customers evaluated. )</p>
                            </div>
                        </div>

                        {{-- レビューの評価(グラフ) --}}
                        <dl class="bar-chart-002 ms-4 w-25 rounded mt-3">
                        @php
                            $defaultStars = [5, 4, 3, 2, 1];
                            $ratingCountsArray = $ratingCounts->toArray();

                            $totalReviews = max($event->reviews->count(), 1);
                        @endphp

                        @foreach($defaultStars as $star)
                            <div>
                                <dt>{{ $star }}:</dt>
                                @php
                                    // 評価のカウントを取得（存在しない場合は0）
                                    $count = $ratingCountsArray[$star] ?? 0;

                                    // 幅の計算（0%も表示されるように）
                                    $width = ($totalReviews > 0) ? ($count / $totalReviews) * 100 : 0;
                                    $widthInt = (int) floor($width);
                                @endphp
                                <dd>
                                    <span style="display: inline-block; width: {{ $width }}%;">
                                        {{ $widthInt }}%
                                    </span>
                                </dd>
                            </div>
                        @endforeach

                        </dl>
                    </div>

                    {{-- レビュー書く欄 --}}
                    @auth
                        @if (Auth::user()->id != $event->owner_id)
                            <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                                <div class="mb-2 d-flex align-items-center">
                                    <label class="satisfaction" class="form-label">Customer Satisfaction</label>
                                    <div class="stars ms-2">
                                        <span class="star" data-value="1">
                                            <i class="fa-solid fa-star fa-2x"></i>
                                        </span>
                                        <span class="star" data-value="2">
                                            <i class="fa-solid fa-star fa-2x"></i>
                                        </span>
                                        <span class="star" data-value="3">
                                            <i class="fa-solid fa-star fa-2x"></i>
                                        </span>
                                        <span class="star" data-value="4">
                                            <i class="fa-solid fa-star fa-2x"></i>
                                        </span>
                                        <span class="star" data-value="5">
                                            <i class="fa-solid fa-star fa-2x"></i>
                                        </span>
                                    </div>
                                    <input type="hidden" id="selected-star" name="star" value="">
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <input type="text" id="comment" name="comment" class="form-control me-2" placeholder="Add comment">

                                        <div id="error-container" data-has-errors="{{ $errors->any() ? 'true' : 'false' }}" data-review-submitted="{{ session('reviewSubmitted') ? 'true' : 'false' }}" class="text-danger">
                                            @error('comment')
                                                <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-green">Add review</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <p class="h5 mt-3">{{ $event->reviews->count() }} reviews</p>
                    {{-- 全てのコメントが見れる欄 --}}
                    <div style="overflow-y: auto; max-height: 400px;">
                    @foreach($event->reviews->sortByDesc('created_at') as $review)
                        <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                            <div class="d-flex align-items-end">
                                @if ($review->user->avatar)
                                    <img src="{{ $review->user->avatar }}" alt="{{ $review->user->name }}" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user avatar-sm m-0"></i>
                                @endif
                                <span class="h5 ms-2 my-0 fs-4">{{ $review->user->username }}</span>
                                <span class="ms-2">{{ $review->created_at->format('Y-m-d') }}</span>
                            </div>
                            <div class="ms-1 mt-1 align-items-start d-flex align-items-center">
                                <span class="star-rating-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa-solid fa-star {{ $i <= $review->star ? 'filled' : '' }}"></i>
                                    @endfor
                                </span>
                                <span class="ms-2">{{ $review->comment }}</span>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
