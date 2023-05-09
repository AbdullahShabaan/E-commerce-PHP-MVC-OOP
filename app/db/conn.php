<?php

//namespace phpmvc\db ;
//
//class conn {
//    
//  public function __construct()  { 
      
$dsn = "mysql:host=localhost;dbname=db";
$user = "root";
$pass = "";
$options = array (
    
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    
);

try {
    
    $conn = new PDO ($dsn , $user , $pass , $options); 
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
//    echo "connected";
}

catch (PDOException $e) {
    echo "faill " .  $e->getmessage() ;
}

//}
//}
?>