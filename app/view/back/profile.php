<?php 
ob_start() ;

require_once "header.php" ; 
?>

        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                   
                    </div>
                </div>
          
            </div>


            <div class="container-fluid">

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div > 
                                <div class="overlay-box">
                                    <div class="user-content">
                                       
                                            <?php foreach ($data as $da ) { ?> 
                                            <img src="<?=CSS_PATH.'back/plugins/images/'.$da['image']?>" width="200px" height="200px">

                                     
                                            <?php } ?> 
                                    </div>
                                </div>
                            </div>
                                    <?php foreach ($data as $da) { ?>
                            <div class=" mt-5 ">
                                <div class="col-md-12 col-sm-4 text-center">
                                    <h3>Name : <?= $da ["user_ar_name"]?></h3> 
                                </div>
                             
                                <div class="col-md-12 col-sm-4 text-center">
                                    <h4>Address : <?= $da ["address"]?></h4>
                                </div>
                                
                                   <div class="col-md-12 col-sm-4 text-center">
                                    <h4>E-Mail : <?= $da ["e_mail"]?></h4> 
                                </div>
                            </div>
                            
                                    <?php } ?> 
                        </div>
                    </div>
          
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material " action='postprofile' method="POST"
                                     enctype="multipart/form-data"
                                      
                                      >
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name ="name" value = "<?php 
                                                                        
                                                                        foreach ($data as $da) {
                                                                            echo $da['user_ar_name'] ;
                                                                        }
                                                                        
                                                                        
                                                                        ?>"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" value = "<?php 
                                                                         
                                                                         foreach ($data as $da) {
                                                                             echo $da['e_mail'];
                                                                         }
                                                                         
                                                                         ?>"
                                                class="form-control p-0 border-0" name="email"
                                                >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name = "pass" value="<?php 
                                                                          foreach ($data as $da) {
                                                                             echo $da['password'];
                                                                         }
                                                                          
                                                                          ?>" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"
                                                   name ="full_name" value="<?php 
                                                                          foreach ($data as $da) {
                                                                             echo $da['full_name'];
                                                                         }
                                                                          
                                                                          ?>"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"
                                                   name ="address" value="<?php 
                                                                          foreach ($data as $da) {
                                                                             echo $da['address'];
                                                                         }
                                                                          
                                                                          ?>"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                            
                                        <div class="col-md-12 border-bottom p-0">
                                         <label class="col-md-12 p-0">Profile Picture</label>
                                          
                                           
                                            <input type="file"  name = "img" class="custom-file-input m-3" class="form-control p-0 border-0">
                                        </div>
                                    
                                  
                           
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
              
                </div>

            </div>
            
<?php require_once "footer.php" ;
            
ob_end_flush() ;

