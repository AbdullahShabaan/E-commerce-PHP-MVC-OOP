<?php
namespace phpmvc\model ;
use phpmvc\core\model ;

class category extends model {
    
      public function get ($limit = null) {
        global $conn ;
        $stmt = $conn->prepare ("select * from category $limit ");
        $stmt->execute () ;
        $row = $stmt->fetchAll() ;
        return $row ;
    }
    
    public function gets ($id , $name) {
        global $conn ;
        $stmt = $conn->prepare ("select * from category where id = ? AND name != ?");
        $stmt->execute (array ($id , $name)) ;
        $count = $stmt->rowCount() ;
        return $count ;
    }
    
    public function getforitems ($id ) {
        global $conn ;
        $stmt = $conn->prepare ("select * from category where id = ? ");
        $stmt->execute (array ($id)) ;
        $row = $stmt->fetchAll() ;
        return $row ;
    }
    
    public function getcat () {
        global $conn ;
        $stmt = $conn->prepare 
        ('    
            select category.* , users.user_ar_name 
            from category
            inner join users 
            on users.user_id = category.user_id; 
            
        ') ;
        $stmt->execute () ;
        $data = $stmt->fetchAll() ;
        return $data ;
    }
    
        public function getcatforupdate ($id) {
        global $conn ;
        $stmt = $conn->prepare 
        ('    
            select category.* , users.user_ar_name 
            from category
            inner join users 
            on users.user_id = category.user_id
            where id = ?
            ; 
            
        ') ;
        $stmt->execute (array($id)) ;
        $data = $stmt->fetchAll() ;
        return $data ;
    }
    
    
    
    public function delete ($id) {
        global $conn ;
        $stmt = $conn->prepare ('delete from category where id = ?');
        $stmt->execute (array ($id)) ;
        $count = $stmt->rowCount () ;
        return $count ;
    }
    
    public function edit ($name , $newid , $date , $img  , $desc ,  $user , $id) {
        global $conn ;
        $stmt = $conn->prepare ("update category set name = ? , id = ? , date = ? , img = ? , description =? , user_id = ? where id = ? ") ;
        $stmt->execute (array($name , $newid , $date , $img , $desc , $user , $id)) ;
        $count = $stmt->rowCount () ;
        return $count ;
        
    }
    
    public function add ( $name , $desc ,  $img , $user) {
        global $conn ;
        $stmt = $conn -> prepare ("insert into category ( name , description , img , user_id ) VALUES (:namee , :descriptionn ,  :imgg , :user_idd)");
        $stmt -> execute (array ('namee' => $name , 'descriptionn' => $desc ,  'imgg' => $img , 'user_idd' => $user )) ;
        $count = $stmt->rowCount () ;
        return $count ;
        
    }
    
    public function counts () {
        global $conn ;
        $stmt = $conn->prepare ("SELECT COUNT(id) FROM category");
        $stmt -> execute () ;
        $row = $stmt->fetchColumn() ;
        return $row ;
    }
    
    
}

?>