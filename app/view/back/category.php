<?php
require_once 'header.php';
?>



  
      
        <div class="page-wrapper">

            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Categories Page</h4>
                    </div>
              
                </div>
   
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Categories </h3>
                            <?php
                            echo "<div >";
                            echo "<td>" . "<a href='add' class='btn btn-info m-1'>Add Category</a>"  . "</td>";
                            echo "</div>";
                            ?>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">User</th>
                                            <th class="border-top-0">Control</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                               
                                        
                    <?php
                      
                                        if (!empty ($data)) {
                                        foreach ($data as $new) {
                                            echo "<tr>";
                                            echo "<td>" . $new ['id']  . "</td>" ;
                                            echo "<td>" . $new ['name']  . "</td>" ;
                                            echo "<td>" . $new ['description']  . "</td>" ;
                                            echo "<td>" . $new ['date']  . "</td>" ;
                                            echo "<td>" . $new ['user_ar_name']  . "</td>" ;
                                            echo "<td>" . "<img src='" . CSS_PATH . "back/plugins/images/" . $new ['img']  . "' alt='CategoryImage' width='100px' height='100px'  />" . "</td>" ;
                                            echo "<td>" . "<a href='".CSS_PATH."admincontroller/edit/".$new['id']."' class='btn btn-success '>Edit</a>"  . "</td>" ; 
                                            echo "<td>" . "<a href='".CSS_PATH."admincontroller/delete/".$new['id']."' class='btn btn-danger '>Delete</a>"  . "</td>";
                                            echo "</tr>";
                                        }
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            
<!--
             <img src=" <?= CSS_PATH . "htdocs/newsPro/app/view/back/"?>W.png" alt="alternative text">
             <img src="<?= CSS_PATH ; ?>/back/plugins/images/web.jpg" alt="homepage" />
            <?php
             CSS_PATH ;
            ?>
-->
      

<?php
require 'footer.php';
?>