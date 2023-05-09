<?php 
namespace phpmvc\model ;
use phpmvc\core\model ; 

class user extends model {
    
//    public function users () {
//        global $conn ;
//        $stmt = $conn->prepare ("select * from bonus ") ;
//        $stmt->execute () ;
//        $row = $stmt->fetchAll () ;
//        return $row ;
//    }
//    
    public function getuser ($name , $pass) {
        global $conn ;
        $stmt = $conn->prepare ("select * from users where  user_ar_name = ? and password =?") ;
        $stmt->execute (array ($name , $pass)) ;
        $row = $stmt->fetch() ;
        $count = $stmt->rowCount () ;
        return $count ;
        
    }
    
      public function setuser ($name , $pass) {
        global $conn ;
        $stmt = $conn->prepare ("insert into user (name , pass) values (:namee , :passs)") ;
        $stmt->execute (array ("namee" => $name , "passs" => $pass)) ;
        $conut = $stmt->rowCount() ;
        return $conut ;
        
    }
    
//    
//    public function get () {
//        
//        global $conn ;
//        $stmt = $conn->prepare ("select * from bonus ") ;
//        $stmt->execute () ;
//        $row = $stmt->fetchAll () ;
//       
//        return $row ;
//    }
//    
     public function get2 () {
        
        global $conn ;
        $stmt = $conn->prepare ("select * from users ") ;
        $stmt->execute () ;
        $row = $stmt->fetchAll () ;
       
        return $row ;
    }
    
    public function get3 ($id) {
        
        global $conn ;
        $stmt = $conn->prepare ("select * from users where user_id = ?") ;
        $stmt->execute (array($id)) ;
        $row = $stmt->fetchAll () ;
       
        return $row ;
    }
    
    public function update ($name , $pass , $e_mail , $full_name , $address  , $id  , $img) {
        
        global $conn ;
        $stmt = $conn-> prepare ("update users set user_ar_name = ? , password = ? , e_mail = ? , full_name = ? , address = ? , image = ? where user_id =? ");
        $stmt -> execute (array ($name , $pass , $e_mail , $full_name , $address  , $img , $id  )) ;
        $count = $stmt -> rowCount () ;
        return $count ; 
    }
    
    public function getphoto ($id) {
        global $conn ;
        $stmt = $conn->prepare ("select user_ar_name , image from users where user_id = ? ") ;
        $stmt->execute (array ($id)) ;
        $row = $stmt->fetchAll () ;
       
        return $row ;
    }
    
//    public function set () {
//        global $conn ;
//        
//        $stmt = $conn->prepare ("select * from bonus ") ;
//        $stmt->execute () ;
//        $row = $stmt->fetchAll () ;
//        
//        return $row ;
//    }
}