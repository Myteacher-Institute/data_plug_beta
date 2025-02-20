const sendBtnMd = document.getElementById('send-nin')
const sendBtnRt = document.getElementById('send-nin-rt')
const {modification, retrieving} = ["modification on process", "Retrieving on process"];

sendBtnMd.addEventListener('click', () => {
    sendBtnMd.textContent = modification;
});

sendBtnRt.addEventListener('click', () => {
    sendBtnRt.textContent = retrieving;
});