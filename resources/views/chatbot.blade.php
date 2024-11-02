<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Kesehatan</title>
    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h2>Chatbot Kesehatan</h2>
        </div>
        <div class="chat-box" id="chat-box">
            <!-- Pesan dari user dan bot akan muncul di sini -->
        </div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Tulis lokasi atau kata kunci..." autocomplete="off">
            <button onclick="sendMessage()">Kirim</button>
        </div>
    </div>

    <script>
        function sendMessage() {
            const userInput = document.getElementById('user-input').value;
            if (userInput === "") return;

            addMessage(userInput, 'user-message');
            document.getElementById('user-input').value = "";

            $.ajax({
                url: '/search-facilities',
                type: 'GET',
                data: { query: userInput },
                success: function(response) {
                    if (response.status === 'success') {
                        const facilities = response.data;
                        let message = "Fasilitas kesehatan terdekat:\n";
                        facilities.forEach((facility, index) => {
                            message += `${index + 1}. ${facility.display_name}\n`;
                        });
                        addMessage(message, 'bot-message');
                    } else {
                        addMessage("Tidak ditemukan fasilitas kesehatan.", 'bot-message');
                    }
                },
                error: function() {
                    addMessage("Maaf, ada masalah dengan server.", 'bot-message');
                }
            });
        }

        function addMessage(message, className) {
            const chatBox = document.getElementById('chat-box');
            const messageElem = document.createElement('div');
            messageElem.className = className;
            messageElem.textContent = message;
            chatBox.appendChild(messageElem);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>
