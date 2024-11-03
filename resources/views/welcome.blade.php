<x-header.head title="Life Aid">
<main>
    <x-header.navbar />
    <link rel="stylesheet" type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps.css" />
    <div class="my-3 container">
        {{-- kamus dan Belajar --}}
        <div class="row  justify-content-center">
            <div class="col-6 ">
                <a href="/kamus" class="  btn py-4 d-block  fs-3 text-decoration-none text-center fw-bold text-white "
                    style="background-color: #D61B23;width:100%;">KAMUS</a>
            </div>
            <div class="col-6">
                <a href="/course" class=" btn py-4 d-block w-full fs-3 text-decoration-none fw-bold text-white "
                    style="background-color: #D61B23;width:100%;">BELAJAR</a>
            </div>
        </div>
        {{-- fitur injuries --}}
        <div>
            <div class="row my-3 justify-content-center">
                <div class="col-6">
                    <a href="/" class="text-decoration-none">
                        <x-u-i.dictionary-card title="CPR" path="{{ asset('svg/cpr.svg') }}" color="#D61B23" />
                    </a>
                </div>
                <div class="col-6">
                    <a href="/" class="text-decoration-none">
                        <x-u-i.dictionary-card title="Luka Bakar" path="{{ asset('svg/lukabakar.svg') }}" color="#D61B23" />
                    </a>
                </div>
            </div>
        </div>

        {{-- chatbot --}}
        <div class="row justify-content-center ">
            <div class="col-12">
                <a href="{{ route('chatbot.index') }}" class="text-decoration-none d-block py-3 px-2 text-white"
                    style="border-radius: 6px; background-color:#D61B23;width:100%;">
                    <div class="d-flex align-items-center gap-2">
                        <div>
                            <img src="{{ asset('svg/chatbot.svg') }}" alt="">
                        </div>
                        <div>
                            <h2>Cedera</h2>
                            <h5 class="fw-semibold" style="font-size: 16px;">Akses Panduan First Aid Instan</h3>
                        </div>
                    </div>

                </a>
            </div>
        </div>

        <div class="my-2">
            {{-- <span class="h1 float-start">Faskes Disekitarmu</span> --}}
            <button id="faskes" class="clearfix w-100"><span class="float-start">Faskes Disekitarmu</span> <span class="float-end"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
              </svg></span>
            </button>
        </div>

        {{-- maps --}}
        <div>
            <div id="map" style="width:100%; height:300px;"></div>
        </div>

    </div>
</main>
{{-- Script --}}
<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.25.0/maps/maps-web.min.js"></script>
<script>
    tt.setProductInfo('LifeAid', '1.0'); // Ganti dengan nama dan versi aplikasi Anda
    var map = tt.map({
        key: 'b93A919CBnASwAvmvKj6EgKjUG8BncGp',  // Ganti dengan API Key Anda
        container: 'map',
        center: [106.84513, -6.21462], // Atur koordinat sesuai kebutuhan
        zoom: 10
    });

    // Menambahkan kontrol zoom dan navigasi
    map.addControl(new tt.NavigationControl());

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
    }

    function showPosition(position) {
        const userLatitude = position.coords.latitude;
        const userLongitude = position.coords.longitude;
        fetchNearbyFacilities(userLatitude, userLongitude);

        map.setCenter([userLongitude, userLatitude]);
    }

    function fetchNearbyFacilities(lat, lon) {
        fetch(`/nearby-facilities?lat=${lat}&lon=${lon}`)
            .then(response => response.json())
            .then(data => {
                data.results.forEach(facility => {
                    const latitude = facility.position.lat;
                    const longitude = facility.position.lon;
                    const name = facility.poi.name;

                    const flagIcon = document.createElement('div');
                    flagIcon.style.backgroundImage = "url('/image/icon.png')"; // Ganti dengan path gambar bendera Anda
                    flagIcon.style.backgroundSize = 'contain';
                    flagIcon.style.width = '30px'; // Sesuaikan ukuran ikon
                    flagIcon.style.height = '30px';

                    new tt.Marker({ color: 'red', element: flagIcon })
                        .setLngLat([longitude, latitude])
                        .setPopup(new tt.Popup().setHTML(`<h5>${name}</h5>`)) // Menampilkan nama rumah sakit di popup
                        .addTo(map);
                });
            })
            .catch(error => console.error('Error:', error));
    }
</script>
</x-header.head>
