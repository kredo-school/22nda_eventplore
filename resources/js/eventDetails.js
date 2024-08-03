
// Mapbox
mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
const map = new mapboxgl.Map({
    container: 'map', // Your map container ID
    style: 'mapbox://styles/mari-ka/clyeemvm700s001r4cviiefes', // Example style
    center: [139.839478, 35.652832], // Center coordinates
    // 経度、緯度
    zoom: 8, // Zoom level
  });

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
        var numTickets = parseInt(numTicketsSelect.value) || 1;
        var totalPrice = numTickets * eventPrice;
        if (totalPriceElement) {
            totalPriceElement.textContent = new Intl.NumberFormat().format(totalPrice);
        }
        if (modalTotalPrice) {
            modalTotalPrice.textContent = new Intl.NumberFormat().format(totalPrice);
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

            if (modalDate) {
                var dateSelected = selectedDate ? new Date(selectedDate).toLocaleDateString() : 'Not selected';
                modalDate.textContent = dateSelected;
                const inputElement = document.getElementById('event_date');
                inputElement.value = dateSelected;
            }
            if (modalTime) {
                var timeSelected = selectedTime || 'Not selected';
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
        hiddenNumTickets.value = numTicketsSelect.value;
        hiddenEventDate.value = document.querySelector('select[name="event_date"]').value;
        hiddenEventTime.value = document.querySelector('select[name="event_time"]').value;
    });
});
