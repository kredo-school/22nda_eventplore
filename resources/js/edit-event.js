$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
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

// イベントデータを取得
const event = window.eventData;

// 新しいマーカーを作成
const marker = new mapboxgl.Marker({ color: "#F7142B" })
    .setLngLat([event.longitude, event.latitude])
    .addTo(map);

map.flyTo({
    center: [event.longitude, event.latitude],
    // 経度、緯度
    zoom: 13, // Zoom level
    essential: true, // this animation is considered essential with respect to prefers-reduced-motion
});

// Geocoderの検索結果をインプットフィールドに同期
geocoder.on("result", function (e) {
    const address = e.result.place_name;
    geocoderInput.value = address;
    document.getElementById("address").value = address; // 住所をaddressフォームにセット
    // console.log(123);
    const coordinates = e.result.geometry.coordinates;
    marker.setLngLat([coordinates[0], coordinates[1]]);
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
    marker.setLngLat([e.lngLat.lng, e.lngLat.lat]); // マーカーの初期座標
    const coordinates = [e.lngLat.lng, e.lngLat.lat];
    marker.setLngLat(coordinates).addTo(map);
    console.log(e);
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

    document.getElementById("latitude").value = e.lngLat.lat;
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

document.addEventListener("DOMContentLoaded", function () {
    // すべての新しい画像インプットフィールドにイベントリスナーを追加
    document
        .querySelectorAll('.new-image-input-container input[type="file"]')
        .forEach((input, index) => {
            input.addEventListener("change", function () {
                const previewElement = this.parentElement.querySelector("img");
                previewImage(this, previewElement);
            });
        });
    // 削除
    document.querySelectorAll(".delete-image").forEach((button, index) => {
        button.addEventListener("click", function () {
            if (confirm("Are you sure you want to delete this image?")) {
                let imageId = this.getAttribute("data-image-id");
                const imageElement = document.getElementById(imageId);
                $.ajax({
                    url: `/event-owners/images/${imageId}`,
                    type: "DELETE",
                    success: function (response) {
                        // Handle the response data here
                        // UIから画像要素を削除
                        imageElement.remove();
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        console.error(error);
                        alert("Failed to delete the image.");
                    },
                });
            }
        });
    });
});

function updateImageFields(index) {
    const maxImages = 5;
    const currentImageCount =
        document.querySelectorAll(".other-images .other-image-old").length + 1;
    const otherImagesContainer = document.querySelector(".other-images");

    // 追加されている新しい画像入力フィールドをすべて削除
    document
        .querySelectorAll(".new-image-input-container")
        .forEach((el) => el.remove());

    // 追加可能なフィールド数を計算（5枚になるまで）
    const fieldsToAdd = Math.max(0, maxImages - currentImageCount - 1); // 現在の画像数を超えないように修正

    // 新しい入力フィールドを追加

    const selectedInput =
        otherImagesContainer.children[currentImageCount - 1].children[1];

    // Append new image
    const imageContainer = document.createElement("div");
    const image = document.createElement("img");
    const label = document.createElement("label");
    const cameraIcon = document.createElement("i");
    const input = document.createElement("input");
    const button = document.createElement("button");
    const deleteIcon = document.createElement("i");

    // Set element attributes
    imageContainer.classList.add("p-1", "other-image-old");
    imageContainer.style.position = "relative";
    image.classList.add("img-fluid", `other-image-preview-${index}`);
    image.style.objectFit = "cover";
    image.style.aspectRatio = "1";
    image.alt = "#";
    image.src = URL.createObjectURL(selectedInput.files[0]);
    label.setAttribute("for", `file-input-${index}`);
    label.classList.add("edit-image");
    cameraIcon.classList.add("fa-solid", "fa-camera-retro");
    input.setAttribute("type", "file");
    input.name = "image[]";
    input.id = `file-input-${index}`;
    input.classList.add("form-control", "d-none");
    input.onchange = `previewImage(this, other-image-preview-${index})`;
    // button.setAttribute("data-image-id", `${index}`);
    button.classList.add("delete-image");
    button.type = "button";
    deleteIcon.classList.add("fa-solid", "fa-times");

    // Hide current input
    selectedInput.classList.add("d-none");

    // Label
    label.appendChild(cameraIcon);

    // Button
    button.appendChild(deleteIcon);

    // Append all child to container
    imageContainer.append(image, label, input, button, selectedInput);

    // Replace selected container
    otherImagesContainer.replaceChild(imageContainer, otherImagesContainer.children[currentImageCount - 1]);
}

function previewImage(input, imageClass) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector("." + imageClass).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

window.updateImageFields = updateImageFields;
window.previewImage = previewImage;
window.next = next;
window.back = back;
