
document.addEventListener("DOMContentLoaded", () => {
    let email = document.getElementById("email");
    let email0 = document.querySelector(".email0");
    let code = document.querySelector(".code");
    let codevalide = document.getElementById("code");
    let pass1 = document.querySelector(".pass1");
    let pass2 = document.querySelector(".pass2");
    let password = document.getElementById("password");
    let confirm_password = document.getElementById("confirm_password");
    email.addEventListener("keyup", (e) => {
        let data = {
            email : email.value
        }
        data = JSON.stringify(data);
        let options = {
            header : {
                "content" : "application/json"
            }, 
            body: data,
            method: "post"
        }

        fetch("/register-controller/verify-email-inp", options).then(response => response.json()).then(response => {
            if(response.error)
            {
                paragraph.innerHTML = response.error;
                paragraph.classList.remove("hidden");
            } else {
                paragraph.classList.add("hidden");
                email0.classList.add("hidden");
                code.classList.remove("hidden");
            }
        })
    })
    code.addEventListener("keyup", (e) => {
        let data = {
            email: email.value,
            code : codevalide.value
        }
        data = JSON.stringify(data);
        let options = {
            header : {
                "content" : "application/json"
            }, 
            body: data,
            method: "post"
        }

        fetch("/register-controller/verify-code-inp", options).then(response => response.json()).then(response => {
            if(response.error)
            {
                paragraph.innerHTML = response.error;
                paragraph.classList.remove("hidden");
            } else {
                paragraph.classList.add("hidden");
                code.classList.add("hidden");
                pass1.classList.remove("hidden");
                pass2.classList.remove("hidden");
                document.querySelector(".valid").classList.remove("hidden");
            }
        })
    })
    document.querySelector(".valid").addEventListener("click", (e) => {
        e.preventDefault();
        if (password.value.trim() != "") {
            paragraph.classList.add("hidden");
            if (confirm_password.value.trim() != "") {
                paragraph.classList.add("hidden");
                if (password.value.trim() === confirm_password.value.trim()) {
                    paragraph.classList.add("hidden");
                    let data = {
                        email: email.value.trim(),
                        password: password.value.trim(),
                        confirm_password: confirm_password.value.trim()
                    }
                    data = JSON.stringify(data);
                    let options = {
                        header: {
                            "content": "application/json"
                        },
                        body: data,
                        method: "post"
                    }
                    fetch("/register-controller/update-password", options).then(response => response.json())
                        .then(response => {
                            if (response.result) {
                                paragraph.classList.add("hidden");
                                window.location.href = response.route;
                            } else {
                                paragraph.innerHTML = response.error;
                                paragraph.classList.remove("hidden");
                            }
                        })
                } else {
                    paragraph.innerHTML = "Les mots de passes renseignés sont pas conformes !!!";
                    paragraph.classList.remove("hidden");
                }
            } else {
                paragraph.innerHTML = "Vous devez confirmer le mot de passe renseigné !!!";
                paragraph.classList.remove("hidden");
            }
        } else {
            paragraph.innerHTML = "Vous devez définir le mot de passe et éviter les espaces !!!";
            paragraph.classList.remove("hidden");
        }
    })
})