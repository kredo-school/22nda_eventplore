const accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
mapboxgl.accessToken = accessToken;
var map = new mapboxgl.Map({
    container: "map", // Your map container ID
    style: "mapbox://styles/mari-ka/clyeemvm700s001r4cviiefes", // Example style
    center: [139.839478, 35.652832], // Center coordinates
    zoom: 8, // Zoom level
});

const geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    placeholder: "Enter address", // Placeholder text for the search bar
    proximity: {
        longitude: 139.839478,
        latitude: 35.652832,
    }, // Coordinates of Tokyo
    flyTo: false,
});

document.getElementById("search-container").appendChild(geocoder.onAdd(map));

// Geocoderのデフォルトの検索インプットフィールドを取得し、スタイルを適用
const geocoderInput = document.querySelector(".mapboxgl-ctrl-geocoder--input");
geocoderInput.classList.add("form-control");
geocoderInput.style.border = "1px solid #84947C";
geocoderInput.style.borderRadius = ".25rem";
geocoderInput.style.boxSizing = "border-box";
geocoderInput.style.width = "100%";

// カスタムのインプットフィールドを削除
document.getElementById("search_address").remove();

// 初期マーカーの作成と追加
const marker = new mapboxgl.Marker({ color: "#F7142B" }) // マーカーの色を希望の色に設定
    .setLngLat([139.6917, 35.6895]) // マーカーの初期座標
    .addTo(map); // 地図に追加

// Geocoderの検索結果をカスタムのインプットフィールドに同期
geocoder.on("result", function (e) {
    const address = e.result.place_name;
    geocoderInput.value = address;
    document.getElementById("address").value = address; // 住所をaddressフォームにセット

    const coordinates = e.result.geometry.coordinates;
    marker
        .setLngLat(coordinates)
        .setPopup(new mapboxgl.Popup({ offset: 25 }).setText(address))
        .addTo(map);
    map.flyTo({ center: coordinates });

    document.getElementById("latitude").value = coordinates[1];
    document.getElementById("longitude").value = coordinates[0];

});

geocoder.on("clear", function () {
    geocoderInput.value = "";
    document.getElementById("address").value = ""; // 住所をクリア
    document.getElementById("latitude").value = "";
    document.getElementById("longitude").value = "";
});

// 地図クリックでマーカーを追加
map.on("click", function (e) {
    const coordinates = [e.lngLat.lng, e.lngLat.lat];
    marker.setLngLat(coordinates).addTo(map);

    // クリックした位置の住所を取得してインプットフォームに表示
    fetch(
        `https://api.mapbox.com/geocoding/v5/mapbox.places/${coordinates[0]},${coordinates[1]}.json?access_token=${accessToken}`
    )
        .then((response) => response.json())
        .then((data) => {
            const address = data.features[0].place_name;
            geocoderInput.value = address;
            document.getElementById("address").value = address; // 住所をaddressフォームにセット
        });

    document.getElementById('latitude').value = e.lngLat.lat;
    document.getElementById("longitude").value = e.lngLat.lng;
});


let step = 1;
const backButton = document.getElementById("back-button");
const nextButton = document.getElementById("next-button");
const submitButton = document.getElementById("submit-button");
const timelineItems = document.querySelectorAll(".timeline-item");

function updateTimeline(step) {
    timelineItems.forEach((item, index) => {
        item.classList.remove("active");
        if (index === step - 1) {
            item.classList.add("active");
        }
    });
}

window.next = function next() {
    if (step < 7) {
        // show next step
        document.getElementById(`step${step + 1}`).classList.remove("d-none");
        // hide previous step
        document.getElementById(`step${step}`).classList.add("d-none");
        // show icon
        document.getElementById(`icon${step + 1}`).classList.add("icon-md-active");
        // hide icon
        document.getElementById(`icon${step + 1}`).classList.remove("icon-md");
        // show icon
        document.getElementById(`icon${step}`).classList.add("icon-md");
        // hide icon
        document.getElementById(`icon${step}`).classList.remove("icon-md-active");

        step += 1;
        updateTimeline(step);

        if (step === 1) backButton.classList.add("d-none");
        else backButton.classList.remove("d-none");
        if (step === 7) {
            nextButton.classList.add("d-none");
            submitButton.classList.remove("d-none");
        }
    }
};

window.back = function back() {
    if (step > 1) {
        // show previous step
        document.getElementById(`step${step - 1}`).classList.remove("d-none");
        // hide next step
        document.getElementById(`step${step}`).classList.add("d-none");
        // show icon
        document
            .getElementById(`icon${step - 1}`).classList.add("icon-md-active");
        // hide icon
        document
            .getElementById(`icon${step - 1}`).classList.remove("icon-md");
        // show icon
        document
            .getElementById(`icon${step}`).classList.add("icon-md");
        // hide icon
        document
            .getElementById(`icon${step}`).classList.remove("icon-md-active");
        
        step -= 1;
        updateTimeline(step);

        if (step === 1) backButton.classList.add("d-none");
        else backButton.classList.remove("d-none");
        if (step < 7) {
            submitButton.classList.add("d-none");
            nextButton.classList.remove("d-none");
        }
    }
};

let sessionToken = null;
$.ajax({
    url: "/event-owners/session-id",
    type: "GET",
    dataType: "json",
    success: function (response) {
        // Handle the response data here
        sessionToken = response;
    },
    error: function (xhr, status, error) {
        // Handle errors
        console.error(error);
    },
});

updateTimeline(step);

window.next = next;
window.back = back;


