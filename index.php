<?php
require_once "vendor/autoload.php";
require_once "utilities/AbstractController.php";


require_once "utilities/config.php";
require_once "utilities/Database.php";
require_once "utilities/Session.php";

require_once "modeles/Category.php";
require_once "modeles/Product.php";
require_once "modeles/Users.php";
require_once "modeles/Contact.php";
require_once "modeles/Order.php";
require_once "modeles/OrderDetails.php";


require_once "utilities/AbstractController.php";
require_once "controllers/DefaultController.php";
require_once "controllers/ProductController.php";
require_once "controllers/UsersController.php";
require_once "controllers/ContactController.php";
require_once "controllers/OrderController.php";



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

