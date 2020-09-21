"use strict";


/********** pop-up confirmation supprimer et commande ********/
let commande = document.getElementById('commande');
let supprimer = document.getElementById('supprimer');


commande.addEventListener("click", function(e){
    e.preventDefault();
    if(confirm('êtes vous sûr de vouloir de commander ce véhicule ?')) {
        window.location = this.href; 
    }
})

supprimer.addEventListener("click", function(e){
    e.preventDefault();
    if(confirm('êtes vous sûr de vouloir supprimer ce véhicule de vos favoris ?')) {
        window.location = this.href;
    }
})


