<?php require_once "views/header_view.php"; ?>

<div class="background_contact">
    <div class="form_contact">
        <h1>Contactez-nous</h1>
        <form action=" " method="post" class="contact" id="contact">
            <table>
                <tr>
                    <span id='erreur_contact'></span>
                    <td class="mail">
                        <input type="email" name="mail" require id="mail_contact"  placeholder="Email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td class="message">
                        <textarea name="message" id="textarea_contact" require placeholder="Message" value="<?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>"></textarea>
                    <td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="contact_submit" require id="submit_contact">Envoyer</button>
                    </td>
                </tr>
            </table>
        <!-- Message d'alert -->
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
    </div>

    <!-- Liste commentaire -->
    <table class="liste_commentaire">
        <tr>
            <th>Mail</th>
            <th class="message">Messages</th>
        </tr>
        <?php $messages = Contact::list() ?>
        <?php foreach ($messages as $message): ?>
        <tr>
            <td><?= $message->getMail() ?></td>
            <td><?= $message->getContent() ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <script src="assets/js/app.js"></script>
</div>

<?php require_once "views/footer_view.php"; ?>
