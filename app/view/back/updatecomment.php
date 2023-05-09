<?php
require_once "header.php";
?>


<?php
//echo "<pre>";
//print_r ($comment);
//echo $comment[0][2] ;
//echo "<pre>";
//print_r ($member) ;
?>
        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Comment</h4>
                    </div>
        
                </div>

            </div>

            <div class="container-fluid">
     
                <div class="row">

                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method ="post" 
                                    
                                      
                                   action='http://news.test/admincontroller/posteditcomment'
                                      enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Comment</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "comment"  
                                                class="form-control p-0 border-0"
                                                   value="<?php
                                        foreach ($comment as $d) {
                                            echo $d["description"];
                                        }
        
                                                          ?>">
                                            <input type="hidden" name = "id"  
                                               
                                                   value="<?php
                                        foreach ($comment as $d) {
                                            echo $d["id"];
                                        }
        
                                                          ?>">
                                        </div>
                                    </div>
                                    
                                <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User</label>
                                <select class = "form-control" name="user">
                                
                                    
                                <?php 
        
        
                                 
                                    foreach ($member as $gets2) {
                                        echo "<option " ;
                               if ($comment[0][2] == $gets2["id"]) {
                                   echo " selected " ;
                               }
                                            
                                        echo    "value='".$gets2['id']."'>" . $gets2['name']. "</option>";
                                    }
                                    
                                    
                                    
                                    
                                ?>
                                    
                                </select>
                                    </div>
                                    
                                    
                                     <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Item</label>
                                <select class = "form-control" name="item">
                                
                                    
                                <?php 
        
                                   
                                    foreach ($item as $gets2) {
                                        echo "<option " ;
                                if ($comment[0][3] == $gets2["id"]) {
                                   echo " selected " ;
                               }
                                        echo   "value='".$gets2['id']."'> " . $gets2['name']. "</option>";
                                    }
                                    
                                    
                                    
                                    
                                ?>
                                    
                                </select>
                                    </div>
                                   
                          
                                    
                            
                                    
                                 
                            
                                 
                                    
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12 m-2">
                                            <button class="btn btn-success">Edit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  


            </div>
    




<?php
require "footer.php";
?>