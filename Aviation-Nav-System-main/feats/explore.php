<!DOCTYPE html>
<html lang="en">

<head>
    <title>Explore Map</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.css"></script>
    <link rel="shortcut icon" href="../Assets/plane2.png" type="image/x-icon">
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
</head>

<body>
    <main class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Explore Aviation Features</h1>

        <div class="bg-gray-100 p-4 rounded-lg mb-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div>
                    <input type="text" id="exploreSearch"
                        class="w-full p-2 border rounded"
                        placeholder="Search waypoints...">
                </div>

                <div>
                    <select id="typeFilter" class="w-full p-2 border rounded">
                        <option value="all">All Types</option>
                        <option value="airport">Airports</option>
                        <option value="vor">VOR</option>
                        <option value="ndb">NDB</option>
                        <option value="fix">Fixes</option>
                    </select>
                </div>

                <div>
                    <select id="rangeFilter" class="w-full p-2 border rounded">
                        <option value="0">Show All</option>
                        <option value="100">Within 100km</option>
                        <option value="200">Within 200km</option>
                        <option value="500">Within 500km</option>
                    </select>
                </div>
            </div>
        </div>


        <div id="map" style="height: 600px;"></div>
    </main>


    <script>
        const map = L.map('map').setView([20.5937, 78.9629], 5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        const markerCluster = L.markerClusterGroup({
            spiderfyOnMaxZoom: true,
            showCoverageOnHover: false,
            zoomToBoundsOnClick: true
        });

        const waypoints = [{
                name: "Indira Gandhi International Airport",
                type: "airport",
                lat: 28.5562,
                lng: 77.1000
            },
            {
                name: "Chhatrapati Shivaji Maharaj International Airport",
                type: "airport",
                lat: 19.0896,
                lng: 72.8656
            },
            {
                name: "VOR - DEL",
                type: "vor",
                lat: 28.5665,
                lng: 77.1030
            },
            {
                name: "NDB - BOM",
                type: "ndb",
                lat: 19.0887,
                lng: 72.8679
            },
            {
                name: "FIX - XYZ",
                type: "fix",
                lat: 25.5941,
                lng: 85.1376
            },
            {
                name: "Kempegowda International Airport",
                type: "airport",
                lat: 13.1986,
                lng: 77.7066
            }
        ];

        const markers = [];

        waypoints.forEach(waypoint => {
            const marker = L.marker([waypoint.lat, waypoint.lng], {
                type: waypoint.type,
                name: waypoint.name
            }).bindPopup(`
                <div class='p-2'>
                    <h4 class='font-bold'>${waypoint.name}</h4>
                    <p>Type: ${waypoint.type}</p>
                    <p>Coordinates: ${waypoint.lat}, ${waypoint.lng}</p>
                </div>
            `);
            markers.push(marker);
        });

        markerCluster.addLayers(markers);
        map.addLayer(markerCluster);

        const exploreSearch = document.getElementById('exploreSearch');
        const typeFilter = document.getElementById('typeFilter');
        const rangeFilter = document.getElementById('rangeFilter');

        function filterMarkers() {
            const searchTerm = exploreSearch.value.toLowerCase();
            const selectedType = typeFilter.value;
            const selectedRange = parseInt(rangeFilter.value);

            markerCluster.clearLayers();

            markers.forEach(marker => {
                const matchesSearch = marker.options.name.toLowerCase().includes(searchTerm);
                const matchesType = selectedType === 'all' || marker.options.type === selectedType;
                const inRange =
                    selectedRange === 0 ||
                    map.distance(map.getCenter(), marker.getLatLng()) <= selectedRange * 1000;

                if (matchesSearch && matchesType && inRange) {
                    markerCluster.addLayer(marker);
                }
            });
        }

        exploreSearch.addEventListener('input', filterMarkers);
        typeFilter.addEventListener('change', filterMarkers);
        rangeFilter.addEventListener('change', filterMarkers);

        const overlayMaps = {
            "Airports": L.layerGroup(markers.filter(m => m.options.type === 'airport')),
            "Navigation Aids": L.layerGroup(markers.filter(m => ['vor', 'ndb'].includes(m.options.type)))
        };

        L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);
    </script>

</body>

</html>