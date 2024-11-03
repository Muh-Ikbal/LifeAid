<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Kesehatan</title>
    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps.css" />
    <style>
        .facility-box {
            border-radius: 8px;
            background-color: #ffffff;
            padding: 10px;
            margin: 10px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar d-flex justify-content-between align-items-center py-4 px-3" id="navbar">
        <div class="d-flex items-center justify-center">
            <a href="{{ route("home.index") }}">
                <div class="tooltip-container">
                    <span class="tooltip">LifeAid</span>
                    <span class="text text-light d-flex justify-content-center"><img src="{{ asset('svg/logo.svg') }}" alt=""> LifeAid</span>
                    <span><img src="{{ asset('svg/chatbot.svg') }}" alt=""></span>
                </div>
            </a>
        </div>
        <div>
            <div class="w-5 h-5 rounded-circle" style="background-image: url('{{ asset('Image/user.jpg') }}'); background-size: cover; background-position:center; width: 40px; height: 40px;"></div>
        </div>
    </nav>

    <div id="map" style="width:100%; height:300px;"></div>
    <div id="facility-list" class="container mt-3 cards"></div>

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps-web.min.js"></script>
    <script>
        let userLocation, map, routeLayer;

        tt.setProductInfo('LifeAid', '1.0');
        map = tt.map({
            key: 'b93A919CBnASwAvmvKj6EgKjUG8BncGp',
            container: 'map',
            center: [106.84513, -6.21462],
            zoom: 10
        });
        map.addControl(new tt.NavigationControl());

        // Mendapatkan lokasi pengguna
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                userLocation = [position.coords.longitude, position.coords.latitude];
                map.setCenter(userLocation);
                fetchNearbyFacilities(userLocation[1], userLocation[0]);
            });
        } else {
            alert("Geolocation tidak didukung oleh browser ini.");
        }

        function fetchNearbyFacilities(lat, lon) {
        fetch(`/nearby-facilities?lat=${lat}&lon=${lon}`)
            .then(response => response.json())
            .then(data => {
                data.results.forEach((facility, index) => {
                    const { lat: latitude, lon: longitude } = facility.position;
                    const { name, address, phone } = facility.poi;

                    const flagIcon = document.createElement('div');
                    flagIcon.style.backgroundImage = "url('/image/icon.png')";
                    flagIcon.style.backgroundSize = 'contain';
                    flagIcon.style.width = '30px';
                    flagIcon.style.height = '30px';

                    const facilityMarker = new tt.Marker({ element: flagIcon })
                        .setLngLat([longitude, latitude])
                        .setPopup(new tt.Popup().setHTML(`<h5>${name}</h5>`))
                        .addTo(map);

                    const facilityDiv = document.createElement('div');
                    facilityDiv.className = 'facility-box card';
                    facilityDiv.innerHTML = `<h5>${name}</h5><p>${address ? address : "Alamat tidak tersedia"}</p><p>${phone || 'No phone available'}</p>`;
                    facilityDiv.onclick = () => drawRouteToFacility([longitude, latitude], facilityMarker);

                    document.getElementById('facility-list').appendChild(facilityDiv);

                    // Tambahkan kelas show dengan sedikit penundaan untuk animasi
                    setTimeout(() => {
                        facilityDiv.classList.add('show');
                    }, index * 100); // Tambahkan delay sesuai urutan box
                });
            })
            .catch(error => console.error('Error:', error));
        }


        function drawRouteToFacility(destination, marker) {
            if (routeLayer) {
                map.removeLayer(routeLayer);
                map.removeSource('route');
            }

            // Definisi GeoJSON untuk garis
            const route = {
                'type': 'Feature',
                'geometry': {
                    'type': 'LineString',
                    'coordinates': [userLocation, destination]
                }
            };

            // Menambahkan layer GeoJSON untuk menggambar garis
            map.addSource('route', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [route]
                }
            });

            map.addLayer({
                'id': 'routeLayer',
                'type': 'line',
                'source': 'route',
                'layout': { 'line-join': 'round', 'line-cap': 'round' },
                'paint': { 'line-color': '#FF0000', 'line-width': 3 }
            });

            routeLayer = 'routeLayer';
            map.flyTo({ center: destination, zoom: 14 });
            marker.togglePopup(); // Menampilkan popup saat diklik
        }
    </script>
</body>
</html>
