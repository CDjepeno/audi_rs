<?php

class UsersController extends AbstractController{
    /**
     * fonction permettant de renvoyer vers le dashbord user
     *[]
     * @return void 
     */
    public function index()
    {
        $this->renderView('user/dashboard');
    }

    /**
     * Fonction permettant de ce deconnecter
     *  
     */
    public function logout()
    {
        $session = new Session();
        $session->logout();
        $this->redirectTo("index");
    }

    /**
     * Fonction permettant de s'inscrire comme membre
     *
     * @return void
     */
    public function register()
    {
        $alert = [];
        $sucess = [];
        if(isset($_POST['submit_register']))
        {
            if(!empty($_POST['mail']) 
            && !empty($_POST['password1'])
            && !empty($_POST['password2'])
            && !empty($_POST['pseudo']))
            {
                if($_POST['password1'] == $_POST['password2'])
                {
                    if($_POST['pseudo'])
                    if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
                    {
                        if(Users::getUserByEmail($_POST['mail']) instanceof Users)
                        {          
                            $alert = "tu as déja un compte";
                        }else{
                            $user = new Users();
                            $user->setMail($_POST["mail"]);
                            $user->setPseudo($_POST['pseudo']);
                            $user->setPassword(htmlentities($_POST['password1']));
                            
                            if($user->add()){
                                $sucess = "Votre compte a bien été crée !";
                            }else{
                                $alert = "Réesayer de vous inscrire";
                            }
                        }   
                    }else{
                        $alert ="Votre mail n'est pas valide";
                    }
                }else{
                    $alert ="mot de passe saisie incorect";
                }
            }else{
                $alert ="Veuillez remplir tous les champs";
            }             
        }
        $this->renderView('user/Register',[
            'alert' => $alert, 
            'sucess' => $sucess
            ]);
    }

    /**
     * Permet de ce logger a une session
     */
    public function login()
    {
        $alert = [];
        if(isset($_POST['submit_login']))
        {
            if(!empty($_POST['mail']) && !empty($_POST['password']))
            {
                $u = Users::getUserByEmail(htmlentities($_POST['mail']));
                if($u instanceof Users)
                {
                    if(password_verify(htmlentities($_POST['password']), $u->getPassword()))
                    {
                        $session = new Session();
                        $session->login($u);
                        $total_product = Product::getCountProduct($_SESSION['user']['id']);
                        $total_cmd = Order::getCountOrder($_SESSION['user']['id']);
                
                        $this->renderView('user/dashboard', [
                            'total_prd' => $total_product,
                            'total_cmd' => $total_cmd
                        ]);
                    }else{
                        $alert = "Mot de passe incorrect";
                    }
                }else{
                    $alert = "Email inconnu";
                }
            }else{
                $alert = "veuillez remplir tout les champs";
            }
        }    
        $this->renderView('user/login', ["alert" => $alert ]);
    }

    /**
     * Permet de récupérer un nouveau mot de passe
     *
     * @return void
     */
    public function recovery() {

        $alert = [];
        $sucess = [];
        if(isset($_POST['submit_mdp'])){
            if(!empty($_POST['mail'])) {

                $u = Users::getUserByEmail(htmlentities($_POST['mail']));

                if($u instanceof Users)
                {
                    $password = uniqid();

                    define('EMAIL', "cdjepeno@gmail.com");
                    define('PASS','dulonx95');

                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                    ->setUsername(EMAIL)
                    ->setPassword(PASS)
                    ;

                    $mailer = new Swift_Mailer($transport);
                    // Create a message
                    $message = (new Swift_Message('Nouveau mot de passe'))
                    ->setFrom([EMAIL => 'AUDI_RS'])
                    ->setTo([$_POST['mail']])
                    ->setBody(
                        'Bonjour ' .$u->getPseudo().' voici ton nouveau mot de passe '. $password
                    ) ;
                    // Send the message
                   if($mailer->send($message)) {     
                       $u->setMail($u->getMail());
                       $u->setPseudo($u->getPseudo());
                       $u->setPassword($password);
                       
                       if($u->editUser($u->getId())) {
                           $sucess = "Un mail à été envoyer avec votre nouveau mot de passe";
                       }
                    }else {
                       $alert = "Une erreur est survenue lors de l'envoi du mail";
                    }
            
                }else {
                    $alert = "Adresse mail inconnu !";
                }       
            }
        }
        $this->renderView('user/recovery',[
            'alert' => $alert,
            'sucess' => $sucess
            ]);
    }

}