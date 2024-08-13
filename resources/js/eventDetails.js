// Mapbox
mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;

// イベントデータを取得
const event = window.eventData;

// イベント位置を中心に地図を作成
const map = new mapboxgl.Map({
    container: 'map', // Your map container ID
    style: 'mapbox://styles/mari-ka/clyeemvm700s001r4cviiefes', // Example style
    center: [event.longitude, event.latitude], // Center coordinates
    // 経度、緯度
    zoom: 13, // Zoom level
});

// 新しいマーカーを作成
new mapboxgl.Marker({ color: '#F7142B' })
    .setLngLat([event.longitude, event.latitude])
    .addTo(map);

// 全画面ボタン、ズームボタン、スケールを追加
map.addControl(new mapboxgl.FullscreenControl(), 'top-left');
map.addControl(new mapboxgl.NavigationControl());
map.addControl(new mapboxgl.ScaleControl(), 'bottom-left');


// イベント詳細ページ
  document.addEventListener('DOMContentLoaded', function() {
    var numTicketsSelect = document.getElementById('numTickets');
    var totalPriceElement = document.getElementById('totalPrice');
    var eventPrice = parseFloat(totalPriceElement.getAttribute('data-price'));

    var modalTotalPrice = document.getElementById('modalTotalPrice');
    var modalNumTickets = document.getElementById('modalNumTickets');
    var modalDate = document.getElementById('modalDate');
    var modalTime = document.getElementById('modalTime');

    var hiddenNumTickets = document.getElementById('hiddenNumTickets');
    var hiddenEventDate = document.getElementById('hiddenEventDate');
    var hiddenEventTime = document.getElementById('hiddenEventTime');

    function updateTotalPrice() {
        var numTickets = parseInt(numTicketsSelect.value);
        if (isNaN(numTickets) || numTickets <= 0) {
            if (modalNumTickets) {
                modalNumTickets.textContent = 'Not selected';
            }
            if (modalTotalPrice) {
                modalTotalPrice.textContent = '0';
            }
        } else {
            var totalPrice = numTickets * eventPrice;
            if (totalPriceElement) {
                totalPriceElement.textContent = new Intl.NumberFormat().format(totalPrice);
            }
            if (modalTotalPrice) {
                modalTotalPrice.textContent = new Intl.NumberFormat().format(totalPrice);
            }
            if (modalNumTickets) {
                modalNumTickets.textContent = numTickets;
            }
        }
    }

    numTicketsSelect.addEventListener('change', function() {
        updateTotalPrice();
        if (modalNumTickets) {
            modalNumTickets.textContent = numTicketsSelect.value;
        }
    });

    updateTotalPrice();

    var modal = document.getElementById('user-confirm-reservation');
    if (modal) {
        modal.addEventListener('shown.bs.modal', function() {
            var numTickets = parseInt(numTicketsSelect.value) || 1;
            if (modalNumTickets) {
                modalNumTickets.textContent = numTickets;
                const inputElement = document.getElementById('num_tickets');
                inputElement.value = numTickets;
            }
            updateTotalPrice();

            var selectedDate = document.querySelector('select[name="event_date"]').value;
            var selectedTime = document.querySelector('select[name="event_time"]').value;

            // if (modalDate) {
            //     var dateSelected = selectedDate ? new Date(selectedDate).toLocaleDateString() : 'Not selected';
            //     modalDate.textContent = dateSelected;
            //     const inputElement = document.getElementById('event_date');
            //     inputElement.value = dateSelected;
            // }
            // if (modalTime) {
            //     var timeSelected = selectedTime || 'Not selected';
            //     modalTime.textContent = timeSelected;
            //     const inputElement = document.getElementById('event_time');
            //     inputElement.value = timeSelected;

            // }


            function formatDate(date) {
                let d = new Date(date);
                let year = d.getFullYear();
                let month = ('0' + (d.getMonth() + 1)).slice(-2);
                let day = ('0' + d.getDate()).slice(-2);
                return `${year}-${month}-${day}`;
            }

            function formatTime(time) {
                let [hours, minutes] = time.split(':');
                hours = ('0' + hours).slice(-2);
                minutes = ('0' + minutes).slice(-2);
                return `${hours}:${minutes}`;
            }

            if (modalDate) {
                var dateSelected = selectedDate ? formatDate(selectedDate) : 'Not selected';
                modalDate.textContent = dateSelected;
                const inputElement = document.getElementById('event_date');
                inputElement.value = dateSelected;
            }
            if (modalTime) {
                var timeSelected = selectedTime ? formatTime(selectedTime) : 'Not selected';
                modalTime.textContent = timeSelected;
                const inputElement = document.getElementById('event_time');
                inputElement.value = timeSelected;
            }
        });
    }

    var dateSelect = document.querySelector('select[name="event_date"]');
    var timeSelect = document.querySelector('select[name="event_time"]');

    if (dateSelect) {
        dateSelect.addEventListener('change', function() {
            if (modalDate) {
                modalDate.textContent = dateSelect.options[dateSelect.selectedIndex].text;
            }
        });
    }

    if (timeSelect) {
        timeSelect.addEventListener('change', function() {
            if (modalTime) {
                modalTime.textContent = timeSelect.options[timeSelect.selectedIndex].text;
            }
        });
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // デフォルトのフォーム送信を防ぐ

        const numTicketsValue = numTicketsSelect.value;
        const eventDateValue = document.querySelector('select[name="event_date"]').value;
        const eventTimeValue = document.querySelector('select[name="event_time"]').value;

    });
});

// Topに戻るボタンの表示
document.addEventListener("DOMContentLoaded", function() {
    var backToTopButton = document.getElementById('back-to-top');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 700) {
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }
    });

    backToTopButton.addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
});
