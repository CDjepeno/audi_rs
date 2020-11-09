<?php



class Database
{
    private $cnx;
  
    public function __construct()
    {
        require_once "config.php";
        try {
            $this->cnx= new PDO("mysql:host=".DATABASE['host'].";dbname=".DATABASE['dbname'].";charset=utf8", DATABASE['username'], DATABASE['password']);
         } catch (PDOException $error) {
             echo $error->getMessage();
             exit;
         }
    }

    /**
     * Retourne un objet
     *
     * @param string $class
     * @param string $requete
     * @param array $params
     * @return void
     */
    public function selectOne(string $class ,string $requete, array $params = [])
    {
        $stmt = $this->cnx->prepare($requete);
        $stmt -> execute($params);
        $stmt -> setFetchMode(PDO::FETCH_CLASS, $class);
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * Retourne plusieurs objets
     *
     * @param string $class
     * @param string $requete
     * @param array $params
     * @return void
     */
    public function selectMany(string $class ,string $requete, array $params = [])
    {
        $stmt= $this->cnx->prepare($requete);
        $stmt->execute($params);
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $result = $stmt->fetchAll();
        
        return $result;
    }

    /**
     * Insert des informations dans la base de donnée.
     *
     * @param string $requete
     * @param array $params
     * @return void
     */
    public function insert(string $requete, array $params)
    {
        $stmt   = $this->cnx->prepare($requete);
        $result = $stmt->execute($params);
        
        return $result;
    }
    
    /**
     * Récupère l'identifiant de la dernière ligne insérée ou la valeur d'une séquence.
     *
     * @return void
     */
    public function getLastId()
    {
        return $this->cnx->lastInsertId();
    }
   
    /**
     * Supprime une data dans la base de donnée
     *
     * @param string $requete
     * @param array $params
     * @return void
     */
    public function delete(string $requete, array $params)
    {
        $stmt = $this->cnx->prepare($requete);
        return $stmt->execute($params);
    }

    /**
     * Modifie une data dans la base de donnée
     *
     * @param string $requete
     * @param array $params
     * @return void
     */
    public function edit(string $requete, array $params)
    {
        $stmt = $this->cnx->prepare($requete);
        return $stmt->execute($params);
    }

    
    public function __destruct()
    {
        $this->cnx = null;
    }


}


