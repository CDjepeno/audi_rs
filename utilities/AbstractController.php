<?php


abstract class AbstractController
{
    /**
     * fonction permettant de faire une action et la renvoyer vers une vue
     *
     * @param string $path
     * @param array $params
     * @return void
     */ 
    public function renderView(string $path, $params=[])
    {
        foreach ($params as $key => $value) 
        {
            $$key = $value;
        }
        include_once "views/$path.php";
    }  
         
    /**
     * fonction permettant de rediriger vers la vue correspondante
     *
     * @param string $path
     * @return void
     */
    public function redirectTo(string $path)
    {
        header("Location: $path.php");
        exit;
    }
}
