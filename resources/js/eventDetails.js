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

    var hiddenNumTickets = document.getElementById('num_tickets');
    var hiddenEventDate = document.getElementById('event_date');
    var hiddenEventTime = document.getElementById('event_time');

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
            var numTickets = numTicketsSelect.value;
            if (modalNumTickets) {
                modalNumTickets.textContent = numTickets;
                const inputElement = hiddenNumTickets;
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
                const inputElement = hiddenEventDate;
                inputElement.value = dateSelected;
            }
            if (modalTime) {
                var timeSelected = selectedTime ? formatTime(selectedTime) : 'Not selected';
                modalTime.textContent = timeSelected;
                const inputElement = hiddenEventTime;
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

    document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', function(event) {
        var selectedDate = document.querySelector('select[name="event_date"]').value;
        var selectedTime = document.querySelector('select[name="event_time"]').value;

        var hasError = false;

        // 日付の検証
        if (selectedDate === '') {
            alert('Please select a valid date.');
            hasError = true;
        }

        // 時間の検証
        if (selectedTime === '') {
            alert('Please select a valid time.');
            hasError = true;
        }

        if (hasError) {
            event.preventDefault(); // フォーム送信を防ぐ
        // 必要な情報がすべて入力されているかチェック
        if (!numTicketsValue || !eventDateValue || !eventTimeValue) {
            // エラーメッセージを表示
            alert('Please fill out all fields.');
            return;
        }

        // 隠しフィールドに値を設定
        if (hiddenNumTickets) {
            hiddenNumTickets.value = numTicketsValue;
        }
        if (hiddenEventDate) {
            hiddenEventDate.value = eventDateValue;
        }
        if (hiddenEventTime) {
            hiddenEventTime.value = eventTimeValue;
        }

        // フォームの送信処理をここに記述
        event.target.submit();
    };
});

// Topに戻るボタンの表示
document.addEventListener("DOMContentLoaded", function() {
    var backToTopButton = document.getElementById('back-to-top');
    var footer = document.querySelector('footer');

    window.addEventListener('scroll', function() {
        var scrollPosition = window.scrollY + window.innerHeight;
        var footerTop = footer.getBoundingClientRect().top + window.scrollY;

        if (window.scrollY > 500) {
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }

        if (scrollPosition >= footerTop) {
            backToTopButton.style.bottom = (scrollPosition - footerTop + 8) + 'px';
        } else {
            backToTopButton.style.bottom = '14px';
        }
    });
});



    backToTopButton.addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
});
