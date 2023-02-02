
let form = document.querySelectorAll(".parent_form>form");
let form_one = document.querySelector('.parent_form>.form_one');
let form_two = document.querySelector('.parent_form>.form_two');
let input = document.querySelectorAll('.parent_form>.form_one>input');
let input_two = document.querySelectorAll('.parent_form>.form_two>input');
let select = document.querySelectorAll('.form_three>select');
let input_four = document.querySelectorAll('.parent_form>.form_four>input');
let p = document.getElementById("id");
let paragraph = document.getElementById("paragraph");
let paragraphe = document.getElementById("paragraphe");
let paragraphes = document.getElementById("paragraphes");
let back = document.querySelector(".back");
let event_one = document.querySelector(".event_one");
let event_two = document.querySelector(".event_two");
let event_three = document.querySelector(".event_three");
let event_four = document.querySelector(".event_four");

let show = 1;
Slides(show);

function solute(number) {
    Slides(show += number);
}

let count = 0;
let li = document.querySelectorAll(".flex>li");

function Slides(number) {
    let i;
    let form = document.querySelectorAll(".parent_form>form");
    if(number > form.length) {
        show = ""
    }
    if(number == 1) {
        back.style = "display:none"
    }
    if(number < 1) {
        show = form.length
    }
    for(i = 0; i<form.length; i++) {
        form[i].style.display = "none";            
    }
    form[show-1].style.display = "flex"; 
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

function eventTwo() {
    let arrayLike = [];
    let requete;
    input_two.forEach(el => {
        arrayLike.push(el.name+ "=" +el.value)
    })
    requete = arrayLike.join("&");
    return requete;
}

function eventThree() {
    let arrayLike = [];
    let requete;
    select.forEach(el => {
        arrayLike.push(el.name+ "=" +el.value)
    })
    requete = arrayLike.join("&");
    return requete;
}

function eventFour() {
    let arrayLike = [];
    let requete;
    input_four.forEach(el => {
        arrayLike.push(el.name+ "=" +el.value)
    })
    requete = arrayLike.join("&");
    return requete;
}

function ajaxOne() {
    let xmlhttp = new XMLHttpRequest();
    let evente = eventOne();
    let reponse;

        xmlhttp.open("POST", "/register-controller/form-one", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
            reponse = this.responseText;
            if(reponse == "\r\n\nRemplissez tous les champs !!!") {
                p.style = "display:flex"
                p.innerHTML = reponse;
            } else {
                solute(1);
                li[count+1].classList.add("active");
                li[count].classList.remove("active");
                back.style = "display:block"
            }
          }
        };
        xmlhttp.send(evente);
}

function ajaxTwo() {
    let xmlhttp = new XMLHttpRequest();
    let evente = eventTwo();
    let reponse;

        xmlhttp.open("POST", "/register-controller/form-two", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            reponse = this.responseText;
            if(reponse !== "\r\n\nThat's good") {
                paragraph.style = "display:flex"
                paragraph.innerHTML = reponse;
            } else {
                solute(1);
                li[count+2].classList.add("active");
                li[count+1].classList.remove("active");
            }
          }
        };
        xmlhttp.send(evente);
}

function ajaxThree() {
    let xmlhttp = new XMLHttpRequest();
    let evente = eventThree();
    let reponse;

        xmlhttp.open("POST", "/register-controller/form-three", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
            reponse = this.responseText;
            if(reponse !== "\r\n\nThat's good") {
                paragraphe.style = "display:flex"
                paragraphe.innerHTML = reponse;
            } else {
                solute(1);
                li[count+3].classList.add("active");
                li[count+2].classList.remove("active");
            }
          }
        };
        xmlhttp.send(evente);
}

function ajaxFour() {
    let xmlhttp = new XMLHttpRequest();
    let evente = eventOne() + "&" + eventTwo() + "&" + eventThree() + "&" + eventFour();
    console.log(evente);
    let reponse;

        xmlhttp.open("POST", "/validate/insert-data", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
            reponse = this.responseText;
            if(reponse !== "\r\n\nThat's good") {
                console.log(reponse);
                paragraphes.style = "display:flex"
                paragraphes.innerHTML = reponse;
            } else {
                // solute(1);
                // li[count+3].classList.add("active");
                // li[count+2].classList.remove("active");
            }
          }
        };
        xmlhttp.send(evente);
}


document.addEventListener("DOMContentLoaded", function() {
    
     event_one.addEventListener("click", (e) => {
        e.preventDefault();
        ajaxOne();
     })
    
     event_two.addEventListener("click", (e) => {
        e.preventDefault();
        ajaxTwo();
     })
    
     event_three.addEventListener("click", (e) => {
        e.preventDefault();
        ajaxThree();
     })
    
     event_four.addEventListener("click", (e) => {
        e.preventDefault();
        ajaxFour();
     })

    back.addEventListener("click", (e) => {
            e.preventDefault();
            solute(-1);
        })
})