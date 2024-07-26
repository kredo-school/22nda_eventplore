mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
const map = new mapboxgl.Map({
    container: 'map', // Your map container ID
    style: 'mapbox://styles/mari-ka/clyeemvm700s001r4cviiefes', // Example style
    center: [139.767125, 35.681236], // Center coordinates
    // 経度、緯度
    zoom: 8, // Zoom level
  });

// イベントデータを取得
const events = JSON.parse(document.getElementById('event-data').textContent);



// イベントごとにピンを追加
events.forEach(event => {
  const avgStar = event.avg_star === null ? "No Reviews" : `${parseFloat(event.avg_star).toFixed(1)}`;
  const reviewContent = event.avg_star === null ? `<h6 class="text-muted overflow_cut">No Reviews</h6><h4 style="visibility: hidden">.</h4>` : `<h4 class="h4 text-dark overflow_cut"><i class="fa-solid fa-star me-1"></i>${avgStar}</h4>`;

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

  // PopupのHTML
  const popupContent = `
      <a href="" class="map-pop">
        <div>
          <img src="${event.image}" alt="${event.event_name}" class="rounded-top card-img-sm w-100 mb-3">
          <div class="m-2 mb-3">
            <div class="row align-items-center">
              <div class="col-11 pe-0">
                  <h4 class="mb-1 text-dark">${event.event_name}</h4>
              </div>
              <div class="col d-flex justify-content-end mb-1 me-1">
                  ${reviewContent}
              </div>
            </div>
            <div class="row align-items-center gx-1 mb-2">
              <div class="col-4 overflow_dot text-dark">
                <i class="fa-solid fa-location-dot me-1"></i>${event.area_name} area
              </div>
              ${eventCategories}
            </div>
            <div class="row align-items-center gx-1">
              <div class="col-4 text-dark">
                <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
              </div>
              <div class="col-4 align-self-center">
                <div class="tag rounded-pill overflow_dot py-1 w-100">
                  ${dateContent}
                </div>
              </div>
              <div class="col-4 align-self-center">
                <div class="tag rounded-pill overflow_dot py-1 w-100">
                  ${timeContent}
                </div>
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

  // 選択時にマーカーを赤に変更
  marker.getPopup().on('open', () => {
    const pathElement = marker.getElement().querySelector('path');
    if (pathElement) {
        pathElement.setAttribute('fill', '#F7142B');
    }
  });

  // 選択解除時にマーカーの色を戻す
  marker.getPopup().on('close', () => {
    const pathElement = marker.getElement().querySelector('path');
    if (pathElement) {
        pathElement.setAttribute('fill', '#0C2C04');
    }
  });
});

// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());