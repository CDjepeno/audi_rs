<?php
require_once "vendor/autoload.php";

// Ont vérifie ici l'action envoyer par l'url pour effectuer une action précise
if(isset($_GET["class"]) && isset($_GET["action"]))
{
    $class = ucfirst(strtolower($_GET["class"]))."Controller";

    $controller = new $class();

    $method = $_GET["action"];

    if(method_exists($class, $method)) {
        $controller->$method();
    }else {
        (new DefaultController())->index();
    }

// Par default en envoi sur la page d'acceuil.
}else
{
    (new DefaultController())->index();
}

