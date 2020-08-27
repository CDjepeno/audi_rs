<?php require_once "header_view.php"; ?>
<!--MAIN CONTENT-->
<main class="container">
    <!-- Slider -->
    <figure id="slider">
        <img src="assets/img/slider/441.jpg" alt="Audi" class="main"/>
    </figure>
   

    <section id="article">
        <article>
            <i class="fa fa-angle-double-up"></i>
            <h2>vendre plus cher</h2>
            <p>On vous aide à ivendre plus cher que lors d'une reprise en garage tout en restant dans la moyenne des estimations du marché.</p>
        </article>
        <article>
            <i class="fa fa-sign-language"></i>
            <h2>vendre sans rien faire</h2>
            <p>On s'occupe de la gestion des annonces de votre voiture, de trouver un acheteur grace à notre reseau de membres dans toute l'Europe.</p>
        </article>
        <article>
            <i class="fa fa-lock"></i>
            <h2>vendre en toute sécurité</h2>
            <p>On sécurise vos échanges avec les acheteurs ainsi que le transfert d'argent grâce à une selection pointue de nos membres.</p>
        </article>
    </section>
    
    <!-- Articles -->
    <section id="cars">
        <?php foreach ($products as $product): ?> 
            <article id="product">
                <h2><?= $product->getName() ?></h2>

                <section class="img">
                    <a href="index.php?class=Product&action=show&id=<?= $product->getId()?>">
                    <img src="assets/img/upload/<?= htmlspecialchars ($product->getpath()) ?>" alt="Audi" />
                    </a>
                </section>
                <section class="description">
                    <h2><?= $product->getBuy_price() ?> €</h2>
                </section>
                <a class="btn" href="index.php?class=Product&action=show&id=<?= $product->getId()?>">Voir ce produit</a>
            </article>
        <?php endforeach ?> 
    </section>
<script src="assets/js/slider.js"></script>
</main>

<?php require_once "footer_view.php"; ?>
