<?php

class OrderDetails
{
    private $id;
    private $n_commande;
    private $id_product;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of idOrder
     */ 
    public function getN_Commande()
    {
        return $this->n_commande;
    }

    /**
     * Set the value of idOrder
     *
     * @return  self
     */ 
    public function setN_Commande($n_commande)
    {
        $this->n_commande = $n_commande;

        return $this;
    }

    /**
     * Get the value of id_product
     */ 
    public function getId_product()
    {
        return $this->id_product;
    }

    /**
     * Set the value of id_product
     *
     * @return  self
     */ 
    public function setId_product($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }

    
    /**
     * récupération de toutes les informations qui font partie d'une commande
     *
     * @param [type] $Order_id
     * @return array
     */
    public static function getByOrderId(int $n_commande) : array 
    {
        $cnx=new Database();
        $result=$cnx->selectMany(
            "OrderDetails",
            "SELECT `name`
            FROM `product` AS p
            JOIN `orderdetails` AS o
            ON p.id = o.id_product
            WHERE `n_commande` LIKE ?",
            [$n_commande]
        );
        return $result;
    }

    /**
     * ajouter a bd les informations d'un des produits qui font partie de la commande
     *
     * @return boolean
     */
    public function add() : bool 
    {
        $cnx=new Database();
        $result=$cnx->insert(
            "INSERT INTO `orderdetails` (`n_commande`,`id_product`) VALUES (?,?)",
            [$this->n_commande,$this->id_product]
        );
        // return $result;
        if($result == false)
        {
            return 0;
        }

        return $cnx->getLastId();
    }

    public function getNameByCar() 
    {
        $cnx=new Database();
        $result=$cnx->selectOne(
            "OrderDetails",
            "SELECT `id_product` `name` FROM `orderdetails` AS o JOIN `product` AS p ON p.id = o.id_product"
        );
    }

   
}