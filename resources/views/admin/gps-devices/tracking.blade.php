<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Map Tracking</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Make the map fill the entire screen */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
<script>
    // MQTT connection setup
    const clientId = `{{ env('MQTT_CLIENT_ID') }}`;
    const host = `wss://{{ env('MQTT_HOST') }}:{{ env('MQTT_PORT') }}/mqtt`;
    const options = {
        clientId: clientId,
        username: `{{ env('MQTT_AUTH_USERNAME') }}`,
        password: `{{ env('MQTT_AUTH_PASSWORD') }}`,
        keepalive: 60,
        protocolId: 'MQTT',
        protocolVersion: 4,
        clean: true,
        reconnectPeriod: 1000,
        connectTimeout: 30 * 1000,
        will: {
            topic: 'Default',
            payload: 'Connection Closed abnormally..!',
            qos: 0,
            retain: false
        },
    };

    console.log('Connecting to MQTT broker');
    const client = mqtt.connect(host, options);

    // Initialize the map, centered at the equator
    var map = L.map('map').setView([20.8287017, 75.6197323], 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 25,
    }).addTo(map);

    // Add a marker with initial coordinates
    var marker = L.marker([20.8287017, 75.6197323]).addTo(map);

    // Subscribe to the required MQTT topics
    client.on('connect', () => {
        console.log('Connected to MQTT broker');
        client.subscribe('latlong');
        client.subscribe('lat');
        client.subscribe('long');
    });

    // Variables to hold the current coordinates
    let currentLat = 20.8287017;
    let currentLong = 75.6197323;

    // Handle incoming MQTT messages and update the map accordingly
    client.on('message', (topic, message) => {
        console.log('Received message:', topic, message.toString());

        if (topic === '{{$device->qrcode}}/latlong') {
            const [lat, long] = message.toString().split(',').map(parseFloat);
            if (!isNaN(lat) && !isNaN(long)) {
                currentLat = lat;
                currentLong = long;
                updateMap(currentLat, currentLong);
            }
        } else if (topic === '{{$device->qrcode}}/lat') {
            currentLat = parseFloat(message.toString());
        } else if (topic === '{{$device->qrcode}}/long') {
            currentLong = parseFloat(message.toString());
        }

        // Update map if both lat and long are received
        if (!isNaN(currentLat) && !isNaN(currentLong)) {
            updateMap(currentLat, currentLong);
        }
    });

    // Function to update the marker and center the map
    function updateMap(lat, long) {
        marker.setLatLng([lat, long]);
        map.setView([lat, long], 13);
    }
</script>

</body>
</html>
