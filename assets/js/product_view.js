"Use strict"

/********** pop-up confirmation favoris et commande ********/
let commande = document.getElementById('commande');
let favoris = document.getElementById('favoris');

commande.addEventListener("click", function(e){
    e.preventDefault();
    if(confirm('êtes vous sûr de vouloir de commander ce véhicule ?')) {
        window.location = this.href; 
    }
})

favoris.addEventListener("click", function(e){
    e.preventDefault();
    if(confirm('êtes vous sûr de vouloir ajouter ce véhicule de vos favoris ?')) {
        window.location = this.href;
    }
})
