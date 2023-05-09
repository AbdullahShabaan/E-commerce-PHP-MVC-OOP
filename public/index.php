<?php
namespace phpmvc ;
use phpmvc\lib\front2 ;
use phpmvc\controller\front3 ;
use phpmvc\lib\frontcontroller ;
//use Rakit\Validation\Validator;

    require "../" . "app/conf.php" ;
    require "../" . "app/db/conn.php";
    require APP . DS . "lib" ."/autoload.php" ;
    // require_once ("../vendor/autoload.php") ;



$o1 = new frontcontroller () ;
$o1-> dispatch () ;
//$o2 = new front2 () ;
//$o3 = new front3 () ;
//$o4 = new \phpmvc\db\conn () ;
//echo ROOTT ;
//echo "<br>";
//echo APP ;


?>