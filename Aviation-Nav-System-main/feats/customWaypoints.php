<?php
$conn = new mysqli("localhost", "root", "", "aviation_nav");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $routeName = $_POST['routeName'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];

    
    if ($source === $destination) {
        die("Source and destination cannot be the same!");
    }


    $stmt = $conn->prepare("INSERT INTO routes (user_id, name) VALUES (?, ?)");
    $userId = 1;
    $stmt->bind_param("is", $userId, $routeName);
    $stmt->execute();
    $routeId = $stmt->insert_id;

  
    $stmtWaypoint = $conn->prepare("INSERT INTO route_waypoints (route_id, waypoint_id, sequence) VALUES (?, ?, ?)");
    
  
    $sequence = 1;
    $stmtWaypoint->bind_param("iii", $routeId, $source, $sequence);
    $stmtWaypoint->execute();
    
    
    $sequence = 2;
    $stmtWaypoint->bind_param("iii", $routeId, $destination, $sequence);
    $stmtWaypoint->execute();

    echo "Route saved successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Custom Route</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../Assets/plane2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
</head>

<body>
    <main class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Create a Custom Route</h1>
        <form method="POST" action="">
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="source" class="block text-lg font-medium mb-2">Source:</label>
                    <select id="source" name="source" class="w-full p-2 border rounded" required>
                        <option value="">Select Source</option>
                        <?php
                        $result = $conn->query("SELECT id, name, type, latitude, longitude FROM waypoints");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}' data-lat='{$row['latitude']}' data-lng='{$row['longitude']}'>
                                {$row['name']} ({$row['type']})
                            </option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="destination" class="block text-lg font-medium mb-2">Destination:</label>
                    <select id="destination" name="destination" class="w-full p-2 border rounded" required>
                        <option value="">Select Destination</option>
                        <?php
                        $result->data_seek(0);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}' data-lat='{$row['latitude']}' data-lng='{$row['longitude']}'>
                                {$row['name']} ({$row['type']})
                            </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label for="routeName" class="block text-lg font-medium mb-2">Route Name:</label>
            <input type="text" id="routeName" name="routeName" class="w-full p-2 border rounded mb-4" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Route</button>
        </form>
        
        <div class="mb-4">
            <h3 class="text-xl font-semibold">Route Information</h3>
            <p id="distance-info" class="mt-2"></p>
        </div>
        
        <div id="map" style="height: 500px; margin-bottom: 20px;"></div>
    </main>

    <script>
        const map = L.map('map').setView([20.5937, 78.9629], 5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

        const sourceSelect = document.getElementById('source');
        const destSelect = document.getElementById('destination');
        const distanceInfo = document.getElementById('distance-info');
        let routeLine = null;
        let sourceMarker = null;
        let destMarker = null;

        function updateRoute() {
            const sourceOption = sourceSelect.selectedOptions[0];
            const destOption = destSelect.selectedOptions[0];
            
            if (!sourceOption.value || !destOption.value) return;

            const sourceLatLng = [
                parseFloat(sourceOption.getAttribute('data-lat')),
                parseFloat(sourceOption.getAttribute('data-lng'))
            ];
            
            const destLatLng = [
                parseFloat(destOption.getAttribute('data-lat')),
                parseFloat(destOption.getAttribute('data-lng'))
            ];

         
            if (routeLine) map.removeLayer(routeLine);
            if (sourceMarker) map.removeLayer(sourceMarker);
            if (destMarker) map.removeLayer(destMarker);

          
            sourceMarker = L.marker(sourceLatLng, {color: 'green'})
                .addTo(map)
                .bindPopup(`Source: ${sourceOption.textContent}`);
            
            destMarker = L.marker(destLatLng, {color: 'red'})
                .addTo(map)
                .bindPopup(`Destination: ${destOption.textContent}`);

            
            routeLine = L.polyline([sourceLatLng, destLatLng], {color: 'blue'}).addTo(map);
            map.fitBounds(routeLine.getBounds());

         
            const distance = sourceMarker.getLatLng().distanceTo(destMarker.getLatLng());
            distanceInfo.textContent = `Distance: ${(distance/1000).toFixed(2)} km`;
        }

        sourceSelect.addEventListener('change', updateRoute);
        destSelect.addEventListener('change', updateRoute);
    </script>
</body>
</html>
