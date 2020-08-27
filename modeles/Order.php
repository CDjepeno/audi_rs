<?php

class Order 
{
    private $n_commande;
    private $order_date;
    private $status;
    private $shipped_date;
    private $total;
    private $user_id;
    private $nbcommande;

    /**
     * Get the value of N_Commande
     */ 
    public function getN_commande()
    {
        return $this->n_commande;
    }

     /**
     * Get the value of order_date
     */ 
    public function getOrder_date()
    {
        return $this->order_date;
    }

    /**
     * Set the value of order_date
     *
     * @return  self
     */ 
    public function setOrder_date($order_date)
    {
        $this->order_date = $order_date;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of shipped_date
     */ 
    public function getShipped_date()
    {
        return $this->shipped_date;
    }

    /**
     * Set the value of shipped_date
     *
     * @return  self
     */ 
    public function setShipped_date($shipped_date)
    {
        $this->shipped_date = $shipped_date;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of idClient
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of idClient
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = htmlentities($user_id);

        return $this;
    }

      /**
     * Get the value of nbcommande
     */ 
    public function getNbcommande()
    {
        return $this->nbcommande;
    }

    /**
     * Set the value of nbcommande
     *
     * @return  self
     */ 
    public function setNbcommande($nbcommande)
    {
        $this->nbcommande = $nbcommande;

        return $this;
    }


    /**
     * inserer un commande a la base de donnée
     *
     * @return int
     */
    public function add() : int
    {
        $cnx= new Database();
        $result=$cnx->insert(
            "INSERT INTO `order` (`total`,`user_id`) VALUES (?,?)",
            [$this->total,$this->user_id]
        );
        if($result == false)
        {
            return 0;
        }
        return $cnx->getLastId();
    }   


    /**
     * Récupération des commandes d'un seul utilisateur
     * 
     * @param int $id_user
     * @return array
     */
    public static function getByUser(int $id):array 
    {
        $cnx = new Database();
        return $cnx->selectMany(
            "Order",
            "SELECT * FROM `order` WHERE `user_id` LIKE  ?",
            [$id]
        ); 
    }

    
    /**
     * modification du status de la commande
     *
     * @param integer $id
     * @return boolean
     */
    public static function editStatus(int $id) : bool 
    {
        $cnx=new Database();

        try {
            // récupération de la date actuelle avec le fuseau horraire de paris
            $date = new DateTime('now', new DateTimeZone('Europe/Paris'));

            // Convertir l'objet en chaine de caractère
            // formater la date selon le format supporté par SQL
            $shipped_date = $date->format('Y-m-d H:i:s');
        }catch (Exception $e){
            echo $e->getMessage();
            exit();
        }
        
        return $cnx->edit(
            "UPDATE order set `status`=?,`shipped_date`=? WHERE id = ?",
            ["livré",$shipped_date ,$id]
            //date au format sql pour shipped date
        );
    }


    /**
     * Récupération de toutes les commandes
     */
    public static function getAll() : array
    {
        $cnx = new Database();
        return $cnx->selectMany(
            "Order",
            "SELECT * FROM `order`"
        );
    }

    /**
     * Récupère le nombre de commande pour un utilisateur
     *
     * @param integer $user_id
     * @return void
     */
    public static function getCountOrder(int $user_id) 
    {
        $cnx = new Database();
        return $cnx->selectOne(
            "Order",
            "SELECT COUNT(`n_commande`) as nbcommande FROM `order` WHERE `user_id`= ? ",
            [$user_id]
        );
    }

  

  

  

  

  
}