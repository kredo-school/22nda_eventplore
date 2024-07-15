const accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
mapboxgl.accessToken = accessToken;
const map = new mapboxgl.Map({
    container: "map", // Your map container ID
    style: "mapbox://styles/mari-ka/clyeemvm700s001r4cviiefes", // Example style
    center: [139.839478, 35.652832], // Center coordinates
    // 経度、緯度
    zoom: 8, // Zoom level
});

let step = 1;
const backButton = document.getElementById("back-button");
const nextButton = document.getElementById("next-button");
const submitButton = document.getElementById("submit-button");
const searchBox = document.getElementById("address");
const searchContainer = document.getElementById("search-container");
const timelineItems = document.querySelectorAll('.timeline-item');

function updateTimeline(step){
    timelineItems.forEach((item, index) =>{
        item.classList.remove('active', 'inactive');
        if(index === step - 1){
            item.classList.add('active');
        }else{
            item.classList.add('inactive');
        }
    })
}

window.next = function next() {
    if(step < 6){
        // show next step
        document.getElementById(`step${step + 1}`).classList.remove("d-none");
        // hide previous step
        document.getElementById(`step${step}`).classList.add("d-none");
    
        step += 1;
        if (step == 1) backButton.classList.add("d-none");
        else backButton.classList.remove("d-none");
        if (step == 6) {
            nextButton.classList.add("d-none");
            submitButton.classList.remove("d-none");
        }
    }
}

window.back = function back() {
    if(step > 1){
        // show previous step
        document.getElementById(`step${step - 1}`).classList.remove("d-none");
        // hide next step
        document.getElementById(`step${step}`).classList.add("d-none");
    
        step -= 1;
        if (step == 1) backButton.classList.add("d-none");
        else backButton.classList.remove("d-none");
        if (step < 6) {
            submitButton.classList.add("d-none");
            nextButton.classList.remove("d-none");
        }
    }
}

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

// search map in step3
async function searchHandler(){
    const input = searchBox.value;
    const query = `https://api.mapbox.com/search/searchbox/v1/suggest?q=${input}+&language=en&session_token=${sessionToken}&access_token=${accessToken}`;
    const response = await fetch(query);
    const data = await response.json();
    console.log(data);
    while (searchContainer.firstChild) {
        searchContainer.removeChild(searchContainer.lastChild);
        }
    for(const suggestion of data.suggestions){
        const list = document.createElement("li");
        const icon = document.createElement("i");
        const place = document.createElement("p");
        list.classList.add("d-flex", "align-items-center");
        icon.classList.add("fa-solid", "fa-location-dot", "me-2");
        place.innerHTML = suggestion.name;
        list.appendChild(icon);
        list.appendChild(place);
        searchContainer.appendChild(list);
    }
}

updateTimeline(step);

window.next = next;
window.back = back;
window.searchHandler = searchHandler;
