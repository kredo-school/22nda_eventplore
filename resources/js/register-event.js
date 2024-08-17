$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

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
    marker: false,
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

// Geocoderの検索結果をインプットフィールドに同期
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

function validateStep(step) {
    const currentStep = document.getElementById(`step${step}`);
    const inputs = currentStep.querySelectorAll(
        "input[required], select[required], textarea[required]"
    );
    let valid = true;

    inputs.forEach((input) => {
        // Check if the field is empty
        if (!input.value.trim()) {
            valid = false;
            input.classList.add("is-invalid");
            const error = document.createElement("div");
            error.className = "invalid-feedback";
            error.innerText = "This field is required.";
            if (
                !input.nextElementSibling ||
                !input.nextElementSibling.classList.contains("invalid-feedback")
            ) {
                input.parentNode.appendChild(error);
            }
        } else if (input.type === "number" && parseFloat(input.value) < 0) {
            // Check if the number is negative
            valid = false;
            input.classList.add("is-invalid");
            const error = document.createElement("div");
            error.className = "invalid-feedback";
            error.innerText = "Please enter a positive number.";
            if (
                !input.nextElementSibling ||
                !input.nextElementSibling.classList.contains("invalid-feedback")
            ) {
                input.parentNode.appendChild(error);
            }
        } else {
            input.classList.remove("is-invalid");
            if (
                input.nextElementSibling &&
                input.nextElementSibling.classList.contains("invalid-feedback")
            ) {
                input.nextElementSibling.remove();
            }
        }
    });

    // Event Name length validation (max 255 characters)
    const eventNameInput = document.getElementById("event_name");
    if (eventNameInput && eventNameInput.value.length > 255) {
        valid = false;
        eventNameInput.classList.add("is-invalid");
        const error = document.createElement("div");
        error.className = "invalid-feedback";
        error.innerText = "Event Name must be 255 characters or less.";
        if (
            !eventNameInput.nextElementSibling ||
            !eventNameInput.nextElementSibling.classList.contains(
                "invalid-feedback"
            )
        ) {
            eventNameInput.parentNode.appendChild(error);
        }
    }

    // Compare start_date and finish_date
    const startDate = document.getElementById("start_date").value;
    const finishDate = document.getElementById("finish_date").value;
    if (startDate && finishDate) {
        if (new Date(startDate) > new Date(finishDate)) {
            valid = false;
            const finishDateInput = document.getElementById("finish_date");
            finishDateInput.classList.add("is-invalid");
            const error = document.createElement("div");
            error.className = "invalid-feedback";
            error.innerText =
                "Finish date must be the same as or after the start date.";
            if (
                !finishDateInput.nextElementSibling ||
                !finishDateInput.nextElementSibling.classList.contains(
                    "invalid-feedback"
                )
            ) {
                finishDateInput.parentNode.appendChild(error);
            }
        }
    }

    // Compare start_time and finish_time
    const startTimeInput = document.getElementById("start_time");
    const finishTimeInput = document.getElementById("finish_time");

    if (startTimeInput && finishTimeInput) {
        const startTime = startTimeInput.value;
        const finishTime = finishTimeInput.value;

        if (startTime && finishTime) {
            const [startHours, startMinutes] = startTime.split(":");
            const [finishHours, finishMinutes] = finishTime.split(":");

            const startDate = new Date();
            startDate.setHours(startHours, startMinutes, 0, 0);

            const finishDate = new Date();
            finishDate.setHours(finishHours, finishMinutes, 0, 0);

            if (startDate >= finishDate) {
                valid = false;
                finishTimeInput.classList.add("is-invalid");
                let error = finishTimeInput.nextElementSibling;

                if (!error || !error.classList.contains("invalid-feedback")) {
                    error = document.createElement("div");
                    error.className = "invalid-feedback";
                    error.innerText =
                        "Finish time must be after the start time.";
                    finishTimeInput.parentNode.appendChild(error);
                }
            } else {
                finishTimeInput.classList.remove("is-invalid");
                if (
                    finishTimeInput.nextElementSibling &&
                    finishTimeInput.nextElementSibling.classList.contains(
                        "invalid-feedback"
                    )
                ) {
                    finishTimeInput.nextElementSibling.remove();
                }
            }
        }
    }

    // Content length validation (max 255 characters)
    const detailsInput = document.getElementById("details");
    if (detailsInput && detailsInput.value.length > 255) {
        valid = false;
        detailsInput.classList.add("is-invalid");
        const error = document.createElement("div");
        error.className = "invalid-feedback";
        error.innerText = "Content must be 255 characters or less.";
        if (
            !detailsInput.nextElementSibling ||
            !detailsInput.nextElementSibling.classList.contains(
                "invalid-feedback"
            )
        ) {
            detailsInput.parentNode.appendChild(error);
        }
    }

    // History length validation (max 255 characters)
    const historyInput = document.getElementById("history");
    if (historyInput && historyInput.value.length > 255) {
        valid = false;
        historyInput.classList.add("is-invalid");
        const error = document.createElement("div");
        error.className = "invalid-feedback";
        error.innerText = "History must be 255 characters or less.";
        if (
            !historyInput.nextElementSibling ||
            !historyInput.nextElementSibling.classList.contains(
                "invalid-feedback"
            )
        ) {
            historyInput.parentNode.appendChild(error);
        }
    }

    // Max Participants validation (greater than 0)
    const maxParticipantsInput = document.getElementById("max_participants");
    if (maxParticipantsInput && parseInt(maxParticipantsInput.value) <= 0) {
        valid = false;
        maxParticipantsInput.classList.add("is-invalid");
        const error = document.createElement("div");
        error.className = "invalid-feedback";
        error.innerText = "Max Participants must be greater than 0.";
        if (
            !maxParticipantsInput.nextElementSibling ||
            !maxParticipantsInput.nextElementSibling.classList.contains(
                "invalid-feedback"
            )
        ) {
            maxParticipantsInput.parentNode.appendChild(error);
        }
    }

    // Category is not null
    if (step === 3) {
        const checkboxes = document.querySelectorAll(
            'input[name="categories[]"]'
        );
        let checked = false;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                checked = true;
            }
        });

        if (!checked) {
            valid = false;
            alert("Please select at least one category.");
        }
    }
    return valid;
}

window.next = function next() {
    if (validateStep(step)) {
        if (step < 7) {
            // show next step
            document
                .getElementById(`step${step + 1}`)
                .classList.remove("d-none");
            // hide previous step
            document.getElementById(`step${step}`).classList.add("d-none");
            // show icon
            document
                .getElementById(`icon${step + 1}`)
                .classList.add("icon-md-active");
            // hide icon
            document
                .getElementById(`icon${step + 1}`)
                .classList.remove("icon-md");
            // show icon
            document.getElementById(`icon${step}`).classList.add("icon-md");
            // hide icon
            document
                .getElementById(`icon${step}`)
                .classList.remove("icon-md-active");

            step += 1;
            updateTimeline(step);

            if (step === 1) backButton.classList.add("d-none");
            else backButton.classList.remove("d-none");
            if (step === 7) {
                nextButton.classList.add("d-none");
                submitButton.classList.remove("d-none");
            }
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
            .getElementById(`icon${step - 1}`)
            .classList.add("icon-md-active");
        // hide icon
        document.getElementById(`icon${step - 1}`).classList.remove("icon-md");
        // show icon
        document.getElementById(`icon${step}`).classList.add("icon-md");
        // hide icon
        document
            .getElementById(`icon${step}`)
            .classList.remove("icon-md-active");

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

// validate images
function validateImages(event){
    const files = event.files;
    if(files.length > 4){
        alert("Maximum files is 4.");
        event.value = "";
    }
}

// validate categories
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
let checkedCount = 0;

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
        if (checkbox.checked) {
            checkedCount++;
            if (checkedCount > 4) {
                checkbox.checked = false;
                checkedCount--;
                alert("You can only select up to 4 options.");
            }
        } else {
            checkedCount--;
        }
    });
});

window.next = next;
window.back = back;
window.validateImages = validateImages;

