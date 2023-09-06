
document.addEventListener("DOMContentLoaded", function () {
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let date = document.getElementById("date");
    let paragraph = document.getElementById("paragraph");
    let useremail = document.getElementById("useremail");
    let username = document.getElementById("username");
    let genre1 = document.getElementById("genre1");
    let genre2 = document.getElementById("genre2");
    let genre3 = document.getElementById("genre3");
    let sexe = "";
    let clickSelect = document.querySelector(".clickSelect");
    let clickSelect0 = document.querySelector(".clickSelect0");
    let affichSelects = document.querySelectorAll(".affichSelect>li");
    let valSelect = document.getElementById("valSelect");
    let password = document.getElementById("password");
    let confirm_password = document.getElementById("confirm_password");
    let back = document.querySelector(".back");
    let event_one = document.querySelector(".event_one");
    let event_two = document.querySelector(".event_two");
    let event_three = document.querySelector(".event_three");

    let show = 1;
    Slides(show);

    function solute(number) {
        Slides(show += number);
    }

    function Slides(number) {
        let i;
        let form = document.querySelectorAll(".form");
        let val = document.querySelectorAll(".val");
        if (number > form.length) {
            show = ""
        }
        if (number == 1) {
            back.classList.add("hidden");
        }
        if (number < 1) {
            show = form.length
        }
        for (i = 0; i < form.length; i++) {
            form[i].classList.add("hidden");
            val[i].classList.add("hidden");
        }
        form[show - 1].classList.remove("hidden");
        val[show - 1].classList.remove("hidden");
    }

    event_one.addEventListener("click", (e) => {
        e.preventDefault();
        if (lastname.value.trim() !== "") {
            paragraph.classList.add("hidden");
            if (firstname.value.trim() !== "") {
                paragraph.classList.add("hidden");
                if (date.value !== "") {
                    paragraph.classList.add("hidden");
                    let currentDate = new Date();
                    let currentYear = currentDate.getFullYear();
                    let yearUser = Number(date.value.split("-")[0]);
                    let difference = currentYear - yearUser;
                    if (difference < 12) {
                        paragraph.innerHTML = "S'il vous plaît vous devez avoir minimum 12ans pour accéder à cette plateforme !!!";
                        paragraph.classList.remove("hidden");
                    } else {
                        event_one.classList.add("hidden");
                        event_two.classList.remove("hidden");
                        paragraph.classList.add("hidden");
                        back.classList.remove("hidden");
                        solute(1);
                    }
                } else {
                    paragraph.innerHTML = "Entrez votre date de naissance s'il vous plaît !!!";
                    paragraph.classList.remove("hidden");
                }
            } else {
                paragraph.innerHTML = "Entrez votre prénom(s) s'il vous plaît !!!";
                paragraph.classList.remove("hidden");
            }
        } else {
            paragraph.innerHTML = "Entrez votre nom de famille !!!";
            paragraph.classList.remove("hidden");
        }
    })

    event_two.addEventListener("click", (e) => {
        e.preventDefault();
        if (genre1.checked) {
            sexe = genre1.value;
        } else if (genre2.checked) {
            sexe = genre2.value;
        } else if (genre3.checked) {
            sexe = genre3.value;
        }
        if (useremail.value.trim() !== "") {
            paragraph.classList.add("hidden");
            if (username.value.trim() !== "") {
                paragraph.classList.add("hidden");
                let data = {
                    username: username.value,
                    useremail: useremail.value
                }
                data = JSON.stringify(data);
                let options = {
                    header: {
                        "content": "application/json"
                    },
                    body: data,
                    method: "post"
                }
                fetch("/register-controller/verify-data", options).then(response => response.json())
                    .then(response => {
                        if (response.result) {
                            if (sexe !== "") {
                                paragraph.classList.add("hidden");
                                event_one.classList.add("hidden");
                                event_two.classList.add("hidden");
                                event_three.classList.remove("hidden");
                                solute(1);
                            } else {
                                paragraph.innerHTML = "Entrez votre genre !!!";
                                paragraph.classList.remove("hidden");
                            }

                        } else {
                            paragraph.innerHTML = response.error;
                            paragraph.classList.remove("hidden");
                        }
                    })
            } else {
                paragraph.innerHTML = "Entrez votre pseudo !!!";
                paragraph.classList.remove("hidden");
            }
        } else {
            paragraph.innerHTML = "Entrez votre adresse électronique !!!";
            paragraph.classList.remove("hidden");
        }
    })

    event_three.addEventListener("click", (e) => {
        e.preventDefault();
        if (valSelect.value != "") {
            paragraph.classList.add("hidden");
            if (password.value.trim() != "") {
                paragraph.classList.add("hidden");
                if (confirm_password.value.trim() != "") {
                    paragraph.classList.add("hidden");
                    if (password.value.trim() === confirm_password.value.trim()) {
                        paragraph.classList.add("hidden");
                        let data = {
                            firstname: firstname.value,
                            lastname: lastname.value,
                            date: date.value,
                            username: username.value,
                            useremail: useremail.value,
                            sexe,
                            valSelect: valSelect.value,
                            password: password.value,
                            confirm_password: confirm_password.value
                        }
                        data = JSON.stringify(data);
                        let options = {
                            header: {
                                "content": "application/json"
                            },
                            body: data,
                            method: "post"
                        }
                        fetch("/validate/insert-data", options).then(response => response.json())
                            .then(response => {
                                event_three.classList.add("disabled:opacity-75");
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
        } else {
            paragraph.innerHTML = "S'il vous plaît vous, précisez votre situation matrimoniale !!!";
            paragraph.classList.remove("hidden");
        }
    })

    clickSelect.addEventListener("click", (e) => {
        e.preventDefault();
        clickSelect.classList.add("hidden");
        document.querySelector(".affichSelect").classList.remove("hidden");
        document.querySelector(".clickSelect0").classList.remove("hidden");
    })

    clickSelect0.addEventListener("click", (e) => {
        e.preventDefault();
        clickSelect0.classList.add("hidden");
        document.querySelector(".affichSelect").classList.add("hidden");
        document.querySelector(".clickSelect").classList.remove("hidden");
    })

    affichSelects.forEach(el => {
        el.addEventListener("click", (e) => {
            e.preventDefault();
            valSelect.value = el.textContent;
            clickSelect.classList.add("hidden");
            document.querySelector(".affichSelect").classList.add("hidden");
            document.querySelector(".clickSelect").classList.remove("hidden");
            document.querySelector(".clickSelect0").classList.add("hidden");
        })
    })

    back.addEventListener("click", (e) => {
        e.preventDefault();
        solute(-1);
    })
})