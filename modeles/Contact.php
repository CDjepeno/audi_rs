<?php

class Contact
{
    private $id;
    private $mail;
    private $content;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = htmlentities($mail);

        return $this;
    }


    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = htmlentities($content);

        return $this;
    }

    /**
     * fonction permettant d'inserer un message dans la bdd
     *
     * @return void
     */
    public function add(): int
    {
        $db = new Database;
        $result = $db->insert(
            "INSERT INTO `contact`(`mail`,`content`) VALUES (?,?)",
            [$this->mail, $this->content]
        );
        if(!$result){
            return 0;
        }
        return $db->getlastId();
    }

    /**
     * Fonction permettant de supprimer un message dans la bdd
     *
     * @param integer $id_message
     * @return boolean
     */
    public function delete(int $id_message): bool
    {
        $db = new Database;
        return $db->delete(
            "DELETE FROM `contact` WHERE id = ?",
            [$id_message]
        );
    }

    /**
     * Modifier un message dans la bdd  
     *
     * @return boolean
     */
    public function edit(): bool
    {
        $db= new Database;
        return $db->edit(
            "UPDATE contact SET `prenom`= ? ,`content`=? ",
            [$this->prenom, $this->contact]
        );
    }

    /**
     * Foonction permettant d'afficher les 5 derniers messages.
     *
     * @return void
     */
    public static function list()
    {
        $db= new Database;
        return $db->selectMany(
            "Contact",
            "SELECT * FROM contact ORDER BY id DESC  LIMIT 0,5"
        );
    }

    /**
     * Sécurise les données d'un formulaire
     *
     * @param [type] $donnee
     * @return void
     */
    public function securisation($donnee)
    {
        $donnee=trim($donnee);
        $donnee=stripslashes($donnee);
        $donnee=strip_tags($donnee);
        $donnee=htmlentities($donnee);
        // $donnee=htmlspecialchars($donnee);

        return $donnee;
    }

}