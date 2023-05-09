<?php
require_once 'header.php';

?>




                       
         
       
            
   <div class="page-wrapper">

   
            <div class="container-fluid">
 
                   
                            <h3 class="box-title">Members table</h3>
                            <div class="m-3">
     
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Comment</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Item</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Control</th>
                                     
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
                                        foreach ($data as $da) {
                                            echo "<tr>";
                                            echo "<td>". $da['description']."</td>";
                                            echo "<td>". $da['user']."</td>";
                                            echo "<td>". $da['name']."</td>";
                                            echo "<td>". $da['date']."</td>";
                                            
                                        
                                            echo "<td>" . "<a href='".CSS_PATH."admincontroller/updatecomment/".$da['id']."' class='btn btn-primary m-1 '>Edit</a>" ; 
                                            echo  "<a href='".CSS_PATH."admincontroller/deletecomment/".$da['id']."' class='btn btn-danger m-1'>Delete</a>"  . "</td>";
                                           
                                            echo "</tr>";  
                                        
                                        } 
                                        
                                  
                                        
?>                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

       </div>
       </div>


<?php
require 'footer.php';
?>