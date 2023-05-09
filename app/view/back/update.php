<?php
require_once "header.php";


?>



        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Page</h4>
                    </div>
  
                </div>

            </div>

            <div class="container-fluid">
     
                <div class="row">

                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                
                                <form class="form-horizontal form-material" method ="post" enctype="multipart/form-data" action='http://news.test/admincontroller/postedit/<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['id'] ;
                                                                      }
                                                                      
                                                                      ?>'>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input name = "userName" type="text" value="<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['name'] ;
                                                                      }
                                                                      
                                                                      ?>" placeholder="Johnathan Doe"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">ID</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="johnathan@admin.com"
                                                class="form-control p-0 border-0" name="newid" value="<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['id'] ;
                                                                      }
                                                                      
                                                                      ?>">
                                                
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">image</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <?php foreach ($data as $dataa) { ?>
                                            <img src="<?=CSS_PATH.'back/plugins/images/'.$dataa['img']?>" width="150px" height="150px">
                                            <?php } ?>
                                            <br>
                                           
                                            <input type="file"   value="<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['img'] ;
                                                                      }
                                                                      
                                                                      ?>" name = "img" class="custom-file-input m-3" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name ="date"
                                                   value="<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['date'] ;
                                                                      }
                                                                      
                                                                      ?>"
                                                   placeholder="123 456 7890"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Description</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" rows="3" name ="desc"
                                                   value="<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['description'] ;
                                                                      }
                                                                      
                                                                      ?>"
                                                      class="form-control p-0 border-0">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Select User</label>

                                        <div class="col-sm-12 border-bottom">
                                            <select name = "user" class="form-select shadow-none p-0 border-0 form-control-line">
                                        
                                                <?php
                                               
                                                
            foreach ($users as $user) {
            echo '<option value="'.$user["user_id"].'" 
            
            ' ;
                foreach ($data as $dataa) {
            if ( $dataa["user_id"] == $user["user_id"]){
                echo " selected";
            }
                }
            
            echo '>' . $user["user_ar_name"] . '</option>';
                   }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Category</button>
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