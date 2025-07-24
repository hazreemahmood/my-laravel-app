<!DOCTYPE html>
<html>
<head>
    <title>Laravel Chat with Files</title>
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
</head>
<body>

<div id="chat-box" style="border:1px solid #ccc; height:300px; overflow-y:scroll; padding:10px;"></div>
<br>
<input type="text" id="username" placeholder="Your name">
<input type="text" id="message" placeholder="Type a message">
<button id="send-btn">Send</button>

<br><br>
<input type="file" id="file-input">

<script>
    const baseUrl = window.location.origin;

    const socket = io(baseUrl + ':3000');
    const chatBox = document.getElementById('chat-box');

    // Send text message
    document.getElementById('send-btn').onclick = function () {
        const user = document.getElementById('username').value;
        const message = document.getElementById('message').value;
        if (message.trim()) {
            socket.emit('sendMessage', { user, message });
            document.getElementById('message').value = '';
        }
    };

    // File upload
    document.getElementById('file-input').onchange = function () {
        const file = this.files[0];
        const formData = new FormData();
        formData.append('file', file);

        fetch('/upload', {
            method: 'POST',
            body: formData
        }).then(res => res.json()).then(data => {
            socket.emit('sendMessage', {
                user: document.getElementById('username').value,
                message: `📎 Uploaded: ${file.name}`,
                fileUrl: data.fileUrl,
                fileType: data.fileType
            });
        });
    };

    // Display message
    socket.on('newMessage', function (data) {
        let html = `<div><strong>${data.user}:</strong> ${data.message}</div>`;

        if (data.fileType?.startsWith('image/')) {
            html += `<img src="${data.fileUrl}" style="max-width:200px;">`;
        } else if (data.fileType === 'application/pdf') {
            html += `<div><a href="${data.fileUrl}" target="_blank">📄 View PDF</a></div>`;
        } else if (data.fileUrl) {
            html += `<div><a href="${data.fileUrl}" download>📎 Download file</a></div>`;
        }

        chatBox.innerHTML += html;
        chatBox.scrollTop = chatBox.scrollHeight;
    });
</script>

</body>
</html>
