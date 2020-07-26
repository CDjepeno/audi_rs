"Use strict";
/************ Vérification formulaire Ajouter véhicule ************/
let envoi_addcars = document.getElementById("add_cars");
let erreur_addcars = document.getElementById("erreur_addcars");

let name = document.getElementById("name_addcars");
let description = document.getElementById("description_addcars");
let price = document.getElementById("price_addcars");
let image = document.getElementById("image_addcar");

function value_cat(){
    let cat = document.getElementById("cat_addcars");
    let value_cat = cat[cat.selectedIndex].text;
    return value_cat;
}

envoi_addcars.addEventListener("submit", function(e){

    if(name.value.trim() == "" 
    && description.value.trim() == "" 
    && price.value.trim() == "" 
    && description.value.trim() == "" 
    && description.value.trim() == "" ){
        erreur_addcars.innerHTML = "Le champ nom de votre véhicule est requis";
        erreur_addcars.style.color = "red";   
        e.preventDefault();
    }else if(description.value.trim() == ""){
        erreur_addcars.innerHTML = "Le champ déscription du véhicule est requis";
        erreur_addcars.style.color = "red";
        e.preventDefault();
    }else if(price.value.trim() == ""){
        erreur_addcars.innerHTML = "Le champ prix de vente est requis";
        erreur_addcars.style.color = "red";
        e.preventDefault();
    }else if(cat_value.value.trim == ""){
        erreur_addcars.innerHTML = "Le champ catégorie est requis";
        erreur_addcars.style.color = "red";
        e.preventDefault();
    }
    
        
})
 