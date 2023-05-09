<?php

    
define ("DS" , DIRECTORY_SEPARATOR); 
define ("APP" , dirname(realpath(__FILE__)));
define ("ROOT" , dirname(realpath(__DIR__)));
define ("PUBLIC_VIEW" , ROOT . DS."public" . DS) ;
define ( "ROOTT" , str_replace ("\\" , "/" , PUBLIC_VIEW) );
define ("DOMAIN_NAME" , "http://news.test") ;
define ("CSS_PATH" , DOMAIN_NAME . "/");

//define ("CONTROLLER" , APP . DS . "controller");
define ("VIEW" , APP . DS . "view");
//define ("MODEL" , APP . DS . "model");
//define ("LIB" , APP . DS . "lib");
//echo CONTROLLER . "<br>" . VIEW . "<br>" . MODEL . "<br>" . LIB ;