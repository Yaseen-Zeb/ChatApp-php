let search_bar = document.querySelector("#msg");
let send_btn = document.querySelector("#img");
let form = document.querySelector("form");
let chat_box = document.querySelector(".chat_box");

form.onsubmit = (e) => {
    e.preventDefault();
}
chat_box.onmouseenter = () => {
    chat_box.classList.add("active")
}
chat_box.onmouseleave = () => {
    chat_box.classList.remove("active")     
}

send_btn.onclick = () => {
    if (form.querySelector("#msg").value != "") {
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "php/chat.php", true)
        xhr.onload = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                scroll_bottom();
            }
        }
        let formdata = new FormData(form)
        xhr.send(formdata)
        form.reset();
    }
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/get_chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = xhr.response;
            if (!chat_box.classList.contains("active")) {
                chat_box.innerHTML = data;
                scroll_bottom()
            }
        }
    }
    let formdata = new FormData(form)
    xhr.send(formdata)
}, 1000);


function scroll_bottom() {
    chat_box.scrollTop = chat_box.scrollHeight + 200;
}



