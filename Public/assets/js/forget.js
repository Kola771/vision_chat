
document.addEventListener("DOMContentLoaded", () => {
    let email = document.getElementById("email");
    let email0 = document.querySelector(".email0");
    let code = document.querySelector(".code");
    let codevalide = document.getElementById("code");
    let pass1 = document.querySelector(".pass1");
    let pass2 = document.querySelector(".pass2");
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
        console.log(data);

        // fetch("/register-controller/verify-email-inp", options).then(response => response.json()).then(response => {
        //     if(response.error)
        //     {
        //         paragraph.innerHTML = response.error;
        //         paragraph.classList.remove("hidden");
        //     } else {
        //         paragraph.classList.add("hidden");
        //         email0.classList.add("hidden");
        //         code.classList.remove("hidden");
        //     }
        // })
    })
})