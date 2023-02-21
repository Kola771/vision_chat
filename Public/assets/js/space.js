
let story = document.querySelectorAll(".stories");
let variables = [];

let stories = document.querySelectorAll(".image_story");
let modal = document.querySelectorAll(".modal");



//fonction pour faire le carrousel


document.addEventListener("DOMContentLoaded", function() {
    for(let i=0; i<story.length; i++)
        {
            let element = story[i].className.split(" ");
            let elem = element[element.length - 1];
            if(!variables.includes(elem)) {
                variables.push(elem)
            } else {
                story[i].style = "display:none"
            }
        }

        stories.forEach(el => el.addEventListener('click', function() {
            let element = el.className.split(" ");
            let elem = element[element.length - 1];
            modal.forEach(elements => {
                let elementes = elements.className.split(" ");
                let elems = elementes[elementes.length - 1];
                if(elems == elem) {
                    elements.style = "display:block"
                    let show = 1;
                    Slides(show);
                    
                    function solute(number) {
                        Slides(show += number);
                    }
                    function Slides(number) {
                        let i;
                        let absolute = elements.getElementsByClassName('absolutes');
                        if(number > absolute.length) {
                            show = 1
                        }
                        if(number < 1) {
                            show = absolute.length
                        }
                        for(i = 0; i<absolute.length; i++) {
                            absolute[i].style.display = "none";            
                        }
                        absolute[show-1].style.display = "block"; 
                    }

                    let left = elements.querySelector(".left");
                    let right = elements.querySelector(".right");
                    
                    let closes = elements.querySelector(".closes");
                    left.addEventListener("click", (e) => {
                        e.preventDefault();
                        solute(-1);
                    })
                
                    right.addEventListener("click", (e) => {
                        e.preventDefault();
                        solute(1);
                    })
                
                    closes.addEventListener("click", (e) => {
                        elements.style = "display:none"
                    })
                } else {
                    elements.style = "display:none"
                }
            }
                )
        }))

       
})