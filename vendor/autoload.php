<?php

class Autoloader {

    // public static function start() {
    //     spl_autoload_register(array(__CLASS__,'Class'));
    // }
    public static function Class() {   
        
        // $file_modeles = '/Applications/XAMPP/xamppfiles/htdocs/audi_rs/modeles';
        // $file_controllers = '/Applications/XAMPP/xamppfiles/htdocs/audi_rs/controllers'; 
        
        // if(file_exists($file_modeles)) {
            spl_autoload_register(function($className){
            require_once "modeles/$className.php";});
            
            // { 
            //     spl_autoload_register(function($className){
            //         // dd($className);
            //     $className = str_replace("\\","/",$className);
            //     require_once "modeles/$className.php"; 
            // });
            // }  
            // else {
            //     spl_autoload_register(function($className){
            //         $className = str_replace("\\","/",$className);    
            //         require_once "controllers/$className.php";
            // }
        
        // }else if(File_exists($file_controllers)) {
            
        //     spl_autoload_register(function($className){
        //         $className = str_replace("\\","/",$className);    
        //         require_once "controllers/$className.php";
        //     });
        // };
    }


}


require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInitd2890cf5d57feecce25958452d2702f0::getLoader();
