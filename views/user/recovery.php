<?php  require_once "views/header_view.php"; ?>

<div class="form_login">
        <h1>Récupération mot de passe</h1>
        <form action="" method="post" id="mdp">
            <table>
                <tr>
                    <td class="email">
                        <i class="fa fa-user"></i>
                        <input type="email" name="mail" id="mail_mdp" placeholder=" Adresse e-mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit_mdp">M'envoyer</button>
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
        <script src="assets/js/login.js"></script>
    </div> 
    
<?php require_once "views/user/footer.php"; ?>
