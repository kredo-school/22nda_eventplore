
<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<div class="modal fade" id="all-reviews-page">
    <div class="modal-dialog modal-xl">
        <form action="#" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content mt-5">
                <div class="modal-header border-0 d-flex justify-content-center align-items-center mt-3">
                    <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-family: EB Garamond">
                    <div class="align-items-center justify-content-center flex-row d-flex">
                        {{--  レビューの星　--}}
                        <div style="width: 400px; height: 200px; border: 1px solid #0C2C04" class="rounded d-flex flex-column justify-content-center align-items-center ms-5">
                            <div class="mb-2">
                                <i class="fa-solid fa-star fa-3x"></i>
                                <span class="h1 ms-2 ">4.5</span>
                            </div>
                            <div class="text-center">
                                <p class="h6">( The average score customers evaluated .)</p>
                            </div>
                        </div>

                        {{-- レビューの評価(グラフ) --}}
                        <dl class="bar-chart-002 ms-4 w-25 rounded">
                            <div>
                                <dt>5:</dt>
                                <dd><span style="width: 80%">80%</span></dd>
                            </div>
                            <div>
                                <dt>4:</dt>
                                <dd><span style="width: 10%">10%</span></dd>
                            </div>
                            <div>
                                <dt>3:</dt>
                                <dd><span style="width: 5%">5%</span></dd>
                            </div>
                            <div>
                                <dt>2:</dt>
                                <dd><span style="width: 3%"> 3%</span></dd>
                            </div>
                            <div>
                                <dt>1:</dt>
                                <dd><span style="width: 2%">2%</span></dd>
                            </div>
                        </dl>

                    </div>


                    {{-- レビュー書く欄 --}}
                    <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                        <div class="mb-2">
                            <label class="satisfaction" class="form-label">Customer Satisfaction</label>
                            <span class="ms-3">
                                <i class="fa-solid fa-star fa-2x" style="color: #dcdcdc;"></i>
                                <i class="fa-solid fa-star fa-2x" style="color: #dcdcdc;"></i>
                                <i class="fa-solid fa-star fa-2x" style="color: #dcdcdc;"></i>
                                <i class="fa-solid fa-star fa-2x" style="color: #dcdcdc;"></i>
                                <i class="fa-solid fa-star fa-2x" style="color: #dcdcdc;"></i>
                            </span>
                        </div>

                        <div class="row" style="height: 38px;">
                            <div class="col-md-10">
                                <input type="text" id="satisfaction" name="satisfaction" class="form-control me-2" placeholder="Add comment">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-green">Add review</button>
                            </div>
                        </div>
                    </div>

                    <p class="h5 my-2">135 reviews</p>
                    {{-- 全てのコメントが見れる欄 --}}
                    <div style="overflow-y: auto; max-height: 400px;">
                        <div class="w-full rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                            <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 28px; height: 28px;">
                            <span class="h5 ms-2">John Smith</span>
                            <div class="ms-2">
                                <i class="fa-solid fa-star"></i>
                                <span class="me-2">5.0</span>
                                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                            </div>
                        </div>
                        <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                            <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 28px; height: 28px;">
                            <span class="h5 ms-2">John Smith</span>
                            <div class="ms-2">
                                <i class="fa-solid fa-star"></i>
                                <span class="me-2">5.0</span>
                                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                            </div>
                        </div>
                        <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                            <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 28px; height: 28px;">
                            <span class="h5 ms-2">John Smith</span>
                            <div class="ms-2">
                                <i class="fa-solid fa-star"></i>
                                <span class="me-2">5.0</span>
                                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                            </div>
                        </div>
                        <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                            <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 28px; height: 28px;">
                            <span class="h5 ms-2">John Smith</span>
                            <div class="ms-2">
                                <i class="fa-solid fa-star"></i>
                                <span class="me-2">5.0</span>
                                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                            </div>
                        </div>
                        <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                            <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 28px; height: 28px;">
                            <span class="h5 ms-2">John Smith</span>
                            <div class="ms-2">
                                <i class="fa-solid fa-star"></i>
                                <span class="me-2">5.0</span>
                                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                            </div>
                        </div>
                        <div class="w-full mt-3 rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); ">
                            <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 28px; height: 28px;">
                            <span class="h5 ms-2">John Smith</span>
                            <div class="ms-2">
                                <i class="fa-solid fa-star"></i>
                                <span class="me-2">5.0</span>
                                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>


