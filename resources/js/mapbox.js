mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
const map = new mapboxgl.Map({
    container: 'map', // Your map container ID
    style: 'mapbox://styles/mari-ka/clyeemvm700s001r4cviiefes', // Example style
    center: [139.839478, 35.652832], // Center coordinates
    // 経度、緯度
    zoom: 8, // Zoom level
  });
