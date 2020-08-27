<!-- asside -->
<table class="aside">
    <thead>
        <tr>
            <td class="user">
                <a href="index.php?class=order&action=ordercount">
                    <i class="fa fa-circle"></i> <i class="fa fa-user "></i> <?= ucfirst($_SESSION['user']['pseudo']) ?>
                </a>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <a href="index.php?class=order&action=commande">Véhicule commandé(s)</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="index.php?class=product&action=sale">Véhicule en vente(s)</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="index.php?class=product&action=addCar">Ajouter un véhicule</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="index.php?class=product&action=wishlist">Favoris</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="index.php">
                    <img src="assets/img/anneau.jpg" alt="logo">
                </a>        
            </td>
        </tr>
    </tbody>
</table>