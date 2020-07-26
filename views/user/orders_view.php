<?php require_once  "header_dashbord.php" ?>
<div id="bar">
        <i class="fa fa-bars"></i>
    </div>
<div class="dashbord">
    <?php require_once "aside.php" ?>
    <div class="main_c">
        <h1>Véhicule commandés</h1>
        <table class="commande">
            <thead>
                <tr>
                    <th>N° Commande</th>
                    <th>Date de commande</th>
                    <th>Status</th>
                    <th>Date de livraison</th>
                    <th>Voir détail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order->getN_commande() ?></td>
                        <td><?= $order->getOrder_date() ?></td>
                        <td><?= $order->getStatus() ?></td>
                        <td><?= $order->getShipped_date() ?></td>
                        <td><a href="index.php?class=Order&action=orderdetails&id=<?= $order->getN_commande() ?>">detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once  "footer.php" ?>