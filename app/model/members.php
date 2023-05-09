<?php
namespace phpmvc\model ;
use phpmvc\core\model ;

class members {
    
    public function checkPending ($id) {
        global $conn ;
        $stmt = $conn -> prepare ("
        select * 
        from members
        where id = ? and reg_status = 1
        ") ;
        $stmt->execute (array ($id)) ;
        $count = $stmt -> rowCount () ;
        return $count ;  
    }
    
    
      public function getUserV1 () {
        global $conn ;
        $stmt = $conn -> prepare ("
        select * 
        from members
        
        ") ;
        $stmt->execute () ;
        $row = $stmt -> fetchAll () ;
        return $row ;
        
    }
    
    public function signUp ($name , $pass , $email , $full_name) {
        
        global $conn ;
        $stmt = $conn -> prepare ("
        
        insert into members 
        ( name  , password , e_mail , full_name  ) 
        VALUES 
        (:nname  , :ppassword , :ee_mail , :ffull_name )");
        
        $stmt -> execute (array 
                                (
            "nname" => $name ,
            "ppassword" => $pass  , 
            "ee_mail" => $email , 
            "ffull_name" =>$full_name 
                                    
                                )
                         ) ;
        $count = $stmt->rowCount () ;
        return $count ;
        
    }
    
    public function profiledata ($name)  {
        global $conn ;
        $stmt = $conn -> prepare ("
SELECT members.* ,
items.name as itemName ,
items.id as itemId ,
items.approve_status as approve ,
items.description as itemDesc ,
items.price as itemPrice ,
items.img as itemImg ,
items.date as itemDate ,
items.made_in as itemMadeIn 
FROM members 
LEFT JOIN items
ON items.user_id = members.id
WHERE members.name = ?
GROUP BY items.id 

                                ");
        
        $stmt -> execute (array ($name)) ;
        $data = $stmt->fetchAll () ;
        return $data ;
    }
    
    public function getmembers ($order = null) {
        global $conn ;
        $stmt = $conn -> prepare ("select * from members where admin_status = 0 order by id $order ");
        $stmt -> execute () ;
        $data = $stmt->fetchAll () ;
        return $data ;
    }
    
      public function membersForUpdate ($id , $fetch = "fetchAll") {
        global $conn ;
        $stmt = $conn -> prepare ("select * from members where id = ? ");
        $stmt -> execute (array ($id)) ;
        $data = $stmt->$fetch () ;
        return $data ;
    }
    
    
    public function addmember ( $name  , $password , $e_mail , $reg_status , $address , $full_name , $img) {
        global $conn ;
        $stmt = $conn -> prepare ("
        
        insert into members 
        ( name  , password , e_mail , reg_status , address , full_name , img ) 
        VALUES 
        (:nname  , :ppassword , :ee_mail , :rreg_status , :aaddress , :ffull_name , :iimg)");
        
        $stmt -> execute (array 
                                (
            "nname" => $name ,
            "ppassword" => $password  , 
            "ee_mail" => $e_mail , 
            "rreg_status" => $reg_status , 
            "aaddress" => $address , 
            "ffull_name" =>$full_name ,
            "iimg" => $img 
                                )
                         ) ;
        $count = $stmt->rowCount () ;
        return $count ;
        
        
    }
    
    public function updatemember ( 
        $name  , 
        $password ,
        $e_mail ,
        $address , 
        $full_name ,
        $img , 
        $id                       )
                                                {
        global $conn ;
        $stmt = $conn -> prepare ("
        
        update members set
         name = ?  , password = ? , e_mail = ? , address = ? , full_name = ? , img = ?  
         where id = ?
                                 ");
        
        $stmt -> execute (array( $name  ,$password  , $e_mail , $address , $full_name , $img , $id )) ;
        $count = $stmt->rowCount () ;
        return $count ;
        
        
    }
    
       
    public function delete ($id) {
        global $conn ;
        $stmt = $conn->prepare ('delete from members where id = ?');
        $stmt->execute (array ($id)) ;
        $count = $stmt->rowCount () ;
        return $count ;
    }
    
    public function counts ($where = null ) {
        global $conn ;
        $stmt = $conn->prepare("SELECT COUNT(id) FROM members $where ;");
        $stmt-> execute () ;
        $row = $stmt->fetchColumn () ;
        return $row ;
    }
    

    
    public function pending () {
         global $conn ;
        $stmt = $conn -> prepare ("select * from members where admin_status = 0 And reg_status = 0 order by id ");
        $stmt -> execute () ;
        $data = $stmt->fetchAll () ;
        return $data ;
    }
    
    public function activate ($id) {
        global $conn ;
        $stmt = $conn -> prepare ("update members set reg_status = 1 where id = ? ");
        $stmt -> execute (array ($id)) ;
        $count = $stmt-> rowCount () ;
        return $count ;
    }
    

    public function checklog ($name , $pass) {
        global $conn ;
        $stmt = $conn -> prepare ("select * from members where name = ? and password = ? ");
        $stmt -> execute (array ($name , $pass)) ;
        $count = $stmt-> rowCount () ;
        return $count ;
    }
    
    public function getID ($name) {
        global $conn ;
        $stmt = $conn -> prepare ("select id from members where name = ? ");
        $stmt -> execute (array ($name)) ;
        $row = $stmt-> fetchColumn () ;
        return $row ;
    }
}

?>