let search_inpt = document.querySelector("#srch");
let search_btn = document.querySelector(".search button");
let list = document.querySelector(".list");
let search_bar = document.querySelector(".search input");

search_btn.onclick = () => {
    if (search_inpt.style.opacity == 0) {
        search_inpt.style.opacity = 1;
        search_inpt.style.transition = " 0.3s ease";
        search_inpt.focus();
    } else {
        search_inpt.style.opacity = 0
        search_inpt.style.transition = " 0.3s ease";
        search_inpt.value = "";
        // window.open("./users.php", "self")
    }
}

search_bar.onkeyup = () => {
    if (search_bar.value != "") {
        search_bar.classList.add("active")
        let srch_value = search_bar.value;
        let xhr = new XMLHttpRequest();
        xhr.onload = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let data = xhr.response;
                search_bar.classList.add("active")
                list.innerHTML = data;
            }
        }
        xhr.open("POST", "./php/search.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        xhr.send("value=" + srch_value);
    } else {
        search_bar.classList.remove("active")
    }
}

list.onmouseenter = () => {
    list.classList.add("go")
}
list.onmouseleave = () => {
    list.classList.remove("go")
}


setInterval(() => {
    if (!search_bar.classList.contains("active")  && !list.classList.contains("go")) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = xhr.response;
           list.innerHTML = data;
        }
    }
    xhr.send();
}
}, 1000);
