<?php
namespace phpmvc\controller ;
ob_start () ;
use phpmvc\core\controller ;
use phpmvc\core\session ;
use phpmvc\core\helper ;
use phpmvc\model\user ;
use phpmvc\model\category ;
use phpmvc\model\members ;
use phpmvc\model\items ;
use phpmvc\model\comments ;

class admincontroller extends controller{
    
    public function __construct () {
    
        
        session::start () ;
        $admin = session::get ('user') ;
        if (empty($admin)) {
            echo "not access";
            die ;
        }

        
         $id = $_SESSION['user'] ;
        $object2 = new user () ;
         $image = $object2 -> getphoto ($id) ; 
        
       $_SESSION["data"] = $image ;
     
//            $object = new controller () ;
//            $object-> view ('\back\header' , ['dataa' => $image ] ); 
        
    }
    static public function index () {
        $new = new controller () ;
        $new->view ('\back\index' , ['title' => 'admin' , 'h1' => 'dashboard' ]) ;
        
    }
    
    static public function members ($sort = null) {
        $art = new controller () ;
        $members = new members () ;

        $data = $members -> getmembers ($sort) ;
        $art-> view ('\back\members' , ['title' => 'article' , 'h1' => 'article' , 'data' => $data] );
    }
    
     static public function addmember () {
        
        $art = new controller () ;
    
        $art-> view ('\back\addmember' , ['title' => 'Add member' , 'h1' => 'Add member' ] );
        
    }
    
    static public function postaddmember () {
        $name = $_POST["name"];
        $pass = sha1 ($_POST["pass"]);
        $e_mail = $_POST["e_mail"];
        $reg_status =  1 ;
        $address = $_POST["address"];
        $full_name = $_POST["full_name"];
        $img = $_FILES['img'] ;
        move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name'])  ; 
        
        $art = new controller () ;
        $object = new members () ;
        
        $errors = array () ;
        
        if (empty ($name)) {
            $errors[] = "you must enter username!" ;
        }
        if (empty ($pass)) {
            $errors[] = "you must enter password!" ;
        }
        if (empty ($e_mail)) {
            $errors[] = " e_mail can't be empty!" ;
        }
        if (empty ($full_name)) {
            $errors[] = "full name field is required!" ;
        }
        
        if (empty ($errors)) {
        
        $data = $object -> addmember ( $name  , $pass , $e_mail , $reg_status , $address , $full_name , $img["name"]) ;
        
        if ($data > 0 ) {
            $success = array ("Your operation has been completed successfully.") ;
            
            $art-> view ('\back\error' , ['title' => 'success Page' , 'h1' => 'success' , 'success' => $success ] ); 
           
        }else {
            echo "wrong" ;
        }
      
        } else {
              
                $art-> view ('\back\error' , ['title' => 'Error Page' , 'h1' => 'error' , 'error' => $errors ] ); 
        }
    }
    
    static public function deletemember ($id) {
       
        $delete = new members () ;
        $data = $delete -> delete ($id) ;
        
           if ($data > 0) {
            helper::redirect ('admincontroller/members') ;
           } else {
            helper::redirect ('admincontroller/error') ;
           }
    }
    
    
    static public function editmember ($id) {
        $controller = new controller () ;
        $member = new members () ;
        $data = $member -> membersForUpdate ($id) ;
         $controller-> view ('\back\updatemember' , ['title' => 'article' , 'h1' => 'article' , 'data' => $data ] );
        
    }
    
    static public function posteditmember ($id) {
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cat = new members () ;  
            $controller = new controller () ;
            $name = $_POST['name'] ;
            $pass = sha1 ($_POST['pass']) ;
            $e_mail = $_POST["e_mail"] ;
            $address = $_POST["address"] ;
            $full_name = $_POST["full_name"] ;
            $img = $_FILES['img'] ;
            move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name'])  ; 
         
               
               $password = $cat -> membersForUpdate ($id , "fetchAll") ;
          
            if (empty ($pass)) {
                $pass = $_POST["oldpass"] ;
            }
               
            if (empty ($img["tmp_name"])) {
             
                $img = $_POST["oldimg"] ;
                 $data = $cat -> updatemember ( 
                                $name  , 
                                $pass ,
                                $e_mail ,
                                $address , 
                                $full_name ,
                                $img , 
                                $id   
                                    );
                
            }else {
                 $data = $cat -> updatemember ( 
                                $name  , 
                                $pass ,
                                $e_mail ,
                                $address , 
                                $full_name ,
                                $img['name'] , 
                                $id   
                                    );
                
            }
              
    
     
        
               
               if ($data > 0) {
                   $success = array ("Your operation has been completed successfully.") ;
            
            helper::redirect ('admincontroller/members') ;
                   
               }else {
            $success = array ("No data has been recorded.") ;
            
            $controller-> view ('\back\error' , ['title' => 'success Page' , 'h1' => 'success' , 'success' => $success ] );
               }
           
            }
        }
    
    
    
    static public function pending () {
        $object = new controller () ;
        $pending = new members () ;
        $data = $pending -> pending () ;
        $object-> view ('\back\pending' , ['title' => 'pending' , 'h1' => 'pending' , 'data' => $data] );
          
    }
    
    static public function activatemember ($id) {
        $object = new controller () ;
        $pending = new members () ;
        $activate = $pending -> activate ($id) ;
        
        if ($activate > 0) {
            $success = array ("user activated successfully") ;
            
            $object-> view ('\back\error' , ['title' => 'success Page' , 'h1' => 'success' , 'success' => $success ] );
        } else {
           helper::redirect ('admincontroller/members') ;
        }
    }
    
      static public function cat () {
        $cat = new category () ;
        $data = $cat-> getcat () ;
  
        $art = new controller () ;
        $art-> view ('\back\category' , ['title' => 'article' , 'h1' => 'article' , 'data' => $data ] );
          
    }
    
    static public function delete ($id) {
        $del = new category () ;
        $count = $del-> delete ($id) ;
        
        if ($count > 0) {
            helper::redirect ('admincontroller/cat') ;
        } else {
            echo "fail";
        }
           
    }
    
    static public function add () {
        
        $art = new controller () ;
        $object = new user () ;
        $data = $object -> get2 () ;
        $art-> view ('\back\addcat' , ['title' => 'Add Category' , 'h1' => 'Add Category' , 'data' => $data ] );
        
    }
    
    static public function postadd () {
        $imgg = $_FILES['img'] ;
        move_uploaded_file ($imgg['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $imgg['name'])  ; 
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $user = $_POST['user']; 
        $object = new category () ;
        
        $errors = array () ;
        
        if (empty ($name) ) {
            $errors[]  =  "name field required";
        }
        if (empty ($desc) ) {
            $errors[]  =  "description field required";
        }
       
      
        if (empty ($errors)) {
        $data = $object -> add ( $name , $desc ,  $imgg['name'] , $user);
            if ($data > 0) {
                helper::redirect ('admincontroller/cat') ;
            } else {
                helper::redirect ('admincontroller/error') ;
            }
        }else {
            
          
                $art = new controller () ;
                $art-> view ('\back\error' , ['title' => 'Error Page' , 'h1' => 'error' , 'error' => $errors ] ); 
            
        }
    }
    
    static public function edit ($id) {
        $cat = new category () ;
        $data = $cat-> getcatforupdate($id) ;
        $user = new user () ;
        $users = $user->get2 () ;

        $art = new controller () ;
        $art-> view ('\back\update' , ['title' => 'Edit Page' , 'h1' => 'Edit' , 'data' => $data , 'users' => $users ] );  
       
    
    }
    
    static public function postedit ($id) {
     
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cat = new category () ;
            $newid = $_POST["newid"] ;    
            $data = $cat -> getcatforupdate ($newid) ;     
            $img = $_FILES['img'] ;
            $name = $_POST["userName"] ;
            $desc = $_POST["desc"] ;
            $user = $_POST["user"] ;
            $date = $_POST["date"] ;
           
            
            $new = $cat-> getcatforupdate($id) ;
            
            foreach ($new as $n) {
            $d = $cat -> gets ($newid , $n["name"]) ;
            }
        
            if ($d > 0) {
               
                echo "there is onther category with the same ID!";
                
                
            }else {
            
            if (!empty ($_FILES['img']['name'])) {
             move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name'])  ;
            $data = $cat-> edit ($name , $newid , $date , $img['name']  , $desc ,  $user , $id) ;
            }else {
                foreach ($data as $dataa) {
            $data = $cat-> edit ($name , $newid , $date , $dataa['img']  , $desc ,  $user , $id) ;
                }
            }
            
            
             if ($data > 0) {
            helper::redirect ('admincontroller/cat') ;
             } else {
            echo "fail";
             }
            }
        }
        
    }
    
    
    
    static public function dashboard () {
        $dash = new controller () ;
        
        // for categories 
        $new = new category () ;
        $data = $new-> counts () ;
        $cat = $new -> get ("order by id DESC limit 6") ;
        
        // for members 
        $members = new members () ;
        $membersCount = $members -> counts () ;
        $membersCount2 = $members -> counts (" where reg_status = 0 ") ;
        $membersCount3 = $members -> counts (" where reg_status = 1 ") ;
        
        // for comments 
        $comment = new comments () ;
        $commentCount = $comment -> counts () ;
        $theComment = $comment -> getcomments ("limit 5") ;
        
        // for items 
        $item = new items () ;
        $itemCount = $item -> counts () ;
        $newitem = $item -> getitems (" order by id DESC limit 6 ") ;
        
        $dash-> view ('\back\dashboard' , ['title' => 'Dashboard Page' , 'h1' => 'Dashboard' , 'data' => $data  , 'membersCount' => $membersCount , 'membersCount2' => $membersCount2 , 'membersCount3' => $membersCount3  , "commentCount" => $commentCount , "itemCount" => $itemCount , "theComment" => $theComment , 'cat' => $cat , 'newitem' => $newitem ] );  
    
    
    }
    
    
    
    static public function items ($sort = null) {
        $controller = new controller () ;
        $items = new items () ;
        $data = $items-> getitems (" order by id $sort") ;
        $controller-> view ('\back\items' , ['title' => 'items Page' , 'h1' => 'items' , 'data' => $data ] ); 
    }
    
    static public function additem () {
        $controller = new controller () ;
        $cat = new category () ;
        $members = new members() ;
        $data = $cat-> get () ;
        $data2 = $members-> getmembers () ;
        $controller-> view ('\back\additem' , ['title' => 'Add items Page' , 'h1' => 'Add items' , 'data' => $data  , 'data2' => $data2] ); 
    }
    
    static public function postadditem () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $controller = new controller () ;
            $name = $_POST["name"];
            $desc = $_POST["desc"];
            $price = $_POST["price"];
            $cat = $_POST['cat'];
            $user = $_POST["user"];
            $approve = 1 ;
            $status = $_POST["status"];
            $img = $_FILES['img'] ;
            move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name'])  ; 
            $made_in = $_POST["made_in"] ;
            
            
            
            $errors = array () ;
            if (empty ($name)) {
                $errors[] = "Name field can't be empty !" ;
            }
            
            if (empty ($desc)) {
                $errors[] = "Description field can't be empty !" ;
            }
            
            if (empty ($price)) {
                $errors[] = "Price field can't be empty !" ;
            }
            if (empty ($cat) or $cat == 0 ) {
                $errors[] = "you must choise the category!" ;
            }
            
            if (empty ($user) or $user == 0 ) {
                $errors[] = "you must choise the user!" ;
            }
            
            
            if (empty ($errors)) {
                $add = new items () ;
                $data = $add -> additem ($name , $desc , $price , $cat , $user , $approve , $status , $img['name'] , $made_in) ;
                
                if ($data > 0 ) {
                    $success = array ("the item inserted succsessfully" );
                   $controller-> view ('\back\error' , ['title' => 'success Page' , 'h1' => 'success' , 'success' => $success ] ); 
                }else {
                    $error = array ("failed to insert data !") ;
                    $controller-> view ('\back\error' , ['title' => 'Error Page' , 'h1' => 'error' , 'error' => $error ] ); 
                }
                
            }else {
                
                 $controller-> view ('\back\error' , ['title' => 'Error Page' , 'h1' => 'error' , 'error' => $errors ] ); 
            }
           
        }
    }
    
    
    static public function approveitem ($id) {
        $object = new items () ;
        $data = $object -> approve ($id) ;
        if ($data > 0) {
            helper::redirect ('admincontroller/items') ;
        }else {
            helper::redirect ('admincontroller/items') ;
            
        }
    }
    
     static public function deleteitem ($id) {
        $object = new items () ;
        $data = $object -> delete ($id) ;
        if ($data > 0) {
            helper::redirect ('admincontroller/items') ;
        }else {
            helper::redirect ('admincontroller/items') ;
            
        }
    }
    
    
      static public function updateitem ($id) {
          
        $i = new items () ;
        $c = new category () ;
        $m = new members () ;
          
        $data = $i-> getitemsforupdate ($id) ;
        $cat = $c -> get () ;
        $user = $m -> getmembers () ;

        $art = new controller () ;
        $art-> view ('\back\updateitem' , ['title' => 'Edit Page' , 'h1' => 'Edit' , 'data' => $data , 'cat' => $cat , 'user' => $user] );  
  
    }
    
    static public function postedititem ($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {       
            $object = new items () ;
            $name = $_POST["name"] ;
            $desc = $_POST["desc"] ;
            $price = $_POST["price"] ;
            $status = $_POST["status"] ;
            $cat = $_POST["cat"] ;
            $user = $_POST["user"] ;
            $made_in = $_POST["made_in"] ;
            $img = $_FILES["img"] ;
        
            $get = $object -> getitemsforupdate ($id) ;
            
             if (!empty ($_FILES['img']['name'])) {
                 
             move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name'])  ;
            $data = $object-> updateitem ($name , $desc , $price , $cat , $user , $status , $img['name'] , $made_in , $id ) ;
                 
                 
            }else {
                 
                foreach ($get as $dataa) {
            $data = $object-> updateitem ($name , $desc , $price , $cat , $user , $status , $dataa['img'] , $made_in , $id ) ;
                    
                }
            }
            
          if ($data > 0 ) {
              helper::redirect ("admincontroller/items");
          }else {
            
              helper::redirect ("admincontroller/items");
          }
         
        }
    }
    
    static public function comments () {
       $object = new controller () ;
       $object2 = new comments () ;
       $data = $object2 -> getcomments  () ;
       $object-> view ('\back\comments' , ['title' => 'Edit Page' , 'h1' => 'Edit' , 'data' => $data ] ); 
    }
    
    static public function deletecomment ($id) {
       $comment = new comments () ;
       $data = $comment -> delete ($id) ;
        if ($data > 0) {
             helper::redirect ("admincontroller/comments");
        }else {
             helper::redirect ("admincontroller/comments");
            
        }
    }
    
    static public function updatecomment ($id) {
       $object = new controller () ;
       $object2 = new comments () ;
       $i = new items () ;
       $m = new members () ;
       $item = $i-> getitemsV1 () ;
       $member = $m-> getUserV1 () ;
       $comment = $object2-> commentV1 ($id) ;
//       $member = $m-> getmembers () ;
//       $data = $object2 -> getcomments  () ;
       $object-> view ('\back\updatecomment' , [ 'comment' => $comment , 'item' => $item , 'member' => $member ] ); 
    } 
    
    static public function posteditcomment () {
        $id = $_POST["id"];
        $comment = $_POST["comment"];
        $user = $_POST["user"];
        $item = $_POST["item"];
        
        $object = new comments () ;
        $data = $object -> edit ($comment , $user , $item , $id) ;
        
        if ($data > 0) {
             helper::redirect ("admincontroller/comments");

        }else {
             helper::redirect ("admincontroller/comments");
            
        }
    }
    
    static public function profile () {
        $admin =  $_SESSION['user'] ;
         $art = new controller () ;
        $user = new user () ;
        $data = $user -> get3 ($admin) ;
  
        $art-> view ('\back\profile' , ['title' => 'Edit Page' , 'h1' => 'Edit' , 'data' => $data ] ); 
    }
    
    static public function postprofile () {
        
//        print_r ($_SESSION) ; die ;
       $id = $_SESSION["user"]; 
       $name = $_POST['name'] ;
       $e_mail = $_POST['email'] ;
       $pass = $_POST['pass'] ;
       $full_name = $_POST['full_name'] ;
       $address = $_POST['address'] ;
       $img = $_FILES['img'] ;
       move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name'])  ; 
    
        
        $object2 = new user () ;
        $controller = new controller () ;
        
        $oldphoto = $object2 -> get3 ($id) ;
        
        
        if (empty ($_FILES['img']['name'])) {
           
            foreach ($oldphoto as $old) {
            $data = $object2 -> update ($name , $pass , $e_mail , $full_name , $address , $id ,  $old['image']) ;
            }
        }else {
        $data = $object2 -> update ($name , $pass , $e_mail , $full_name , $address , $id ,  $img['name']) ;
        }
            
            if ($data > 0) {
                   
                   $success = array ("Your information updated successfully" );
                   $controller-> view ('\back\error' , ['title' => 'success Page' , 'h1' => 'success' , 'success' => $success ] );
            }else {
               helper::redirect ("admincontroller/profile") ;
            
            }
    }
    
    static public function logout () {
        session::stop () ;
        header ("location:" . CSS_PATH . "usercontroller/login") ;
    }
    
     
    static public function error404 () {
        
          $art = new controller () ;
        $art-> view ('\back\error404' , ['title' => 'Error Page' ] );  
    }
    
    
    
    
    
    
    
    
}

//$mainObject = new 
ob_end_flush () ;
?>