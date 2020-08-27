"use strict"

let bar = document.getElementById("bar");

const ASIDE = document.querySelector(".aside");

bar.addEventListener("click", function() {
    ASIDE.classList.toggle("open");
});