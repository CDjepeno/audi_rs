<?php

    function my_autoloader($className) {   

        if(file_exists("utilities/$className.php")) {

            require_once "utilities/$className.php";
            
        } elseif(file_exists("modeles/$className.php")) {
            
            require_once "modeles/$className.php";
            
        } elseif(file_exists("controllers/$className.php")) {

            require_once "controllers/$className.php";

        } else {
            throw new Exception("Cette class $className n'existe pas");
        }   
        
    }
    spl_autoload_register("my_autoloader");


require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInitd2890cf5d57feecce25958452d2702f0::getLoader();
