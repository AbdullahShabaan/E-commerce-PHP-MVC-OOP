<?php
namespace phpmvc\lib ;

    
class frontcontroller {
    private $controller ;
    private $method ;
    private $para ;
    
    
    public function __construct () {
        $this->_parseUrl () ;

    }
    
    private function _parseUrl () {
        
       $url = explode ( "/" , trim ( $_SERVER["REQUEST_URI"] , "/"));
        if (!empty ($url[0])) {
            $this->controller = $url[0] ;
        } else {
            $this->controller = "index" ;
        }
         if (!empty ($url[1])) {
            $this->method = $url[1] ;
        } else {
             $this->method = "def" ;
         }
        
        unset ($url[0] , $url[1]) ;
        $this->para = array_values ($url) ;   
        
    }
    

    
    public function dispatch () {
    $controllers = "phpmvc\controller\\" . $this->controller ;
        
        if (class_exists ($controllers)) {
            $cont = new $controllers ();
            $contt = new \phpmvc\core\controller () ;
            
//            echo "class exists" . "<br>";
            if (method_exists ($controllers , $this->method)) {

            call_user_func_array ([$controllers , $this->method] , $this->para) ;
//                echo "exist";
            
            } else {
                echo "method not exists" . "<br>";
            }
            
        } else {
          
            header ("location:" . CSS_PATH . "homecontroller/index") ;
            exit () ;
      
        }
           
    }
    

    
 
}

//$ob1 = new frontcontroller () ;

//$ob1 -> render () ;

//    private function render () {
//           $controllers = "phpmvc\controller\\" . $this->controller ; 
////            echo $controllers ."<br>";
//            if ( class_exists($controllers) ) {
//            
//            echo "class exists" . "<br>";
//                if (method_exists($controllers ,$this->method)) {
//
//                call_user_func_array ([$controllers ,$this->method] , $this->para) ;
//                
//                } else {
//                    echo "method not exists";
//                }
//            
//            }else {
//            echo "not exists" ;
//            }    }
?>