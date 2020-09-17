<?php require_once "header_dashbord.php" ?>

<div id="bar">
    <i class="fa fa-bars"></i>
</div>
<div class="dashbord">
    <?php require_once "aside.php" ?>
    <div class="main">
        <h1>Vos Favoris <?= $_SESSION['user']['pseudo'] ?></h1>
        <section id="cars">
            <?php foreach ($wishlist as $w): ?> 
            <article id="product">
                <h2><?= $w[0]->getName() ?></h2>           
                <section class="img">
                    <a href="index.php?class=Product&action=show&id=<?= $w[0]->getId()?>">
                    <img src="assets/img/product/<?= htmlspecialchars ($w[0]->getPath()) ?>" alt="Audi" />
                    </a>
                </section>
                <section class="description">
                    <h2><?= $w[0]->getBuy_price() ?> €</h2>
                </section>
                <a class="btn" onclick="return confirm('êtes vous sûr de vouloir supprimer ce véhicule??');" href="index.php?class=Product&action=remove_wishlist&id=<?= $w[0]->getId()?>">Supprimer de vos favoris</a>
                <a class="btn" onclick="return confirm('êtes vous sûr de vouloir commander ce véhicule??');" href="index.php?class=Order&action=addcommande&id=<?= $w[0]->getId()?>">Commander ce véhicule</a>
            </article>
        <?php endforeach ?> 
    </section>
    </div>
</div> 

<?php require_once "footer.php" ?>

