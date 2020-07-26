<?php

class Product
{
    private $id;
    private $id_category;
    private $id_user;
    private $name;
    private $path;
    private $description;
    private $buy_price;
    private $created_at;
    private $edited_at;
    private $COUNT;
    private $nombre;



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of id_category
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setId_category($id_category)
    {
        $this->id_category =htmlentities($id_category);

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = htmlentities($id_user);

        return $this;
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
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = htmlentities($path);

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = htmlentities($description);

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
     * Get the value of buy_price
     */ 
    public function getBuy_price()
    {
        return $this->buy_price;
    }

    /**
     * Set the value of buy_price
     *
     * @return  self
     */ 
    public function setBuy_price($buy_price)
    {
        $this->buy_price = htmlentities($buy_price);

        return $this;
    }

    /**
     * Get the value of COUNT
     */ 
    public function getCOUNT()
    {
        return $this->COUNT;
    }

    /**
     * Set the value of COUNT
     *
     * @return  self
     */ 
    public function setCOUNT($COUNT)
    {
        $this->COUNT = $COUNT;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Crée une representation textuelle de l'objet name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Ajouter un produit a la base de donnée
     *
     * @return boolean
     */
    public function add() : bool
    {
        $cnx=new Database();
        return $cnx->insert(
            "INSERT INTO `product` (`id_category`,`id_user`,`path`,`name`,`description`,`buy_price`) VALUE (?,?,?,?,?,?)",
            [$this->id_category,$this->id_user,$this->path,$this->name,$this->description,$this->buy_price]
        );
    }

    /**
     * Modifier un produit
     *
     * @return boolean
     */
    public function edit(int $id) : bool
    {
        $cnx=new Database();
        return $cnx->edit(
            "UPDATE `product` SET id_category= ?, `name`= ?, `description`= ?, buy_price= ?, `path`=?  WHERE id = ?",
            [$this->id_category, $this->name, $this->description, $this->buy_price,$this->path, $id]
        );
    }

    
    /**
     * récupération d'un produit par un identifiant sous forme d'objet
     *
     * @param [type] $id
     * @return Product|null
     */
    public static function getProductById(int $id) : ?Product
    {
        $cnx=new Database();
        return $cnx->selectOne(
            "Product",
            "SELECT * FROM `product` WHERE id = ?",
            [$id]
        );
    }

      
    /**
     * récupération de toutes les informations qui font partie d'une commande
     *
     * @param [type] $n_commande
     * @return array
     */
    public static function getByOrderId(int $n_commande) : array 
    {
        $cnx=new Database();
        return $cnx->selectMany(
            "Product",
            "SELECT *
            FROM `product` AS p
            JOIN `orderdetails` AS o
            ON p.id = o.id_product
            WHERE `n_commande` LIKE ?",
            [$n_commande]
        );
    }

    /**
     * supprimer le véhicule d'un utilisateur
     *
     * @param [type] $id
     * @return boolean
     */
    public static function delete(int $id) : bool
    {
        $cnx=new Database();
        return $cnx->delete(
            "DELETE FROM product WHERE id LIKE ?",
            [$id]
        );
    }

    /**
     * Récupération de tous les produits qui appartienne à une catégory
     *
     * @param [type] $idCategory
     * @return array
     */
    public static function getProductsByCategory(int $idCategory) : array
    {
        $cnx=new Database();
        return $cnx->selectMany(
            "Product",
            "SELECT * FROM product WHERE id_category=?",
            [$idCategory]
        );
    }

    /**
     * récupére un produit qui as le nom passé en paramètre
     *
     * @param string $name
     * @return array
     */
    public static function getProductsByName(string $name) : array
    {
        $cnx=new Database();
        return $cnx->selectOne(
            "Product",
            "SELECT * FROM product WHERE `name=?`",
            [$name]
        );
    }

    /**
     * Récupère tous les véhicules en vente d'un utilisateur
     *
     * @param integer $idUser
     * @return array
     */
    public static function getProductByIdUser(int $idUser) : array
    {
        $cnx=new Database();
        return $cnx->selectMany(
            "Product",
            "SELECT * FROM product WHERE id_user like ?",
            [$idUser]
        );
    }

    /**
     *récupère les produits 9 produits qui vont être affichés sur la page d'acceuil par ordre de création
     *
     * @return array
     */
    public static function getProductsInIndex() : array
    {
        $cnx = new Database();
        return $cnx->selectMany(
            "Product",
            "SELECT * FROM product ORDER BY created_at DESC LIMIT 9"
        );
    }
    
    /**
     * récupération de tous les produits par ordre de création
     *
     * @return array
     */
    public static function getAll() : array
    {
        $cnx = new Database();
        return $cnx->selectMany(
            "Product",
            "SELECT * FROM product ORDER BY createdAt"
        );
    }

    /**
     * Récupère le nombre de véhicule pour un utilisateur
     *
     * @param integer $user_id
     * @return void
     */
    public static function getCountProduct(int $user_id) 
    {
        $cnx = new Database();
        return $cnx->selectOne(
            "Product",
            "SELECT COUNT(`id`) as nombre  FROM `product` WHERE `id_user`= ? ",
            [$user_id]
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