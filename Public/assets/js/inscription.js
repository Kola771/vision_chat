
document.addEventListener("DOMContentLoaded", function() {
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let date = document.getElementById("date");
    let paragraph = document.getElementById("paragraph");
    let useremail = document.getElementById("useremail");
    let username = document.getElementById("username");
    let genre = document.getElementsByName("genre");
    // let paragraphe = document.getElementById("paragraphe");
    // let paragraphes = document.getElementById("paragraphes");
    let back = document.querySelector(".back");
    let event_one = document.querySelector(".event_one");
    let event_two = document.querySelector(".event_two");
    // let event_three = document.querySelector(".event_three");
    // let event_four = document.querySelector(".event_four");
    
    let show = 1;
    Slides(show);
    
    function solute(number) {
        Slides(show += number);
    }
    
    function Slides(number) {
        let i;
        let form = document.querySelectorAll(".form");
        if(number > form.length) {
            show = ""
        }
        if(number == 1) {
            back.classList.add("hidden");
        }
        if(number < 1) {
            show = form.length
        }
        for(i = 0; i<form.length; i++) {
            form[i].classList.add("hidden");            
        }
        form[show-1].classList.remove("hidden"); 
    }
    
    function eventOne() {
        let arrayLike = [];
        let requete;
        input.forEach(el => {
            arrayLike.push(el.name+ "=" +el.value)
        })
        requete = arrayLike.join("&");
        return requete;
    }
    
    console.log(document.getElementsByName("genre").value);
    
     event_one.addEventListener("click", (e) => {
        e.preventDefault();
        if(firstname.value.trim() !== "")
        {
            paragraph.classList.add("hidden");
            if(lastname.value.trim() !== "")
            {
                paragraph.classList.add("hidden");
                if(date.value !== "")
                {
                    paragraph.classList.add("hidden");
                    let currentDate = new Date();
                    let currentYear = currentDate.getFullYear();
                    let yearUser = Number(date.value.split("-")[0]);
                    let difference = currentYear - yearUser;
                    if(difference < 12)
                    {
                        paragraph.innerHTML = "S'il vous plaît vous devez avoir minimum 12ans pour accéder à cette plateforme !!!";
                        paragraph.classList.remove("hidden");
                    } else {
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
        console.log(genre.value);
     })
    
    //  event_three.addEventListener("click", (e) => {
    //     e.preventDefault();
    //     ajaxThree();
    //  })
    
    //  event_four.addEventListener("click", (e) => {
    //     e.preventDefault();
    //     ajaxFour();
    //  })

    back.addEventListener("click", (e) => {
            e.preventDefault();
            solute(-1);
        })
})