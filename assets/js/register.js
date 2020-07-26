"Use strict";
/************ Vérification formulaire register ************/
let envoi_register = document.getElementById('register');
let mail = document.getElementById('mail_register');
let pseudo = document.getElementById('pseudo_register');
let password1 = document.getElementById('password1_register');
let password2 = document.getElementById('password2_register');
let erreur_register = document.getElementById('erreur_register');

envoi_register.addEventListener('submit',function(e){
    if(mail.value.trim() == "" && pseudo.value.trim() == "" && password1.value.trim() == "" && password2.value.trim() == ""){
        erreur_register.innerHTML = "Tous les champs sont requis";
        erreur_register.style.color = "red";
        e.preventDefault();
    }
    else if(mail.value.trim() == ""){
        erreur_register.innerHTML = "Le champ mail est requis";
        erreur_register.style.color = "red";
        e.preventDefault();
    }
    else if(pseudo.value.trim() == ""){
        erreur_register.innerHTML = "Le champ pseudo est requis";
        erreur_register.style.color = "red";
        e.preventDefault();
    }
    else if(password1.value.trim() == ""){
        erreur_register.innerHTML = "Le champ password est requis";
        erreur_register.style.color = "red";
        e.preventDefault();
    }
    else if(password2.value.trim() == ""){
        erreur_register.innerHTML = "Le champ password est requis";
        erreur_register.style.color = "red";
        e.preventDefault();
    }
})