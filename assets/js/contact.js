"Use strict";
/**************** Slider ***************/
// let slider_content = document.getElementById("slides");
// let images = [
//             "assets/img/slider/442.jpg",
//             "assets/img/slider/cab1.jpg",
//             "assets/img/slider/cab2.jpg",
//             "assets/img/slider/cab3.jpg",
//             "assets/img/slider/suv2.jpg",
//             "assets/img/slider/suv3.jpg",
//             ];
// let main = document.querySelector(".main");
// let slides = document.getElementById("slides");
// let b_next = document.getElementById("next");
// let b_prew = document.getElementById("prew");
// let i = 0;

// b_next.addEventListener('click',function(){
//     i++
//     if(i>images.length-1){
//         i=0;
//     }
//     main.src=images[i];
// });

// b_prew.addEventListener('click',function(){
//     i--
//     if(i<0){
//         i=images.length-1;
//     }
//     main.src=images[i];
// });



/************ Vérification formulaire contact ************/
let envoi_contact = document.getElementById('contact');
let email = document.getElementById('mail_contact');
let message = document.getElementById('textarea_contact');
let erreur_contact = document.getElementById('erreur_contact');

envoi_contact.addEventListener('submit',function(e){
    // alert('ok');
    if(email.value.trim() == "" && message.value.trim() == ""){
        erreur_contact.innerHTML = "Tous les champs sont requis";
        erreur_contact.style.color = "red";
        e.preventDefault();
    }
    else if(message.value.trim() == ""){
        erreur_contact.innerHTML = "Le champ message est requis";
        erreur_contact.style.color = "red";
        e.preventDefault();
    }
    else if(email.value.trim() == ""){
        erreur_contact.innerHTML = "Le champ email est requis";
        erreur_contact.style.color = "red";
        e.preventDefault();   
    }
});



/************ Vérification formulaire register ************/
// let envoi_register = document.getElementById('register');
// let mail = document.getElementById('mail_register');
// let pseudo = document.getElementById('pseudo_register');
// let password1 = document.getElementById('password1_register');
// let password2 = document.getElementById('password2_register');
// let erreur_register = document.getElementById('erreur_register');

// envoi_register.addEventListener('submit',function(e){
//     if(mail.value.trim() == "" && pseudo.value.trim() == "" && password1.value.trim() == "" && password2.value.trim() == ""){
//         erreur_register.innerHTML = "Tous les champs sont requis";
//         erreur_register.style.color = "red";
//         e.preventDefault();
//     }
//     else if(mail.value.trim() == ""){
//         erreur_register.innerHTML = "Le champ mail est requis";
//         erreur_register.style.color = "red";
//         e.preventDefault();
//     }
//     else if(pseudo.value.trim() == ""){
//         erreur_register.innerHTML = "Le champ pseudo est requis";
//         erreur_register.style.color = "red";
//         e.preventDefault();
//     }
//     else if(password1.value.trim() == ""){
//         erreur_register.innerHTML = "Le champ password est requis";
//         erreur_register.style.color = "red";
//         e.preventDefault();
//     }
//     else if(password2.value.trim() == ""){
//         erreur_register.innerHTML = "Le champ password est requis";
//         erreur_register.style.color = "red";
//         e.preventDefault();
//     }
// })

/************ Vérification formulaire login ************/
// let envoi_login = document.getElementById('login');
// let mail =  document.getElementById('mail_login');
// let password =  document.getElementById('password_login');
// let erreur_login = document.getElementById('erreur_login');

// envoi_login.addEventListener('submit',function(e){
//     if(mail.value.trim() == "" && password.value.trim() == ""){
//         erreur_login.innerHTML = "Tous les champs sont requis";
//         erreur_login.style.color = "red";
//         e.preventDefault();
//     }
//     else if(mail.value.trim() == ""){
//         erreur_login.innerHTML = "Le champ mail est requis";
//         erreur_login.style.color = "red";
//         e.preventDefault();
//     }
//     else if(password.value.trim() == ""){
//         erreur_login.innerHTML = "Le champ password est requis";
//         erreur_login.style.color = "red";
//         e.preventDefault();
//     }
// })

/************ Vérification formulaire Ajouter véhicule ************/

/************ Vérification formulaire Modifier véhicule ************/
