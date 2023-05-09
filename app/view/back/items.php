<?php
require_once 'header.php';

?>




                       
         
       
            
   <div class="page-wrapper">

         
    
 
                <div class="row">
                   
                            <h3 class="box-title">Items Control</h3>
                            <div class="m-3">
                             <b>Sorting</b>
        <a href='<?=CSS_PATH."admincontroller/items/"?>ASC' class='btn btn-info m-1'>ASC</a> |
        <a href='<?=CSS_PATH."admincontroller/items/"?>DESC' class='btn btn-warning'>DESC</a> |
        <a class="btn btn-primary " href='<?=CSS_PATH."admincontroller/additem"?>'>Add Item</a>
      
                            </div>
                            <div >
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">User</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">MadeIn</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Control</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
                                        foreach ($data as $da) {
                                            echo "<tr>";
                                            echo "<td>". $da['id']."</td>";
                                            echo "<td>". $da['name']."</td>";
                                            echo "<td>". $da['description']."</td>";
                                            echo "<td>". $da['price']. "$" ."</td>";
                                            echo "<td>". $da['date']."</td>";
                                            echo "<td>". $da['catname']."</td>";
                                            echo "<td>". $da['user']."</td>";
                                            
                                            if ($da['status'] == 1 ) {
                                                echo "<td>". "old" ."</td>";
                                            }elseif ($da['status'] == 2 ) {
                                                echo  "<td>". "Like new" ."</td>";
                                            }elseif ($da['status'] == 3 ) {
                                                echo  "<td>". "New" ."</td>";
                                            } else {
                                                echo "-";
                                            }
//                                           
                                            echo "<td>". $da['made_in']."</td>";
                                              echo "<td>" . "<img src='" . CSS_PATH . "back/plugins/images/" . $da ['img']  . "' alt='CategoryImage' width='100px' height='100px'  />" . "</td>" ;
                                            echo "<td>" . "<a href='".CSS_PATH."admincontroller/updateitem/".$da['id']."' class='btn btn-primary btn-sm'>Edit</a>" . "</td>" ; 
                                            
                                            if ($da["approve_status"] == 0) {
                                            echo   "<td>" . "<a href='".CSS_PATH."admincontroller/approveitem/".$da['id']."' class='btn btn-success btn-sm'>Confirm</a>" . "</td>" ;
                                            }
                                           
                                             echo  "<td>" ."<a href='".CSS_PATH."admincontroller/deleteitem/".$da['id']."' class='btn btn-danger btn-sm '>Delete</a>"  . "</td>";
                                           
                                            echo "</tr>"; 
                                        
                                        } 
                                        
                                  
                                        
?>                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

  


<?php
require 'footer.php';
?>