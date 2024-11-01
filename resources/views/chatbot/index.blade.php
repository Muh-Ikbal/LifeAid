<div id="chatbox">
    <p>Chatbot: Halo! Ada yang bisa saya bantu?</p>
</div>
<input type="text" id="userInput" placeholder="Tulis pesan..." />
<button onclick="sendMessage()">Kirim</button>

<script>
    function sendMessage() {
        let userMessage = document.getElementById('userInput').value;

        // Cek jika input pengguna kosong
        if (!userMessage) {
            alert("Tolong masukkan pesan!");
            return;
        }

        fetch('/chatbot/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Tambahkan token CSRF
            },
            body: JSON.stringify({ message: userMessage })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('chatbox').innerHTML += `<p>Anda: ${userMessage}</p>`;
            document.getElementById('chatbox').innerHTML += `<p>Chatbot: ${data.response}</p>`;
            document.getElementById('userInput').value = '';
        })
        .catch(error => {
            console.error('Ada kesalahan:', error);
            document.getElementById('chatbox').innerHTML += `<p>Chatbot: Maaf, terjadi kesalahan.</p>`;
        });
    }
</script>
