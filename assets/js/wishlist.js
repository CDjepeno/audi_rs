"use strict";

$(".wishlist").submit(function(e) {
    // alert("ok");
    e.preventDefault()

  $.post("index.php?class=product&action=wishlist", $(this).serializeArray()).done(function () {
        alert("produit ajouté")
    })
})
