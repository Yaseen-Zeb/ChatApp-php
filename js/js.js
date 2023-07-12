let pass_input = document.querySelector(".password input[type='password']")
let togg_btn = document.querySelector(".password button")

togg_btn.onclick = () =>{
    if (pass_input.type == 'password') {
        pass_input.type = 'taxt'
    }else{
        pass_input.type = 'password'
    }
}






