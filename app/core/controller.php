<?php
namespace phpmvc\core ;
ob_start () ;

use phpmvc\helper ;

class controller {
     public function view ($path , $tit) {
         extract ($tit);
         
        require_once ( VIEW . $path . ".php");
    }
    
    

}

ob_end_flush () ;
