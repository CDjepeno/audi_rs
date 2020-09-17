<?php require_once "header_dashbord.php" ?>

<div id="bar">
    <i class="fa fa-bars"></i>
</div>
<div class="dashbord">
    <?php require_once "aside.php" ?>
    <div class="main">
        <h1>Bienvenue dans votre espace personnel <?= $_SESSION['user']['pseudo'] ?></h1>
        <table class="perso">
            <thead>
                <tr>
                    <th style="color:white; font-size:2rem;">Nombre de véhicule en vente </th>
                    <th style="color:white; font-size:2rem;">Nombre de véhicule en commande </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="color:white; font-size:2rem;"><?= $total_prd->getNombre() ?></td>
                    <td style="color:white; font-size:2rem;"><?= $total_cmd->getNbcommande() ?></td>
                </tr>   
            </tbody>
        </table>
    </div>
</div>

<?php require_once "footer.php" ?>
