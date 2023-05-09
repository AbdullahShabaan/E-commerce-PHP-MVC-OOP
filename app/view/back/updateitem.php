<?php
require_once "header.php";
?>



        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Item</h4>
                    </div>
        
                </div>

            </div>

            <div class="container-fluid">
     
                <div class="row">

                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method ="post" 
                                    
                                      
                                   action='http://news.test/admincontroller/postedititem/<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['id'] ;
                                                                      }
                                                                      
                                                                      ?>'
                                      enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "name"  
                                                class="form-control p-0 border-0"
                                                   value="<?php
                                        foreach ($data as $d) {
                                            echo $d["name"];
                                        }
        
                                                          ?>"
                                                          
                                                          > </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Description</label>
                                        <div class="col-md-12 border-bottom p-0">
                                          
                                        <input type="text" name = "desc"  class="form-control p-0 border-0" 
                                               value = "<?php
                                                                                       
                                                                                       
                         foreach ($data as $d) {
                           echo $d["description"];
                        } 
                                                        ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Made In</label>
                                        <div class="col-md-12 border-bottom p-0">
                                          
                                        <input type="text" name = "made_in"  class="form-control p-0 border-0" 
                                               value = "<?php
                                                                                       
                                                                                       
                         foreach ($data as $d) {
                           echo $d["made_in"];
                        } 
            
                                                                                       ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Price $</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" name = "price"  
                                                class="form-control p-0 border-0" 
                                                   value="<?php
                        foreach ($data as $d) {
                           echo $d["price"];
                        }
    
                                                          ?>"> </div>
                                    </div>
                                    
                        <div class="form-group mb-4">
                            
                                        <label class="col-md-12 p-0">Status</label>
                                <select class = "form-control" name="status">
                                
                                    <?php foreach ($data as $d) { ?>
                                    <option  <?php if ($d["status"] == 1 ){echo " selected " ;}?> value="1">Old</option>
                                    <option <?php if ($d["status"] == 2 ){echo " selected " ;}?> value="2">Like New</option>
                                    <option <?php if ($d["status"] == 3 ){echo " selected " ;}?> value="3">New</option>
                                    <?php }  ?>
                                    
                                </select>
                        </div>
                                    
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Category</label>
                                <select class = "form-control" name="cat">
                                
                                    <option value="0" >...</option>
                                <?php 
        
        
                                    foreach ($data as $d) {
                                    foreach ($cat as $gets2) {
                                        echo "<option " ;
                                            if ($gets2["id"] == $d['cat_id']) {
                                                echo "selected ";
                                            }
                                            
                                            
                                        echo    "value='".$gets2['id']."'> " . $gets2['name']. "</option>";
                                    }
                                    }
                                    
                                    
                                    
                                ?>
                                    
                                </select>
                                    </div>
                                    
                                   <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User</label>
                                <select class = "form-control" name="user">
                                
                                    <option value="0">...</option>
                                <?php 
        
        
                                    foreach ($data as $d) {
                                    foreach ($user as $gets2) {
                                        echo "<option " ;
                                            if ($gets2["id"] == $d['user_id']) {
                                                echo "selected ";
                                            }
                                            
                                            
                                        echo    "value='".$gets2['id']."'> " . $gets2['name']. "</option>";
                                    }
                                    }
                                    
                                    
                                    
                                ?>
                                    
                                </select>
                                    </div>
                            
                                    <div class="custom-file">
                                        <label class="col-md-12 p-0">Change The Picture</label>
                                        <p>"if you don't want to change the picture leave it blank"</p>
                                        <div class="col-md-12 border-bottom p-3">
                                            <input type="file" class="custom-file-input" name = "img" >
                                            <input type="hidden" name = "oldimg" value="<?php
                                                            foreach ($data as $d) {
                                                                echo $d['img'];
                                                            }
                                                                                        
                                                                                        
                                                                                        ?>" >
                                                      <img src="<?=CSS_PATH.'back/plugins/images/'.$d['img']?>" width="150px" height="150px">
                                                                      
                                                                    
                                        </div>
                                    
                                        </div>
                                    
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12 m-2">
                                            <button class="btn btn-success">Add Category</button>
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