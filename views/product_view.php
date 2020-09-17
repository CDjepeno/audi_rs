<?php require_once "header_view.php"; ?>

    <div class="container">
        <article id="product_only">
            <h2> Découvrez le <?= $product->getName() ?> </h2>
                <img src="assets/img/upload/<?= htmlspecialchars($product->getPath()) ?>"/>
                <h3>Prix : <?= $product->getBuy_price()?> € HT</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <?php if(isset($_SESSION['user']['logged'])): ?>
                    <a class="btn" onclick="return confirm('êtes vous sûr de vouloir ajouter ce véhicule au favoris ?');" href="index.php?class=product&action=wishlist&id=<?= $product->getId() ?>">ajouter au favoris</a>
                    <a class="btn" onclick="return confirm('êtes vous sûr de vouloir commander ce véhicule ?');" href="index.php?class=Order&action=addcommande&id=<?= $product->getId()?>">Commander</a>
                <?php endif; ?>
        </article>
    </div>
    <script src="assets/js/wishlist.js"></script>	
    
<?php require_once "footer_view.php"; ?>
