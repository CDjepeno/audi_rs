<?php

class Session
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    /**
     * Création d'un utilisateur
     * @param User $u
     * @return void
     */
    public function login(Users $u) : void
    {
        $_SESSION["user"] = [
            "id" => $u->getId(),
            "email" => $u->getMail(),
            "logged" => true,
            "role" => $u->getRole(),
            "activated" => $u->getIs_activated(),
            "pseudo" => $u->getPseudo()
        ];
    }

    /**
     * Fonction permettant de déconnecter un utilisateur.
     * @return void
     */
    public function logout() : void
    {
        if(isset($_SESSION["user"]))
        {
            unset($_SESSION["user"]);
        }

    }

    /**
     * Fonction permettant de vérifier si un utilisateur est logger.
     * @return bool
     */
    public static function isLogged() : bool
    {
        if(isset($_SESSION["user"]) && !is_null($_SESSION["user"])){
            if ($_SESSION['user']["logged"]){
                return true;
            }
        }
        return false;
    }

    /**
     * Fonction permettant de Vérifier si un utilisateur est un admin
     * @return bool
     */
    public function isAdmin() : bool
    {
        if(isset($_SESSION["user"]) && !is_null($_SESSION["user"])){
            if ($_SESSION['user']["logged"] && $_SESSION['user']["role"]=="admin"){
                return true;
            }
        }
        return false;
    }

 

}