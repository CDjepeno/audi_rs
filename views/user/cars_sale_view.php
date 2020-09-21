<?php require_once "header_dashbord.php" ?>

<div id="bar">
            <i class="fa fa-bars"></i>
        </div>
<div class="dashbord">   
    <?php require_once "aside.php" ?>
    <div class="main">     
        <h1>Vos véhicule en ventes <?= $_SESSION['user']['pseudo'] ?></h1>
        <section id="cars">
            <?php foreach ($products as $product): ?> 
                <article id="product">
                    <h2><?= $product->getName() ?></h2>
                    <section class="img">
                        <a href="index.php?class=Product&action=show&id=<?= $product->getId()?>">
                        <img src="assets/img/upload/<?= htmlspecialchars ($product->getPath()) ?>" alt="Audi" />
                        </a>
                    </section>
                    <section class="description">
                        <h2><?= $product->getbuy_price() ?> €</h2>
                    </section>
                    <a class="btn" id="modifier" href="index.php?class=Product&action=edit&id=<?= $product->getId()?>">Modifier ce véhicule</a>
                    <a class="btn" id="supprimer" href="index.php?class=Product&action=delete&id=<?= $product->getId()?>">Supprimer ce véhicule</a>
                </article>
            <?php endforeach ?> 
        </section>
    </div>
</div>
<script src="assets/js/cars_sale_view.js"></script>	

<?php require_once "footer.php" ?>