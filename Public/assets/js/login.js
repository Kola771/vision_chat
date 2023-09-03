
document.addEventListener("DOMContentLoaded", function () {
    let paragraph = document.getElementById("paragraph");
    let validate = document.querySelector(".validate");
    validate.addEventListener("click", (e) => {
        e.preventDefault();

        let username = document.getElementById("username");
        let password = document.getElementById("password");
        if(username.value.trim() !== '' && password.value.trim() !== '')
        {

            let data = {
                nameOrEmail: username.value,
                pass: password.value
            }
            data = JSON.stringify(data);
            let options = {
                header: {
                    "content": "application/json"
                },
                body: data,
                method: "post"
            }
    
            fetch("/login-controller/formulaire", options).then(response => response.json())
            .then(response => {
                if(response.result)
                {
                    paragraph.classList.add("hidden");
                    window.location.href = response.route;
                } else {
                    paragraph.innerHTML = response.error;
                    paragraph.classList.remove("hidden");
                }
            })
        } else {
            paragraph.innerHTML = "Veuillez bien remplir tous les champs s'il vous plaît !!!";
            paragraph.classList.remove("hidden");
        }
    })
})