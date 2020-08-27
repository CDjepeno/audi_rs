<?php include_once  "header_dashbord.php" ?>
<div id="bar">
        <i class="fa fa-bars"></i>
    </div>
<div class="dashbord">
    <?php require_once "aside.php" ?>
    <div class="main_d">
        <h1>Détails véhicule commandé</h1>
            <table class="detail"> 
                <thead>
                    <tr>
                        <th>Véhicule</th>
                        <th>Modèle</th>
                        <th>Prix </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderdetails as $od) :?>
                        <tr>
                            <td><img src="assets/img/upload/<?= $od->getpath() ?>"></td>
                            <td><?= $od->getName() ?></td>
                            <td><?= $od->getBuy_price() ?> €</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>    
            </table>
    </div>
</div>
<?php include_once  "footer.php" ?>