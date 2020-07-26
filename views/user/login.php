<?php  require_once "views/header_view.php"; ?>
    <div class="form_login">
        <h1>Déjà membre</h1>
        <form action="" method="post" id="login">
            <table>
                <tr>
                    <span id='erreur_login'></span>
                    <td class="email">
                        <i class="fa fa-user"></i>
                        <input type="email" name="mail" id="mail_login" placeholder=" Adresse e-mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td class="password">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" id="password_login" placeholder=" Mot de passe"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit_login">Me connecter</button>
                    </td>
                </tr>
            </table>
            <p><a href="index.php?class=users&action=recovery">Mot de passe oublié ?</a></p>
            <p>vous n'êtes pas encore membre ?<a href="index.php?class=users&action=register">Rejoignez-nous maintenant.</a></p>
        </form>
        <br/> 
            <!-- Message d'alert -->
            <?php if(!empty($alert)): ?>
                <?php if(!empty($alert)): ?>
                <div class="alert">
                    <p><?= $alert; ?></p>
                </div>
                <?php endif ?>
            <?php endif ?> 
        <script src="assets/js/login.js"></script>
    </div> 
  

<?php require_once "footer.php"; ?>
