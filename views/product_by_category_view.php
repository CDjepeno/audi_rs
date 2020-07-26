<?php include_once "header_view.php" ?>

<div class="container_cat">
    <?php foreach ($products as $p): ?>
        <article id="product_cat">
            <a href="index.php?class=product&action=show&id=<?= $p->getId() ?>"> <h2><?= $p->getName() ?></h2></a>
            <a href="index.php?class=product&action=show&id=<?= $p->getId() ?>">
            <img src="assets/img/product/<?= htmlspecialchars ($p->getpath()) ?>" alt="Audi" />
            </a>
            <br>
            <span>Tarif: <?= $p->getBuy_price() ?> € HT</span>
            <p><?= substr($p->getDescription(), 0, 50)  ?>...</p>
            <a class="btn" href="index.php?class=product&action=show&id=<?= $p->getId() ?>" >Voir le produit</a>
        </article>
    <?php endforeach ?>
</div>



<?php include_once "footer_view.php" ?>

