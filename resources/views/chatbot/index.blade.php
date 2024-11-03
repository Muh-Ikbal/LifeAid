<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Kesehatan</title>
    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <div class="chat-container">
        <div class="chat-box" id="chat-box">
            <div class="bot-message d-block">Halo, aku AidBot! 👋 Saya adalah asisten pertolongan pertama Anda. Apa yang bisa saya bantu hari ini?</div>
            <div class="bot-message d-block">
                <ul>
                    <li>Fasilitas Kesehatan Terdekat:
                        <ol>
                            <li><a href="javascript:void(0);" onclick="getUserLocationAndFindHealthFacilities('hospital')">Rumah Sakit</a></li>
                            <li><a href="javascript:void(0);" onclick="getUserLocationAndFindHealthFacilities('doctor')">Spesialis</a></li>
                            <li><a href="javascript:void(0);" onclick="getUserLocationAndFindHealthFacilities('pharmacy')">Apotek</a></li>
                        </ol>
                    </li>
                    <li><a href="/course">Informasi Pertolongan Pertama</a></li>
                </ul>
            </div>
        </div>
        {{-- <div class="chat-input">
            <input class="rounded-pill" type="text" id="user-input" placeholder="Type a message..." autocomplete="off">
            <button class="rounded-circle" onclick="sendMessage()"><img src="{{ asset('image/btn_icon.png') }}" alt=""></button>
        </div> --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
    function getUserLocationAndFindHealthFacilities(type) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    findHealthFacilitiesNearbyTomTom(latitude, longitude, type);
                },
                function(error) {
                    if (error.code === error.PERMISSION_DENIED) {
                        alert("Izinkan lokasi di pengaturan browser Anda agar saya bisa membantu Anda menemukan fasilitas kesehatan terdekat.");
                    } else {
                        console.error("Error mendapatkan lokasi:", error.message);
                        alert("Tidak dapat mengakses lokasi. Pastikan izin lokasi telah diberikan.");
                    }
                }
            );
        } else {
            alert("Geolocation tidak didukung oleh browser Anda.");
        }
    }

    function findHealthFacilitiesNearbyTomTom(latitude, longitude, type) {
        const chatBox = document.getElementById('chat-box');
        let userSelect;
        const apiKey = "b93A919CBnASwAvmvKj6EgKjUG8BncGp"; // Ganti dengan API Key Anda
        const radius = 5000; // Radius dalam meter
        const url = `https://api.tomtom.com/search/2/search/${type}.json?key=${apiKey}&lat=${latitude}&lon=${longitude}&radius=${radius}&limit=3`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.results && data.results.length > 0) {
                    const messages = data.results.map(facility => {
                        const name = facility.poi.name;
                        const address = facility.address.freeformAddress;
                        const phone = facility.poi.phone || "Nomor telepon tidak tersedia";
                        return `<strong>${name}</strong><br>Alamat: ${address}<br>Telepon: ${phone}`;
                    });

                    displayMessagesSequentially(messages);
                } else {
                    alert("Tidak ditemukan fasilitas kesehatan di dekat lokasi Anda.");
                }
            })
            .catch(error => {
                console.error("Error mengambil data fasilitas kesehatan:", error);
                alert("Maaf, terjadi masalah saat mencari fasilitas kesehatan.");
            });

        switch (type) {
            case 'hospital':
                userSelect = `<div class="user-message"><strong>Rumah Sakit Terdekat</strong></div>`;
                break;
            case 'doctor':
                userSelect = `<div class="user-message"><strong>Dokter Spesialis Terdekat</strong></div>`;
                break;
            case 'pharmacy':
                userSelect = `<div class="user-message"><strong>Apotek Terdekat</strong></div>`;
                break;
            default:
                break;
        }
        chatBox.innerHTML += userSelect;
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function displayMessagesSequentially(messages) {
        const chatBox = document.getElementById('chat-box');
        let delay = 0;

        messages.forEach((message, index) => {
            setTimeout(() => {
                const botMessage = document.createElement("div");
                botMessage.classList.add("bot-message");
                botMessage.innerHTML = message;
                chatBox.appendChild(botMessage);
                chatBox.scrollTop = chatBox.scrollHeight;
            }, delay);
            delay += 1000; // Menunda setiap pesan dengan 1,5 detik (1500 ms)
        });
    }
    </script>
</body>
</html>
