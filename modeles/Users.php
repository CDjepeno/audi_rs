<?php


class Users
{
    private $id;
    private $mail;
    private $pseudo;
    private $password;
    private $created_at;
    private $edited_at;
    private $is_activated;
    private $role;
 

     /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = htmlentities($mail);
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = htmlentities($pseudo);
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Get the value of edited_at
     */ 
    public function getEdited_at()
    {
        return $this->edited_at;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;
        
        return $this;
    }
    
    /**
     * Get the value of is_activated
     */ 
    public function getIs_activated()
    {
        return $this->is_activated;
    }

    /**
     * Set the value of is_activated
     *
     * @return  self
     */ 
    public function setIs_activated($is_activated)
    {
        $this->is_activated = $is_activated;

        return $this;
    }


    /**
     * Insere un utilisateur dans le bdd
     * @return bool
     */
    public function  add() : bool
    {
        $cnx=new Database();
        return $cnx->insert(
            "INSERT INTO `users` (`mail`,`pseudo`,`password`) VALUES (?,?,?)",
            [$this->mail, $this->pseudo, $this->password]
        );
    }       

    /**
     * récupération d'un utilisatieur par sont mail
     * @param string $mail
     * @return Users|null
     */
    public static function getUserByEmail(string $mail) : ?Users
    {
        $cnx=new Database();
        $result=$cnx->selectOne(
            "Users",
            "SELECT * FROM users WHERE mail LIKE ?",
            [$mail]
        );
        if ($result == false)
        {
            return null;
        }
        return $result;
    }

    /**
     * Récupération d'un utilisateur par sont pseudo.
     *
     * @param string $pseudo
     * @return Users|null
     */
    public static function getUserByName(string $pseudo) : ?Users
    {
        $cnx=new Database();
        $result=$cnx->selectOne(
            "Users",
            "SELECT * FROM user WHERE pseudo",
            [$pseudo]
        );
        if ($result == false)
        {
            return null;
        }
        return $result;
    }

    /**
     * récupération d'un utilisateur par sont identifiant
     *
     * @param integer $id
     * @return Users
     */
    public static function getUserById(int $id) : Users
    {
        $cnx=new Database();
        return $cnx->selectOne(
            "Users",
            "SELECT * FROM user WHERE id=?",
            [$id]
        );
    }

    /**
     * récupération de tous les utilisateurs
     *
     * @return array
     */
    public static function getAllUsers() : array
    {
        $cnx=new Database();
        return $cnx->selectMany(
            "Users",
            "SELECT * FROM user"
        );
    }

    /**
     * Modifier un utilisateur
     *
     * @return boolean
     */
    public function editUser(int $id) : bool
    {
        $cnx=new Database();
        return $cnx->edit(
            "UPDATE `users` SET `mail`=?,`password`=?,`pseudo`=? WHERE id=?",
            [$this->mail,$this->password,$this->pseudo,$id]
        );
    }

    /**
     * Modifier le mot de passe d'un utilisateur
     */
    public function editMdp(string $mail) : bool
    {
        $cnx=new Database();
        return $cnx->edit(
            "UPDATE `users` SET `password`=? WHERE mail = ?",
            [$this->password, $mail]
        );
    }

    /**
     * Supprimer un utilisateur
     *
     * @param int $id_user
     * @return bool
     */
    public static function delete(int $id_user) : bool
    {
        $cnx = new Database();
        return $cnx->delete(
            "DELETE FROM `users` WHERE id=?",
            [$id_user]
        );
    }

    /**
     * Sécurise les données d'un formulaire
     *
     * @param [type] $donnee
     * @return void
     */
    public static function securisation($donnee)
    {
        $donnee=trim($donnee);
        $donnee=stripslashes($donnee);
        $donnee=strip_tags($donnee);
        $donnee=htmlentities($donnee);
        // $donnee=htmlspecialchars($donnee);

        return $donnee;
    }

    
};
