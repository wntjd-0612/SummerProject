const socket = io();

const inputBox = document.getElementById('input_box');
const sendButton = document.getElementById('send_button');
const messagesList = document.getElementById('messages');

sendButton.addEventListener('click', () => {
const message = inputBox.value;
if (message) {
    socket.emit('chat message', message);
    inputBox.value = '';
    }
});

socket.on('chat message', (msg) => {
    const li = document.createElement('li');
    li.textContent = msg;
    messagesList.appendChild(li);
    // 채팅 창 아래로 스크롤
    messagesList.scrollTop = messagesList.scrollHeight;
});