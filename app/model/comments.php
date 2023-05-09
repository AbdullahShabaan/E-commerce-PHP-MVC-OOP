<?php
namespace phpmvc\model ;

use phpmvc\core\model ;

class comments {
    
    public function commentV1 ($id) {
        
        global $conn ;
        $stmt = $conn->prepare ("
        select *  
        from comments
    
        where id = ?   
        ");
        $stmt->execute (array ($id)) ;
        $row = $stmt->fetchAll() ;
        return $row ;
    
    }
    
      public function addComment ( $desc ,  $user , $item ) {
        global $conn ;
        $stmt = $conn -> prepare ("insert into comments ( description , user_id , item_id) VALUES (:descriptionn ,  :user_idd , :item_idd ) ");
        $stmt -> execute (array ('descriptionn' => $desc ,  'user_idd' => $user , 'item_idd' => $item )) ;
        $count = $stmt->rowCount () ;
        return $count ;
        
      }
    
    
      public function itemcomment ($id) {
        global $conn ;
        $stmt = $conn->prepare ("
       select comments.* , items.id , items.name as itemName , members.name as userName , members.img as image
        from comments
        inner join items 
        on comments.item_id = items.id
        inner join members
        on comments.user_id = members.id
        where items.id = ? 
        ");
        $stmt->execute (array ($id)) ;
        $row = $stmt->fetchAll() ;
        return $row ;
      }
    
      public function usercomment ($id) {
        
        global $conn ;
        $stmt = $conn->prepare ("
        select comments.* , members.img as userImg , items.name as items 
        from comments
        inner join members
        on members.id = comments.user_id
        inner join items
        on items.id = comments.item_id
        where comments.user_id = ? 
        ");
        $stmt->execute (array ($id)) ;
        $row = $stmt->fetchAll() ;
        return $row ;
    
    }
    
    
     public function counts () {
        global $conn ;
        $stmt = $conn->prepare("SELECT COUNT(id) FROM comments ;");
        $stmt-> execute () ;
        $row = $stmt->fetchColumn () ;
        return $row ;
    }
    
    
    public function getcomments ($limit = null ) {
        
        global $conn ;
        $stmt = $conn->prepare ("select comments.* , members.name as user , members.img as imgUser , items.name
        from comments
        inner join members
        on members.id = comments.user_id
        inner join items
        on items.id = comments.item_id
        order by id DESC 
        $limit 
        ");
        $stmt->execute () ;
        $row = $stmt->fetchAll() ;
        return $row ;
    
    }
    
     public function delete ($id) {
        global $conn ;
        $stmt = $conn->prepare ('delete from comments where id = ?');
        $stmt->execute (array ($id)) ;
        $count = $stmt->rowCount () ;
        return $count ;
    }
    
     public function edit ($comment , $user , $item , $id) {
        global $conn ;
        $stmt = $conn->prepare ("update comments set description = ? , user_id = ? , item_id = ? where id = ? ") ;
        $stmt->execute (array($comment , $user , $item , $id)) ;
        $count = $stmt->rowCount () ;
        return $count ;
        
    }
}