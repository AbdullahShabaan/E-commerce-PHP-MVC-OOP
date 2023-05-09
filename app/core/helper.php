<?php

namespace phpmvc\core ;

class helper {
    
    static public function redirect ($path) {
        header ("location:http://news.test/" . $path);
        
    }
    
    static public function assets ($path) {
        echo "E:\new XAMPP\htdocs\newsPro\public" . $path ;
        
    }
    
    
}