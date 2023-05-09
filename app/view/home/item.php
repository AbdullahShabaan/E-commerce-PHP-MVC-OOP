<?php 
require_once "header2.php";
?>
<br>
<br>
<br>
<br>
<br>
<body >
<!--    <div class="container">-->
  <div class="container ">
  <div class="container card">
    <?php 
           
        foreach ($item as $i) { 
        
        if ($i["approve_status"] == 0) {
           echo  "<div class='alert alert-danger text-center'><h4>\"Your advertisement is currently awaiting activation. This page is only visible to you. Thank you for your patience.\"</h4></div>";
        }
        
        ?>
    <div class="row">
      <div class="col-md-6">
        <h1 class="mb-3"><?php echo $i["name"] ?></h1>
        <h4 class="mb-3">Advertiser : <?php echo $i["memberName"] ?></h4>
          <h5 class="mb-3">Category : <a href="<?= CSS_PATH . 'homecontroller/cat/'.$i['cat_id']?>" > <?= $i["catName"]?></a></h5>
        <h5 class="mb-3">More Details : <?php echo $i["description"] ?></h5>
        <h5 class="mb-3">Puplished on : <?php echo $i["date"] ?></h5>
        <h5 class="mb-3">Made in : <?php echo $i["made_in"] ?></h5>
<!--        <p class="lead">Rating : <?php echo $i["status"] ?></p>-->
        <h5 class="mb-3">Status : <?php echo str_replace ( [1 , 2 , 3 ] , ["new" , "like new" , "old"] , $i["status"]) ?></h5>
        <h2 class="mb-3 alert alert-danger">$<?php echo $i["price"] ?></h2>
        <form>
          <div class="form-group">
            <label for="quantity">Quantity :</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="10" value="1">
          </div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Buy
</button>            

</form>


      
          
      </div>
          <div >
        <img src="<?=CSS_PATH."back/plugins/images/".$i["img"]?>" class="img-fluid my-5" alt="product photo" width="400px"  >
      </div>
    </div>
      </div>
      <hr>
      <br>
 <a  class = "float-right btn btn-info" href= "<?=CSS_PATH . 'homecontroller/index'?>"class="btn btn-secondary m-3">Back Home</a>

          <?php  }
      
      ?>




                  <div class="col-md-12 col-lg-10 col-sm-8">
                        <div class="card white-box p-0">
                            <div class="card-body">
                                
                             
                                <h3 class="box-title mb-0">Comments</h3>
                            </div>
                            <div class="comment-widgets">
                                <!-- Comment Row -->
                                     <?php
                                foreach ($comment as $a) { ?>
                                
                                <div class="d-flex flex-row comment-row p-3 mt-0">
                                    <div class="p-2"><img src="<?=CSS_PATH.'back/plugins/images/'.$a['image']?>"  alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium"><?= $a["userName"] ?> </h5>
                                        <span class="mb-3 d-block"><?= $a["description"] ?> </span>
                                        <div class="comment-footer d-md-flex align-items-center">
<!--                                             <span class="badge bg-primary rounded">Pending</span><br>-->
                                             <span >On Item <b><?= $a["itemName"] ?></b></span>
                                             <hr>
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0"><?= $a["date"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                ?>
                                
                     
                            </div>
                        </div>

  <div class="card">
    <div class="card-body">
        <?php if (isset ($_SESSION["name"])) { ?>
      <form action="<?=CSS_PATH . "homecontroller/SetComment/" . $item[0]["id"];?>" method="POST">
        <div class="form-group">
          <label for="comment">Add comment : </label>
          <textarea required class="form-control" name="comments" id="comment" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </div>
          <?php }else {
    echo "<div class='alert alert-info'>login or signup to set a comment  "; 
    echo "<a href='".CSS_PATH . "homecontroller/userlogin"."'>Login</a>" ;
    echo "</div>" ;
} ?>

                    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Payment Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="card-number" class="control-label">Card Number</label>
            <input type="text" class="form-control" id="card-number" placeholder="Enter card number">
          </div>
          <div class="form-group">
            <label for="expiry-date" class="control-label">Expiry Date</label>
            <input type="text" class="form-control" id="expiry-date" placeholder="Enter expiry date">
          </div>
          <div class="form-group">
            <label for="cvv" class="control-label">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="Enter CVV">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php 
require_once "footer.php";
?>