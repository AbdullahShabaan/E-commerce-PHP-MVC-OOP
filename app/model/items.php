<?php
namespace phpmvc\model ;

use phpmvc\core\model ;

class items {
    
     public function counts () {
        global $conn ;
        $stmt = $conn->prepare("SELECT COUNT(id) FROM items  ;");
        $stmt-> execute () ;
        $row = $stmt->fetchColumn () ;
        return $row ;
    }
    
    public function getitemsV1 () {
        global $conn ;
        $stmt = $conn -> prepare ("
        select * 
        from items
        
        ") ;
        $stmt->execute () ;
        $row = $stmt -> fetchAll () ;
        return $row ;
        
    }
    
    
    public function getitems ($sort = null) {
        global $conn ;
        $stmt = $conn -> prepare ("
        select items.* , category.name as catname , members.name as user
        from items
        inner join category 
        on items.cat_id = category.id
        inner join members
        on items.user_id = members.id
         $sort
        ") ;
        $stmt->execute () ;
        $row = $stmt -> fetchAll () ;
        return $row ;
        
    }
    
       public function getitemsforupdate ($id , $cat = "id") {
        global $conn ;
        $stmt = $conn -> prepare ("
        select items.* , category.name as catName , members.name as memberName 
        from items
        inner join category 
        on items.cat_id = category.id
        inner join members 
        on items.user_id = members.id
        where items.$cat = ? 
        ") ;
        $stmt->execute (array ($id)) ;
        $row = $stmt -> fetchAll () ;
        return $row ;
        
    }
    

    
    public function additem ($name , $desc , $price , $cat , $user , $approve , $status , $img , $made_in ) {
         global $conn ;
        $stmt2 = $conn -> prepare (
            "insert into items 
            (
            name , 
            description , 
            price , 
            cat_id , 
            user_id ,
            approve_status ,
            status , 
            img , 
            made_in
            )
            
            VALUES
            
            (
            :nname ,
            :ddescription ,
            :pprice ,
            :ccat_id , 
            :uuser_id ,
            :aaprove_status , 
            :sstatus , 
            :iimg , 
            :mmade_in 
            )"
        ) ;
        $stmt2 -> execute (array ('nname' => $name , 'ddescription' => $desc , 'pprice' => $price , 'ccat_id' => $cat , 'uuser_id' => $user , 'aaprove_status' => $approve , 'sstatus' => $status  , 'iimg' => $img , 'mmade_in' => $made_in )) ;
   
        $count = $stmt2->rowCount () ;
        return $count ;
    }
    
    public function approve ($id) {
        global $conn ;
        $stmt = $conn -> prepare ("update items set approve_status = 1 where id = $id ") ;
        $stmt->execute () ;
        $count = $stmt -> rowCount () ;
        return $count ;
    }
    
     public function delete ($id) {
        global $conn ;
        $stmt = $conn -> prepare ("delete from items where id = $id ") ;
        $stmt->execute () ;
        $count = $stmt -> rowCount () ;
        return $count ;
    }
    public function updateitem ($name , $desc , $price , $cat , $user , $status , $img , $made_in , $id ) {
        global $conn ;
        $stmt = $conn->prepare ("update items set name = ? , description = ? , price = ? , cat_id = ? , user_id = ? , status = ? , img = ? , made_in = ? where id = ? ") ;
        $stmt->execute (array($name , $desc , $price , $cat , $user , $status , $img , $made_in , $id )) ;
        $count = $stmt->rowCount () ;
        return $count ;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}







