
document.addEventListener("DOMContentLoaded", () => {
    let altImg = document.querySelector(".altImg");
    let navul = document.querySelector(".navul");
    let navul0 = document.querySelector(".navul0");
    let navul1 = document.querySelector(".navul1");
    let profil = document.querySelector(".profil");
    let logout = document.querySelector(".logout");
    let afficheState = document.querySelectorAll(".afficheState");
    let x = 0;
    altImg.addEventListener("click", (e) => {
        e.preventDefault();
        if(x === 0)
        {
            navul.classList.remove("hidden")
            x++;
        } else {
            navul.classList.add("hidden")
            x = 0;
        }
    })
    navul0.addEventListener("mouseenter", (e) => {
        e.preventDefault();
       navul1.classList.remove("hidden")
    })
    navul0.addEventListener("mouseleave", (e) => {
        e.preventDefault();
            navul1.classList.add("hidden")
    })
    profil.addEventListener("click", (e) => {
        e.preventDefault();
            navul.classList.add("hidden")
            navul1.classList.add("hidden")
            x = 0;
    })
    logout.addEventListener("mouseleave", (e) => {
        e.preventDefault();
            navul.classList.add("hidden")
            navul1.classList.add("hidden")
            x = 0;
    })
    afficheState.forEach(el => {
        el.addEventListener("click", (e) => {
            e.preventDefault();
            console.log(el.textContent);
            navul.classList.add("hidden");
            navul1.classList.add("hidden");
            x = 0;
        })
    })

    if(document.getElementById("clickThan"))
    {
        let clickThan = document.getElementById("clickThan");
        clickThan.addEventListener("click", (e) => {
            e.preventDefault();
                console.log(clickThan);
        })
    }
})