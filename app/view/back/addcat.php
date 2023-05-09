<?php
require_once "header.php";
?>



        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="dashboard" class="fw-normal">Dashboard</a></li>
                            </ol>
                     
                        </div>
                    </div>
                </div>

            </div>

            <div class="container-fluid">
     
                <div class="row">

                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method ="post" action = "postadd" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name = "name"  placeholder="Johnathan Doe"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                            
                                    <div class="custom-file">
                                        <label class="col-md-12 p-0">img</label>
                                        <div class="col-md-12 border-bottom p-3">
                                            <input type="file" class="custom-file-input" name = "img"  
                                                                      
                                                                     >
                                        </div>
                                    </div>
                            
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Description</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" rows="3" name ="desc"
                                                   
                                                      class="form-control p-0 border-0">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Select User</label>

                                        <div class="col-sm-12 border-bottom">
                                            
                 <select name = "user" class="form-select shadow-none p-0 border-0 form-control-line">
                                        
     <?php
                                               
                                                
            foreach ($data as $user) {
               
//            '<option>'. $user["user_id"] . '</option>';
            echo '<option value = "'.$user["user_id"].'">'. $user["user_ar_name"] . '</option>';
            
                   }
      ?>
                 </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
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