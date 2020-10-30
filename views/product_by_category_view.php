<?php include_once "header_view.php" ?>

<div class="container">
    <?php foreach ($products as $p): ?>
        <section id="cars">
            <article id="product">
                <a href="index.php?class=product&action=show&id=<?= $p->getId() ?>"> <h2><?= $p->getName() ?></h2></a>
                <section class="img">
                    <a href="index.php?class=product&action=show&id=<?= $p->getId() ?>">
                    <img src="assets/img/product/<?= htmlspecialchars ($p->getpath()) ?>" alt="Audi" />
                </section>
                </a>
                <br>
                <section class="description">
                    <span>Tarif: <?= $p->getBuy_price() ?> € HT</span>
                    <p><?= substr($p->getDescription(), 0, 50)  ?>...</p>
                </section>
                <a class="btn" href="index.php?class=product&action=show&id=<?= $p->getId() ?>" >Voir le produit</a>
            </article>
        <?php endforeach ?>
    </section>
</div>

<?php include_once "footer_view.php" ?>

