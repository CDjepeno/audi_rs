"Use strict";
/**************** Slider ***************/

let slider_content = document.getElementById("slides");

let images = [
            "assets/img/slider/442.jpg",
            "assets/img/slider/cab1.jpg",
            "assets/img/slider/cab2.jpg",
            "assets/img/slider/cab3.jpg",
            "assets/img/slider/suv2.jpg",
            "assets/img/slider/suv3.jpg",
            ];
let main = document.querySelector(".main");
let slides = document.getElementById("slides");
let i = 0;

/**
 * Affiche l'image suivant au chargement de la page
 */
document.addEventListener("DOMContentLoaded", function() {
    interval = setInterval(function(){
        i++
        if(i>images.length-1){
            i=0;
        }
        main.src=images[i];
    }, 3000)
   
});
