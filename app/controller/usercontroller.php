<?php
namespace phpmvc\controller ;
use phpmvc\core\controller ;
use phpmvc\model\user ;
use GUMP ;
use phpmvc\core\helper ;
use phpmvc\core\session ;


class usercontroller extends controller {
    
     public function __construct () {
        session::start() ;
    }
    

    static public function index() {
        echo "user profile" ;
    } 
    
    static public function login () {
        $controller = new controller () ;
        $controller -> view ('\home\\login' , ['h1' => 'Login Page' , 'title' => 'login']) ;
        
    }
    
    
    static public function postlogin () {
        
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $pass = $_POST["pass"];
                $data = new user () ;
                $count = $data-> getuser ($name , $pass) ;

                 if ($count > 0) {
                echo 'exist' ;
                session::set ('user', $count) ;
                helper::redirect ('admincontroller/index') ;
                    
            } else {
                echo 'wrong username or password';
            }
            }


    }
    static public function logout () {
        session::stop() ;
    }
    
}

