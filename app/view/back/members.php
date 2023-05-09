<?php
require_once 'header.php';

?>




                       
         
       
            
   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Members Control</h4>
                    </div>
                 
                </div>
    
            <div class="container-fluid">
 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Members table</h3>
                            <div class="m-3">
                             <b>Sorting</b>
        <a href='<?=CSS_PATH."admincontroller/members/"?>ASC' class='btn btn-info m-1'>ASC</a> |
        <a href='<?=CSS_PATH."admincontroller/members/"?>DESC' class='btn btn-warning'>DESC</a> |
        <a class="btn btn-primary " href='<?=CSS_PATH."admincontroller/addmember/"?>'>Add Member</a>
      
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">E-mail</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Full Name</th>
                                            <th class="border-top-0">Profile Photo</th>
                                            <th class="border-top-0">Control</th>
                                            <th class="border-top-0">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
                                        foreach ($data as $da) {
                                            echo "<tr>";
                                            echo "<td>". $da['id']."</td>";
                                            echo "<td>". $da['name']."</td>";
                                            echo "<td>". $da['e_mail']."</td>";
                                            echo "<td>". $da['address']."</td>";
                                            echo "<td>". $da['full_name']."</td>";
                                              echo "<td>" . "<img src='" . CSS_PATH . "back/plugins/images/" . $da ['img']  . "' alt='CategoryImage' width='100px' height='100px'  />" . "</td>" ;
                                            echo "<td>" . "<a href='".CSS_PATH."admincontroller/editmember/".$da['id']."' class='btn btn-success '>Edit</a>"  . "</td>" ; 
                                            echo "<td>" . "<a href='".CSS_PATH."admincontroller/deletemember/".$da['id']."' class='btn btn-danger '>Delete</a>"  . "</td>";
                                           
                                            echo "</tr>";  
                                        
                                        } 
                                        
                                  
                                        
?>                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

       </div>
       </div>


<?php
require 'footer.php';
?>