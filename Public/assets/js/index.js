
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
    let reponse, res;

        xmlhttp.open("POST", "/register-controller/form-one", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
            reponse = this.responseText;
            if(reponse !== "\r\n\r\nThat's good") {
                res = reponse.split("\r\n\r\n").join("");
                input.forEach(el => {
                    if(el.name == res) {
                        el.style = "border:2px solid red";
                    } else {
                        el.style = "border: .1rem solid #eee";
                    }
                })
                p.style = "display:flex"
                p.innerHTML = "Remplissez tous les champs!!!";
            } else {
                input.forEach(el => {
                    el.style = "border:2px solid green"
                })
                solute(1);
                li[count+1].classList.add("active");
                li[count].classList.remove("active");
                back.style = "display:block";
                p.style = "display:none"
            }
          }
        };
        xmlhttp.send(evente);
}

function ajaxTwo() {
    let xmlhttp = new XMLHttpRequest();
    let evente = eventTwo();
    let reponse, res;

        xmlhttp.open("POST", "/register-controller/form-two", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            reponse = this.responseText;
            if(reponse !== "\r\n\r\nThat's good") {
                res = reponse.split("\r\n\r\n").join("");
                input_two.forEach(el => {
                    if(el.name == res) {
                        el.style = "border:2px solid red";
                    } else {
                        el.style = "border: .1rem solid #eee";
                    }
                })
                paragraph.style = "display:flex"
                paragraph.innerHTML = reponse;
            } else {
                input_two.forEach(el => {
                    el.style = "border:2px solid green"
                })
                paragraph.style = "display:none"
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
            if(reponse !== "\r\n\r\nThat's good") {
                paragraphe.style = "display:flex"
                paragraphe.innerHTML = reponse;
            } else {
                select.forEach(el => {
                    el.style = "border:2px solid green";
                })
                paragraphe.style = "display:none"
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
    let reponse;

        xmlhttp.open("POST", "/validate/insert-data", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
            reponse = this.responseText;
            if(reponse !== "\r\n\r\nThat's good") {
                paragraphes.style = "display:flex"
                paragraphes.innerHTML = reponse;
            } else {
               setTimeout(() => {
                    window.location.assign('/home/login')
               }, 2000);
               event_four.setAttribute("disabled", "disabled");
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