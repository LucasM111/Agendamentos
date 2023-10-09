// Add a classe hovered quando selecionar lista

let list = document.querySelectorAll(".navigationhome li")

function activeLink(){
    list.forEach((item) =>{
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

//Menu do Toggle

let toggle = document.querySelector(".togglehome");
let navigationhome = document.querySelector(".navigationhome");
let mainhome = document.querySelector(".mainhome");

toggle.onclick = function(){
    navigationhome.classList.toggle("active");
    mainhome.classList.toggle("active");
}