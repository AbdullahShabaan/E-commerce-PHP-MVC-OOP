<?php

namespace phpmvc\controller ;
use phpmvc\core\controller ;
use phpmvc\core\session ;
use phpmvc\model\category ;
use phpmvc\model\items ;
use phpmvc\model\members ;
use phpmvc\model\comments ;

class homecontroller extends controller {
    public function __construct () {
        
    session::start () ;
        
    }
    static public function index () {
        $object = new controller () ;
        //members
        $member = new members () ;
        $membersCount = $member -> counts ("where reg_status = 1") ;
        
        //categories
        $cat = new category () ;
        
        //comments
        $comment = new comments () ;
        $commentsCount = $comment -> counts () ;
        
        //items
        $item = new items () ;
        $itemConut = $item -> counts () ;
        $itemData = $item -> getitems (" order by id DESC");
        $data = $cat-> getcat () ;
        $object->view ('\home\\index2' , ['title' => 'home' , 'h1' => 'home' , 'data' => $data , 'item' => $itemData , 'itemCount' => $itemConut , 'membersCount' => $membersCount  , 'commentsCount' => $commentsCount]) ; 
        

        
    }
    
    static public function cat ($id) {
        
         $object = new controller () ;
         $cat = new category () ;
         $categoryName = $cat -> getforitems ($id) ;
         $data = $cat-> getcat () ;
         $item = new items () ;
         $itemData = $item -> getitemsforupdate ($id , "cat_id") ;
         $object->view ('\home\\cat' , ['title' => 'home' , 'h1' => 'home' , 'data' => $data , 'item' => $itemData , 'catName' => $categoryName]) ; 
    }
    
    static public function item ($id) {
         $object = new controller () ;
         $object2 = new comments () ;
         $i = new items () ;
         $item = $i ->  getitemsforupdate ($id) ;
         $comment = $object2 -> itemcomment ($id) ;
         $object->view ('\home\\item' , ['item' => $item , 'comment' => $comment ]) ; 
    }
    
    static public function details () {
        $object = new controller () ;
        $object->view ('\home\\details' , ['title' => 'home' , 'h1' => 'home']) ;
        
    }
    
        static public function help () {
        $object = new controller () ;
        $object->view ('\home\\help' , ['title' => 'home' , 'h1' => 'home']) ;
        
    }
    
    static public function userlogin () {
        $object = new controller () ;
        $object->view ('\home\\userLogin' , []) ;
    }
    
     static public function postlogin () {
        $member = new members () ;
        $controller = new controller () ;
         
         
         
     if ($_SERVER["REQUEST_METHOD"] =="POST") {
         
        $name = $_POST["username"]  ;
        $pass = sha1 ($_POST["pass"] ) ; 
         
         $errors = [] ;
         if (empty ($name)) {
             $errors[] = "Enter UserName" ;
         }
          if (empty ($pass)) {
            
             $errors[] = "Enter Password!" ;
         }
         
         if (empty ($errors)) {
             
             $log = $member -> checklog ($name , $pass) ;
             
                if ($log > 0) {
                    
                    
                    session::set ("name" , $name);
                    $id = $member -> getID ($_SESSION["name"]) ;
                    session::set ("id" , $id);
                    
                    header ("location: " . CSS_PATH . "homecontroller/index") ;
                    exit () ;

                    
                }else {
                    $error[] = "Wrong userName Or Password" ;
                    $controller->view ('\home\\notfound' , ['error' => $error]) ;    
                }
            
         }else {
             foreach ($errors as $e) {
                 echo $e . "<br>";
             }
         }
     
     }
    }
    
     static public function signup () {
        $object = new controller () ;
        $object->view ('\home\\signUp' , []) ;
    }
    
         static public function postSignUp() {
      
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $object = new controller () ;
                
                $name = $_POST["name"];
                $pass1 = $_POST["pass1"];
                $pass2 = $_POST["pass2"];
                $mail = $_POST["mail"];
                $full_name = $_POST["full_name"];
                
                
                $errors = [] ;
             
                
                if (empty ($name)) {
                    $errors[] = "username filed is required!" ;   
                }else {
                    $filter_name = filter_var ($name , FILTER_SANITIZE_STRING , FILTER_NULL_ON_FAILURE) ;

                if (strlen ($filter_name ) <= 3 or strlen ($filter_name) > 10) {
                    $errors [] = "<div class='alert alert-warning'>username must be more than 3 char & less than 10 char</div>";
                }
                }
                
                if (empty ($pass1) or empty ($pass2)) {
                    $errors[] = "password filed is required!" ;
                } else {
                    
                    if ($pass1 !==  $pass2) {          
                       $errors[] =" password not match! "; 
                    }else {
                    
                $shapass = sha1 ( $pass1 ); 
                        
                    }
              
                }
                
                if (empty ($mail)) {
                    $errors[] = "E-mail filed is required!" ;
                }else {
                    $filter_mail = filter_var ($mail , FILTER_SANITIZE_EMAIL) ;
                    
                    if (filter_var ($filter_mail , FILTER_VALIDATE_EMAIL) != true) {
                     $errors[] ="wrong e-mail ";
                }
                
                }
                
                if (empty ($full_name)) {
                    $errors[] = "full name filed is required!" ;
                }else {
                    
                    $filter_full_name = filter_var ($full_name , FILTER_SANITIZE_STRING) ;
                    if (strlen ($filter_full_name) > 50) {
                        $errors[] =" full name must be shorter than that!" ;
                    }
                }
                
                
                if (empty ($errors)) {

                $ob = new members () ;
                $check = $ob -> signUp ($filter_name , $shapass , $filter_mail , $filter_full_name) ;
                    
                    if ($check > 0) {
                        $success[] = "Account Created Successfully go to login page" ;
                    $object->view ('\home\\notfound' , ['success' => $success]) ;
                    
                    }else {
                        echo "wrong information!" ;
                    }
                    
                }else {
                    
                    $object->view ('\home\\notfound' , ['error' => $errors]) ;
                    
                }
                
                
            }
    }
    
     static public function logout () {
         
         if (isset ($_SESSION["name"])) {
             SESSION::stop () ;
         header ("location:" . CSS_PATH . "homecontroller/index") ;
         exit() ;
        
         }
    }
    
    static public function profile () {
        $object = new controller () ;
        $members = new members () ;
        $check = $members -> checkPending ($_SESSION["id"]);
        $comments = new comments () ;
        $c = $comments -> usercomment ($_SESSION["id"]) ;
        $data = $members -> profiledata ($_SESSION["name"]) ;
        $object->view ('\home\\profile' , ['title' => 'home' , 'h1' => 'home' , 'data' => $data , 'comment' => $c  , 'pending' => $check]) ;
    }
    
    static public function SetComment ($id) {
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $c = new comments () ;
           $comment = $_POST["comments"]; 
       $filter_comment = filter_var ($comment , FILTER_SANITIZE_STRING) ;
           $user = $_SESSION["id"] ;
           $item = $id ;
           
           $check = $c -> addComment ( $comment ,  $user , $item ) ;
           
           if ($check > 0) {
              header ("location:" . $_SERVER['HTTP_REFERER']) ;
               exit ();
           }else {
               echo "failed!";
           }
           
       }
    }
    
    
    static public function additem () {
        $member = new members () ;
        $check = $member -> checkPending ($_SESSION["id"]) ;
         
        $controller = new controller () ;
        $cat = new category () ;
        $data = $cat -> get () ;
        
            if ($check > 0) {
          $controller->view ('\home\\additem' , ['data' => $data]) ;
            }else {
                $errors[] = "Sorry! Your account is currently awaiting activation." ;
          $controller->view ('\home\\notfound' , ['error' => $errors]) ;
                
            }
    }
    
    
    static public function postadd () {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
        $object = new controller () ;        
        $item = new items () ;        
            
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $made_in = $_POST["made_in"];
        $price = $_POST["price"];
        $cat = $_POST["cat"];
        $user = $_POST["user"];
        $status = $_POST["status"];
        $img = $_FILES["img"];
        move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name']);
            
            $errors = [] ;
            
            if (strlen($name) > 30) {
                        $errors[] = "Item name must be less than 30 char!" ;
                    }
            
            if (empty($name)) {
                $errors[] = "name filed required!";
                
                
            } else {
                $name_filter = filter_var ($name , FILTER_SANITIZE_STRING) ;
            }
            
              if (strlen($desc) > 50) {
                        $errors[] = "Item description must be shorter!" ;
                    }
            
            if (empty($desc)) {
                $errors[] = "description filed required!";
               
            }else {
                
                $desc_filter = filter_var ($desc , FILTER_SANITIZE_STRING) ;
                
            }
            
            if (strlen($made_in) > 15) {
                $errors[] = "made in filed must be shorter!" ;
                    }
            if (empty($made_in)) {
                $errors[] = "made in filed required!";
         
            }else {
                
                $made_in_filter = filter_var ($made_in , FILTER_SANITIZE_STRING) ;
                
            }
            if (empty($price)) {
                $errors[] = "price filed required!";
            }
            if (empty($cat)) {
                $errors[] = "you must selected the category!";
            }
         
            if (empty($status)) {
                $errors[] = "you must select the status of your product!";
            }
            
            if (empty ($errors)) {
                
//                echo $name_filter . $desc_filter . $made_in_filter . $price . $cat . $status . $user ;
                
                $check = $item -> additem ($name_filter , $desc_filter , $price , $cat , $user  , 0 , $status , $img["name"] , $made_in_filter ) ;
                if ($check > 0) {
                    $success[] = "Item inserted successfully" ;
                    $object->view ('\home\\notfound' , ['success' => $success]) ;           
                }else {
              header ("location:" . $_SERVER['HTTP_REFERER']) ;
                    exit ();
                }
                
                
            }else {
                
            $object->view ('\home\\notfound' , ['error' => $errors]) ;
                
            }
            
            
        }
        
        
    }
    
    static public function edituser () {
        
        $controller = new controller () ;
        $members = new members () ;
        $data = $members -> membersForUpdate ( $_SESSION["id"]) ;
          $controller->view ('\home\\edituser' , ['data' => $data]) ;
        
    
    }
    
    static public function PostEditUser ($id) {
        $members = new members () ;
        $object = new controller () ;
        $data = $members-> membersForUpdate ($id);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"] ;
        $pass = $_POST["pass"] ;
        $e_mail = $_POST["e_mail"] ;
        $address = $_POST["address"] ;
        $full_name = $_POST["full_name"] ;
        $img = $_FILES["img"] ; 
        move_uploaded_file ($img['tmp_name'] , PUBLIC_VIEW . '/back/plugins/images/'. $img['name']);
            
        
            
            $errors = [] ;
            
            if (empty ($name)) {
                $errors [] = "username can't be empty!" ;
            }else {
                $filter_name = filter_var ($name , FILTER_SANITIZE_STRING);
            }
           
            if (empty ($e_mail)) {
                $errors [] = "E-mail can't be empty!" ;
            }
            $filter_address = filter_var ($address , FILTER_SANITIZE_STRING) ;
            $filter_full_name = filter_var ($full_name , FILTER_SANITIZE_STRING) ;
            
            $filter = filter_var ($e_mail , FILTER_SANITIZE_EMAIL) ;
            
            if ($filter === filter_var ($filter , FILTER_VALIDATE_EMAIL)) {
                $filter_email = $filter ;
            }else {
               $errors [] = "E-mail not valid !";
            }
            

            if (empty ($pass)) {
                $pass = $_POST["oldpass"] ;
            } else {
                $pass = sha1 ($_POST["pass"]);
            }
            
            if (empty ($errors)) {
                
                if (empty ($img["name"])) {
                $oldimg = $data[0]["img"] ;
                    
                    $check = $members->  updatemember ( 
                        $filter_name  , 
                        $pass ,
                        $filter_email ,
                        $filter_address , 
                        $filter_full_name ,
                        $oldimg , 
                        $id                       ) ;
                    
            }else {
                        $check = $members->  updatemember ( 
                        $filter_name  , 
                        $pass ,
                        $filter_email ,
                        $filter_address , 
                        $filter_full_name ,
                        $img["img"] , 
                        $id                       ) ;
                }
                
                if ($check > 0 ) {
                    $success [] = "Updated Successfully" ;
                    $object->view ('\home\\notfound' , ['error' => $success]) ;  
                    
                }else {
                    $errors [] = "no information edited" ;
                    $object->view ('\home\\notfound' , ['error' => $errors]) ;                 }
                
            }else {
                        
                     $object->view ('\home\\notfound' , ['error' => $errors]) ;

            }
            
            
        }
        
    }
    
    
    
}