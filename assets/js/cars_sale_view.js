"Use strict"

/********** pop-up confirmation modifier et supprimer ********/
let supprimer = document.getElementById('supprimer');
let modifier = document.getElementById('modifier');

supprimer.addEventListener("click", function(e){
    e.preventDefault();
    if(confirm('êtes vous sûr de vouloir supprimer ce véhicule ?')) {
        window.location = this.href;
    }
})

modifier.addEventListener("click", function(e){
    e.preventDefault();
    if(confirm('êtes vous sûr de vouloir modifier ce véhicule ?')) {
        window.location = this.href;
    }
})