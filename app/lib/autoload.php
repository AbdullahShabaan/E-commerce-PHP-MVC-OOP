<?php
namespace phpmvc\lib ;
require('../vendor/autoload.php');
//use Rakit\Validation\Validator;
//$validator = new Validator;

spl_autoload_register (function ($className) {
        $className = strtolower ($className);
        $className = str_replace ("phpmvc" , "" , $className)  ;
//        $className = str_replace ("\\" , DS , $className)  ;
        $className = $className . ".php";
    
//        echo APP . $className ;

        if (file_exists (APP . $className)) {
            require_once APP . $className ;
        }
});

  














