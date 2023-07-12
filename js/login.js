let form = document.querySelector("form");
let login_btn = document.querySelector(".button input[type = 'submit']");


form.onsubmit = (e) => {
    e.preventDefault();
}
login_btn.onclick = () => {
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "./php/login.php", true)
    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = xhr.response;
            console.log(data);
            if (data == "success") {
               window.open("./users.php","self");
               form.reset();
            }else{
                let error_text = document.querySelector(".error_text");
                let pera = document.querySelector(".error_text p");
                pera.textContent = data;
                error_text.style.display = "block"
                setTimeout(() => {
                    error_text.style.display = "none"
                }, 5000);
            }
        }
    }
    let formdata = new FormData(form)
    xhr.send(formdata)
}