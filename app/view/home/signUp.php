<?php
require_once "header.php" ;
?>
<br>
<br>
<br>
<br>


 <div class="container" >
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>SignUp</h4>
                    </div>
                    <div class="card-body">
                    <form action ="postSignUp" method="POST">
                            
                    <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Username</label>
                    <input type="text" name = "name" class="form-control" id="inputEmail4"
                           placeholder ="enter username">
                    </div>
                    <div class="col-md-12">
                    <label  class="form-label">Password</label>
                  <input type="password" class="form-control" name = "pass1">
                    </div>
                    <div class="col-md-12">
                    <label  class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name = "pass2">
                    </div>
                    <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input name ="mail" type="text" class="form-control"  placeholder="enter a valid e- mail">
                    </div>
                    <div class="col-12">
                    <label for="inputAddress2" class="form-label">Full Name</label>
                    <input name = "full_name" type="text" class="form-control"  placeholder="enter your full name">
                    </div>
             
                <button type="submit" class="btn btn-danger float-right mt-3 w-40" name ="login">Enter</button>
                        
                        
                    </form>
                 </div>
             </div>
         </div>
    </div>
</div>