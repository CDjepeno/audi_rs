<?php


class ContactController extends AbstractController
{
    /**
     * Fonction permettant d'envoyer le message dans la bdd
     *
     * @return void
     */
    public function insert()
    {
        $alert=[];
        $sucess=[];
        if(isset($_POST['contact_submit']))
        {
            if(!empty($_POST['mail']) && !empty($_POST['message']))
            {
                $contact = new contact();
                $contact->setMail($_POST['mail']);
                $contact->setContent($_POST['message']);
                
                if($contact->add()){
                    $sucess = "Votre message a bien était envoyer nos équipe vous répondront dans les plus bref delai";
                }
            }else{
                $alert = "Veuillez remplir tout les champs !";
            }
        }
        $this->renderView('contact_view' , [
            'alert' => $alert,
            'sucess' => $sucess
            ]);
    }






}