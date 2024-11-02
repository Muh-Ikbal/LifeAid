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
    <nav class="navbar d-flex justify-content-between align-items-center py-4 px-3" style="background-color: #D61B23">
        <div class="d-flex items-center justify-center">
            <img src="{{ asset('svg/logo.svg') }}" alt="">
            <span class="navbar-brand mb-0 h1 text-white">LifeAid</span>
        </div>
        <div>
            <div class="w-5 h-5 rounded-circle" style="background-image: url('{{ asset('Image/user.jpg') }}'); background-size: cover; background-position:center; width: 40px; height: 40px;"></div>
        </div>
    </nav>
    <nav class="navbar d-flex justify-content-between align-items-center py-4 px-3 shadow">
        <div class="d-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
              </svg>
            <span class="navbar-brand mb-0 h1 mx-3 fw-bold">AidBot</span>
        </div>
        <div class="row text-end" style="margin-right: 0.15rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
              </svg>
        </div>
    </nav>

    <div class="chat-container">
        {{-- <div class="chat-header">
            <h2>Chatbot Kesehatan</h2>
        </div> --}}
        <div class="chat-box" id="chat-box">
            <div class="bot-message">Halo, aku AidBot! 👋 Saya adalah asisten pertolongan pertama Anda. Apa yang bisa saya bantu hari ini?</div>
            <!-- Pesan dari user dan bot akan muncul di sini -->
        </div>
        <div class="chat-input">
            <input class="rounded-pill" type="text" id="user-input" placeholder="Type a message..." autocomplete="off">
            <button class="rounded-circle" onclick="sendMessage()"><img src="{{ asset('image/btn_icon.png') }}" alt=""></button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function sendMessage() {
            const userInput = document.getElementById('user-input').value;
            if (userInput === "") return;

            addMessage(userInput, 'user-message');
            document.getElementById('user-input').value = "";

            // Meminta lokasi pengguna
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        // Kirim permintaan AJAX dengan koordinat pengguna
                        $.ajax({
                            url: '/search-facilities',
                            type: 'GET',
                            data: { query: userInput, latitude: latitude, longitude: longitude },
                            success: function(response) {
                                if (response.status === 'success') {
                                    const locationLink = response.link;
                                    addMessage(`Fasilitas kesehatan terdekat: <a href="${locationLink}" target="_blank">Klik di sini untuk melihat lokasi</a>`, 'bot-message');
                                } else {
                                    addMessage("Tidak ditemukan fasilitas kesehatan.", 'bot-message');
                                }
                            },
                            error: function() {
                                addMessage("Maaf, ada masalah dengan server.", 'bot-message');
                            }
                        });
                    },
                    function() {
                        addMessage("Tidak dapat mengakses lokasi. Pastikan izin lokasi telah diberikan.", 'bot-message row');
                    }
                );
            } else {
                addMessage("Geolocation tidak didukung oleh browser Anda.", 'bot-message');
            }
        }


        function addMessage(message, className) {
            const chatBox = document.getElementById('chat-box');
            const messageElem = document.createElement('div');
            messageElem.className = className;
            messageElem.innerHTML = message; // Gunakan innerHTML untuk mendukung elemen HTML seperti <a>
            chatBox.appendChild(messageElem);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>
