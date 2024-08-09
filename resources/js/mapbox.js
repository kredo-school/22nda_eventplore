mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
const map = new mapboxgl.Map({
    container: 'map', // Your map container ID
    style: 'mapbox://styles/mari-ka/clyeemvm700s001r4cviiefes', // Example style
    center: [139.839478, 35.652832], // Center coordinates
    // 経度、緯度
    zoom: 8, // Zoom level
    attributionControl: false
});

// イベントデータを取得
const events = JSON.parse(document.getElementById('event-data').textContent);

function addEventMarkers(events) {
    // イベントごとにピンを追加
    events.forEach(event => {
        const reviews = event.reviews || [];
        const avgStar = reviews.length > 0
            ? (reviews.reduce((sum, review) => sum + review.star, 0) / reviews.length).toFixed(1)
            : "No Reviews";
        const reviewContent = reviews.length > 0
            ? `<h4 class="h4 text-dark overflow_cut"><i class="fa-solid fa-star me-1 star-color"></i>${avgStar}</h4>`
            : `<h6 class="text-muted overflow_cut">No Reviews</h6><h4 style="visibility: hidden">.</h4>`;

        let eventCategories = '';
        let loopCount = 0;

        if (event.event_categories && event.event_categories.length > 0) {
            event.event_categories.forEach(event_category => {
            if (loopCount < 2) {
                eventCategories += `<div class="col-4"><div class="tag rounded-pill overflow_dot py-1 w-100">${event_category.category.name}</div></div>`;
                loopCount++;
            }
        });
        }
        if (loopCount === 0) {
            eventCategories = '<div class="col-8"><div class="tag rounded-pill bg-secondary overflow_dot py-1 text-white w-50">No Category</div></div>';
        }

        const startDate = new Date(event.start_date);
        const finishDate = new Date(event.finish_date);

        const dateContent = startDate.toDateString() === finishDate.toDateString()
            ? `${startDate.toLocaleDateString('ja-JP', { month: '2-digit', day: '2-digit' })}`
            : `${startDate.toLocaleDateString('ja-JP', { month: '2-digit', day: '2-digit' })}~${finishDate.toLocaleDateString('ja-JP', { month: '2-digit', day: '2-digit' })}`;

        const startTime = event.start_time.slice(0, 5);
        const finishTime = event.finish_time.slice(0, 5);
        const timeContent = `${startTime}~${finishTime}`;

        // イベント画像のカルーセル設定
        const carouselId = 'carousel-map' + event.id;
        const eventImages = event.event_images || [];
        let eventImageContent = '';

        if (eventImages.length === 0) {
            eventImageContent = '<img src="path/to/default-image.jpg" alt="no image" class="rounded-top card-img-sm w-100 mb-3">';
        } else if (eventImages.length === 1) {
            eventImageContent = `<img src="${eventImages[0].image}" alt="${event.event_name}" class="rounded-top card-img-sm w-100 mb-3">`;
        } else {
            eventImageContent = `
            <div id="${carouselId}" class="carousel slide">
                <div class="carousel-indicators">
                    ${eventImages.map((image, index) => `
                        <button type="button" data-bs-target="#${carouselId}" data-bs-slide-to="${index}" class="${index === 0 ? 'active' : ''}" aria-current="true" aria-label="Slide ${index + 1}"></button>
                    `).join('')}
                </div>
                <div class="carousel-inner">
                    ${eventImages.map((image, index) => `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                        <img src="${image.image}" alt="${event.event_name}" class="rounded-top card-img-sm w-100 mb-3">
                        </div>
                    `).join('')}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#${carouselId}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#${carouselId}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            `;
        }

        // PopupのHTML
        const popupContent = `
            <a href="/event/${event.id}/details-page" class="map-pop">
                <div>
                    ${eventImageContent}
                    <div class="m-2 mb-3">
                        <div class="row align-items-center">
                            <div class="col-11 pe-0">
                                <h4 class="mb-1 text-dark text-break">${event.event_name}</h4>
                            </div>
                            <div class="col d-flex justify-content-end mb-1 me-1">${reviewContent}</div>
                        </div>
                        <div class="row align-items-center gx-1 mb-2">
                            <div class="col-4 overflow_dot text-dark">
                                <i class="fa-solid fa-location-dot me-1"></i>${event.area.name} area
                            </div>
                            ${eventCategories}
                        </div>
                        <div class="row align-items-center gx-1">
                            <div class="col-4 text-dark">
                                <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                            </div>
                            <div class="col-4 align-self-center">
                                <div class="tag rounded-pill overflow_dot py-1 w-100">${dateContent}</div>
                            </div>
                            <div class="col-4 align-self-center">
                                <div class="tag rounded-pill overflow_dot py-1 w-100">${timeContent}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        `;

        // 新しいマーカーを作成
        const marker = new mapboxgl.Marker({ color: '#0C2C04' }) // ピンの色
            .setLngLat([event.longitude, event.latitude])
            .setPopup(new AnimatedPopup({
                // Popupのアニメーション
                openingAnimation: {
                duration: 500,
                easing: 'easeOutQuart',
                transform: 'scale'
                },
                closingAnimation: {
                duration: 300,
                easing: 'easeInBack',
                transform: 'scale'
                },
                closeButton: false,
            })
            // Popupの幅
            .setMaxWidth('270px')
            .setHTML(popupContent))
            .addTo(map);

        // マーカー選択時にマーカーの色を赤に変更
        marker.getPopup().on('open', () => {
            const pathElement = marker.getElement().querySelector('path');
            if (pathElement) {
            pathElement.setAttribute('fill', '#F7142B');
            }
        });

        // マーカー選択解除時にマーカーの色を元に戻す
        marker.getPopup().on('close', () => {
            const pathElement = marker.getElement().querySelector('path');
            if (pathElement) {
            pathElement.setAttribute('fill', '#0C2C04');
            }
        });
    });
}

// マップがロードされた後にソースとレイヤーを追加
map.on('load', function() {
    // ユーザーの位置情報の取得に成功した時
    function success(position) {
        const { latitude, longitude } = position.coords;
        map.setCenter([longitude, latitude]);
        map.setZoom(8);

        // 現在地に青い点を追加
        map.addSource('current-location', {
            type: 'geojson',
            data: {
                type: 'FeatureCollection',
                features: [{
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [longitude, latitude]
                    }
                }]
            }
        });

        map.addLayer({
            id: 'current-location-layer',
            type: 'circle',
            source: 'current-location',
            paint: {
                'circle-color': '#4264fb',
                'circle-radius': 7,
                'circle-stroke-width': 4,
                'circle-stroke-color': '#ffffff',
            }
        });

        addEventMarkers(events);
    }

    // ユーザーの位置情報の取得に失敗した時
    function error() {
        // alert('Failed to acquire location information.');
        addEventMarkers(events);
    }

    // ユーザーの位置情報を取得
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        alert('Your browser does not support location data acquisition.');
        addEventMarkers(events);
    }
});

// ズームボタン、スケール、インフォメーションを追加
map.addControl(new mapboxgl.NavigationControl());
map.addControl(new mapboxgl.ScaleControl(), 'bottom-left');
map.addControl(new mapboxgl.AttributionControl({compact: true}));
