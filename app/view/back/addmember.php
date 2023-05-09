<?php
require_once "header.php";
?>



        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Member</h4>
                    </div>
              
                </div>

            </div>

            <div class="container-fluid">
     
                <div class="row">

                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method ="post" action = "<?=CSS_PATH . "admincontroller/"?>postaddmember" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "name"  placeholder="Enter your username"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name = "pass"  placeholder="Enter Password"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">E-mail</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" name = "e_mail"  placeholder="enter a valid e-mail"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "address"  placeholder="Your address"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "full_name"  placeholder="enter your name"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                            
                                    <div class="custom-file">
                                        <label class="col-md-12 p-0">Profile Photo</label>
                                        <div class="col-md-12 border-bottom p-3">
                                            <input type="file" class="custom-file-input" name = "img"  
                                                                      
                                                                     >
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