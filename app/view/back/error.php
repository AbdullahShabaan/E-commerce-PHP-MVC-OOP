<?php
ob_start () ;
require_once "header.php" ;
?>

<body>

        <div class="error-box">
            <div class="error-body text-center">
            
                
                
              
                <h3 class="text-uppercase error-subtitle ">    <?php
                    if (!empty ($error)) {
                 foreach ($error as $e ){
                    header('Refresh: 5; url=' . $_SERVER['HTTP_REFERER']);
                     
                     echo "<div class='alert alert-danger'>" . $e . "</div>" . "<br>" ;
                     
             
                         echo "you will be redirected to the previous page in 5 seconds" ;
                     
                 }
                    }
                    
                        if (!empty ($success)) {
                 foreach ($success as $e ){
                    header('Refresh: 5; url=' . $_SERVER['HTTP_REFERER']);
                     echo "<div class='alert alert-success'>" . $e . "</div>" . "<br>" ;
                     echo "you will be redirected to the previous page in 5 seconds" ;
             
                     
                 }
                    }
                    
                ?></h3>
          
                <a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-danger btn-rounded waves-effect waves-light mb-5 text-white">Back</a>
            </div>
        </div>
  
</body>

<?php
require "footer.php";
ob_end_flush () ;
