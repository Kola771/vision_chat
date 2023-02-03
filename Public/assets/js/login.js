
let form = document.querySelectorAll(".parent_form>form>input");
let paragraph = document.getElementById("paragraph");
let validate = document.querySelector(".validate");


function formulaire() {
    let arrayLike = [];
    let requete;
    form.forEach(el => {
        arrayLike.push(el.name+ "=" +el.value)
    })
    requete = arrayLike.join("&");
    return requete;
}


function ajaxForm() {
    let xmlhttp = new XMLHttpRequest();
    let evenement = formulaire();
    console.log(evenement);
    let reponse;

        xmlhttp.open("POST", "/login-controller/formulaire", true);

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
            reponse = this.responseText;
            if(reponse !== "\r\n\r\nThat's good") {
                console.log(reponse);
                paragraph.style = "display:flex"
                paragraph.innerHTML = reponse;
            } else {
                window.location.assign('/home/space');
                validate.setAttribute("disabled", "disabled");
            }
          }
        };
        xmlhttp.send(evenement);
}


document.addEventListener("DOMContentLoaded", function() {
     validate.addEventListener("click", (e) => {
        e.preventDefault();
        ajaxForm();
     })
})