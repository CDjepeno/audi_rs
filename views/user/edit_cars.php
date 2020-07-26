<?php require_once  "header_dashbord.php" ?>
<div id="bar">
        <i class="fa fa-bars"></i>
    </div>
<div class="dashbord">
        <?php require_once "aside.php" ?>
    <div class="form_editcars">
        <form action="" method="post" class="add" id="edit_cars" enctype="multipart/form-data">
            <h1>Modifier <?= $product_name ?></h1>
            <table>
                <tr>
                    <span id='erreur_addcars'></span>
                    <td class="title">
                        <input type="text" name="name" id="name_editcars" placeholder="le nom de votre véhicule" require="require" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <textarea type="textearea" name="description" id="description_editcars" placeholder="Descriptif du véhicule" require="require" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="price">
                        <input type="number" name="buyPrice" id="price_editcars" placeholder="Prix de vente" require="require" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="category">
                    <?php $category = Category::list(); ?>
                        <select name="idCategory" id="cat_editcars" require="require">
                            <option>La catégory de votre véhicule</option>
                            <?php foreach($category as $cat): ?>      
                                <option value="<?= $cat->getId() ?>"><?= $cat->getName() ?></option>
                            <?php endforeach ?>
                        </select>                    
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" class="custom-file-input" name="fichier" id="image_editcars" required="require"/>
                    </td>
                </tr>
                <tr>
                    <td class="submit">
                        <button type="submit" name="submit_edit">Modifier mon véhicule</button>
                    </td>
                </tr>
            </table>
        </form>
        <br/>
           <!-- Message erreur -->
           <?php if(!empty($alert) || !empty($sucess)): ?>
                <?php if(!empty($alert)): ?>
                    <div class="alert">
                        <p><?= $alert; ?></p>
                    </div>
                <?php else: ?>
                    <div class="sucess">
                        <p><?= $sucess; ?></p>
                    </div>
                <?php endif; ?> 
            <?php endif; ?>
    </div>
    <script src="assets/js/edit_cars.js"></script>
</div>
<?php require_once  "footer.php" ?>