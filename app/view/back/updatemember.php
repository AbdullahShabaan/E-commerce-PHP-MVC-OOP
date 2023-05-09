<?php
require_once  "header.php";
?>



        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Member</h4>
                    </div>
        
                </div>

            </div>

            <div class="container-fluid">
     
                <div class="row">

                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method ="post" 
                                    
                                      
                                   action='http://news.test/admincontroller/posteditmember/<?php 
                                                                      
                                                                      foreach ($data as $news) {
                                                                      
                                                                      echo $news['id'] ;
                                                                      }
                                                                      
                                                                      ?>'
                                      enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "name"  placeholder="Enter your username"
                                                class="form-control p-0 border-0"
                                                   value="<?php
                                        foreach ($data as $d) {
                                            echo $d["name"];
                                        }
        
                                                          ?>"
                                                          
                                                          > </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Change Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name = "pass"  placeholder="If you don't want to change psssword leave it blank"
                                                class="form-control p-0 border-0"
                                                   > 
                                        <input type="hidden" name = "oldpass" value = "<?php
                                                                                       
                                                                                       
                         foreach ($data as $d) {
                           echo $d["password"];
                        } 
            
                                                                                       ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">E-mail</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" name = "e_mail"  placeholder="enter a valid e-mail"
                                                class="form-control p-0 border-0" 
                                                   value="<?php
                        foreach ($data as $d) {
                           echo $d["e_mail"];
                        }
    
                                                          ?>"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "address"  placeholder="Your address"
                                                class="form-control p-0 border-0"
                                         value="<?php
                                                
                        foreach ($data as $d) {
                             echo $d["address"];
                        }
        
                                                          ?>"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "full_name"  placeholder="enter your name"
                                                class="form-control p-0 border-0"
                                                                   value="<?php
                         foreach ($data as $d) {
                             echo $d["full_name"];
                        }
        
                                                          ?>"
                                                   
                                                   > </div>
                                    </div>
                            
                                    <div class="custom-file">
                                        <label class="col-md-12 p-0">Change Profile Picture</label>
                                        <p>"if you don't want to change profile picture leave it blank"</p>
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