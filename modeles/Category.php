<?php

class Category
{
    private $id;
    private $name;
 

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = htmlentities($name);

        return $this;
    }


    /**
     * Ajoute une catégory a la BDD
     *
     * @return boolean
     */
    public function add() : bool
    {
        $cnx=new DataBase();
        $result=$cnx->insert(
            "INSERT INTO category(`name`, `description`) VALUES (?,?)",
            [$this->name,$this->description]
        );
        return $result;
    }

    /**
     * Edit une catégorie dans la BDD
     *
     * @return boolean
     */
    public function edit() : bool
    {
        $cnx=new Database();
        $result=$cnx->edit(
            "UPDATE category SET `name`=?, `description`=? WHERE id=?",
            [$this->name,$this->description,$this->id]
        );
        return $result;
    }

    /**
     * Récupère une category par sont id dans la BDD
     *
     * @param integer $id
     * @return Category
     */
    public static function getCategoryById(int $id) : Category
    {
        $cnx=new Database();
        $result=$cnx->selectOne(
            "Category",
            "SELECT * FROM category WHERE id=?",
            [$id]
        );
        return $result;
    }
   
    /**
     * Supprime une catégory dans la BDD
     *
     * @param integer $idCategory
     * @return boolean
     */
    public static function delete(int $idCategory) : bool 
    {
        $cnx=new Database();
        $result=$cnx->delete(
            "DELETE FROM product WHERE idCategory=?",
            [$idCategory]
        );
    }

    /**
     * Récupération de toutes les catégory dans la BDD
     *
     * @return array
     */
    public static function list() : array
    {
        $cnx=new Database();
        $result=$cnx->selectMany(
            "Category",
            "SELECT * FROM category"
        );
        return $result;
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