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
    language: 'en'
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

    // Validate that app_deadline is before finish_date and finish_time
    const appDeadlineInput = document.getElementById("app_deadline");
    const finishDateInput = document.getElementById("finish_date");
    if (appDeadlineInput && finishDateInput && finishTimeInput) {
        const appDeadline = new Date(appDeadlineInput.value);
        const finishDateTime = new Date(
            finishDateInput.value + "T" + finishTimeInput.value
        );

        if (appDeadline > finishDateTime) {
            valid = false;
            appDeadlineInput.classList.add("is-invalid");
            let error = appDeadlineInput.nextElementSibling;

            if (!error || !error.classList.contains("invalid-feedback")) {
                error = document.createElement("div");
                error.className = "invalid-feedback";
                error.innerText =
                    "The reservation deadline cannot be later than the finish date and time.";
                appDeadlineInput.parentNode.appendChild(error);
            }
        } else {
            appDeadlineInput.classList.remove("is-invalid");
            if (
                appDeadlineInput.nextElementSibling &&
                appDeadlineInput.nextElementSibling.classList.contains(
                    "invalid-feedback"
                )
            ) {
                appDeadlineInput.nextElementSibling.remove();
            }
        }
    }

    // Content length validation (max 1000 characters)
    const detailsInput = document.getElementById("details");
    if (detailsInput && detailsInput.value.length > 1000) {
        valid = false;
        detailsInput.classList.add("is-invalid");
        const error = document.createElement("div");
        error.className = "invalid-feedback";
        error.innerText = "Content must be 1000 characters or less.";
        if (
            !detailsInput.nextElementSibling ||
            !detailsInput.nextElementSibling.classList.contains(
                "invalid-feedback"
            )
        ) {
            detailsInput.parentNode.appendChild(error);
        }
    }

    // History length validation (max 1000 characters)
    const historyInput = document.getElementById("history");
    if (historyInput && historyInput.value.length > 1000) {
        valid = false;
        historyInput.classList.add("is-invalid");
        const error = document.createElement("div");
        error.className = "invalid-feedback";
        error.innerText = "History must be 1000 characters or less.";
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

    // Image types validation
    const imageInputs = document.querySelectorAll(
        'input[type="file"][name="image[]"]'
    );
    let imageValid = true;

    // Validate each image input
    imageInputs.forEach((input) => {
        if (!validateImages(input)) {
            imageValid = false;
        }
    });

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

// validate images
function validateImages(event){
    const files = event.files;
    const allowedFormats = [
        "image/jpeg",
        "image/jpg",
        "image/png",
        "image/gif",
    ];
    const maxSize = 2 * 1024 * 1024; // 2MB
    let valid = true;
    let errorMessage = "";

    if (files.length > 4) {
        errorMessage = "You can upload a maximum of 4 files.";
        valid = false;
    } else {
        for (let i = 0; i < files.length; i++) {
            if (!allowedFormats.includes(files[i].type)) {
                errorMessage =
                    "Invalid file format. Only jpeg, jpg, png, and gif are allowed.";
                valid = false;
                break;
            }
            if (files[i].size > maxSize) {
                errorMessage =
                    "File size is too large. Maximum allowed size is 2MB.";
                valid = false;
                break;
            }
        }
    }

    if (!valid) {
        alert(errorMessage);
        input.value = ""; // Clear the input
    }

    return valid;
}

// validate categories
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
function getCount(){
    let checked = 0;
    for (const checkbox of checkboxes) {
        if (checkbox.checked) {
            checked++;
        }
    }
    return checked;
}
let checkedCount = getCount();

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

window.updateImageFields = updateImageFields;
window.previewImage = previewImage;
window.next = next;
window.back = back;
