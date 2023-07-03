let menuHover = document.querySelector(".nav > ul");
let menuHover2 = document.querySelectorAll(".left .nav > ul > li > ul");

let slider = document.querySelectorAll(".right .slide__wrap .slider img");
let time = 0;

// time = setInterval(() => { 
//     slider.style.top = "-400"+"px";
// }, 1000);
        
// menuHover.forEach((item, index, Array) => {
//     menuHover[index].addEventListener("mouseover", () => {
//         menuHover2[index].style.display = "block";
//     });
//     menuHover[index].addEventListener("mouseout", () => {
//         menuHover2[index].style.display = "none";
//     });
// });

menuHover2.forEach((item, index, array) => {
    menuHover.addEventListener("mouseover", () => {
        menuHover2[index].style.display = "flex";
    });
    menuHover.addEventListener("mouseout", () => {
        menuHover2[index].style.display = "none";
    });
});

