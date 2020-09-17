<?php  require_once "views/header_view.php"; ?>

    <div class="form_register">
        <form action="" method="post" id="register">
        <h1>Inscrivez vous afin de profiter de notre réseaux</h1>
        <table>
                <tr>
                <span id='erreur_register'></span>
                    <td class="mail">
                        <input type="email" name="mail" id="mail_register" placeholder="Votre adresse e-mail" require="require" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="pseudo">
                        <input type="text" name="pseudo" id="pseudo_register" placeholder="Votre pseudo" require="require" value="<?php if(isset($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="password">
                        <input type="password" name="password1" id="password1_register" placeholder="Saisir votre mot de passe" require="require">
                    </td>
                </tr>
                <tr>
                    <td class="password">
                        <input type="password" name="password2" id="password2_register" placeholder="ressaisir votre mot de passe ">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><small>En créant un compte, vous acceptez de vous conformer à la Politique de confidentialité</small></p> 
                        <p>et aux <a href="">Conditions générales de vente</a></small></p>
                    </td>
                </tr>
                <tr>
                    <td class="submit">
                        <button type="submit" name="submit_register">Je m'inscris</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Déja membre ? <a href="index.php?class=users&action=login">Se connecter</a></p>
                    </td>
                </tr>
            </table>
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
        </form>
        <script src="assets/js/register.js"></script>
    </div>

    <?php require_once "views/user/footer.php"; ?>
