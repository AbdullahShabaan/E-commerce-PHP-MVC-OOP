<?php
require_once "header.php" ;
?>
<br>
<br>
<br>
 <div class="container" >
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action ="postlogin" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria- placeholder="enter your username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="enter your password" name ="pass"> 
                            </div>
                            <div class="d-flex justify-content-between">
                            
                                <a  href="<?= CSS_PATH . "homecontroller/signUp"?>">signup?</a>
                            </div>
                            <button type="submit" class="btn btn-danger float-right mt-3 w-40" name ="login">Enter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


