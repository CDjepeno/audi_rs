<?php

class Autoloader {

    public static function Class() {   
        
        spl_autoload_register(function($className){
        require_once "modeles/$className.php";});
    
    }


}

require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInitd2890cf5d57feecce25958452d2702f0::getLoader();
