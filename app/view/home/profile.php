<?php
if (isset ($_SESSION["name"])) {
require_once "header2.php";
    
    
    
?>

<br>
<br>


<div class="container mt-5">
    <div class="card">
      <div class="card-body">
          <?php if ($pending == 0) { ?>
            <div class="alert alert-info text-center">
            <h4>"Your account is currently awaiting activation."</h4>
            </div>
          <?php } ?> 
        <div class="row">
          <div class="col-md-3">
            <img src="<?=CSS_PATH . "back/plugins/images/" . $data[0][9]?>" alt="profile photo" class="img-fluid rounded-circle " >
          </div>
          <div class="col-md-9">
              
            <h5 class="card-text"><i class="fa-solid fa-user"></i> username : <?php echo $_SESSION["name"] ; ?> </h5> <hr>
            <p class="card-text"><i class="fa-solid fa-file-signature"></i> Full Name : <?php echo $data[0][8]?> </p>
            <p class="card-text"><i class="fa-solid fa-envelope"></i> E-Mail : <?php echo $data[0][3]?> </p>
            <p class="card-text"><i class="fa-solid fa-calendar-days"></i> Registred Date : <?php echo $data[0][7]?></p>
              
              <a href = "edituser" class="btn btn-primary btn-sm"> Edit your information</a>
              
          </div>
        </div>
      </div>
        <?php if (!empty ($data[0]["itemName"])) { ?>
      <div class="list-group list-group-flush">
        <div class="list-group-item container"> <h4 class="container text-center">Your Ads</h4>
         		<div class="row m-4">
            <?php foreach ($data as $new) { ?>

			<div class="col-md-4 mb-4">
				<div class="card">
					<img src="<?=CSS_PATH.'back/plugins/images/'.$new['itemImg']?>" class="card-img-top" height = "200px" width= "150px" >
					<div class="card-body">
						<h5 class="card-title"><?= $new["itemName"]?></h5>
						<p class="card-text"><?= $new["itemDesc"]?></p>
						<p class="card-text"><?= $new["itemDate"]?></p>
                        <?php 
                        if ($new["approve"] == 0 ) {
                            
						echo '<p class="card-text alert alert-danger">Your ads waiting activate</p>' ;
                            
                        }
                        
                        ?>
						<p class="card-text">Made In : <?= $new["itemMadeIn"]?></p>
						<p class="card-text alert-danger"><b><?= $new["itemPrice"]?>$</b></p>
						<a href="<?= CSS_PATH . "homecontroller/item/" . $new["itemId"]?>" class="btn btn-primary">Show Item</a>
					</div>
				</div>
			</div>
            
            <?php               
                        }
            }else {
    
            
    echo '<h4 class="container text-center alert alert-info mt-5">You don\'t have ads yet</h4>' ;
    
        } 
            ?>
		
	
	
 
              
            </div>
          </div>
        </div>
    </div>
</div>
<?php
  if (!empty ($comment))   { ?>
?>
 <div class="comment-widgets">
      <div class="list-group-item container"> <h4 class="container text-center">Your Comments</h4>
                                <!-- Comment Row -->
                                     <?php
                                foreach ($comment as $a) { ?>
                                
                                <div class="d-flex flex-row comment-row p-3 mt-0">
                                    <div class="p-2"><img src="<?=CSS_PATH.'back/plugins/images/'.$a['userImg']?>"  alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium"><?= $_SESSION["name"] ?> </h5>
                                        <span class="mb-3 d-block"><?= $a["description"] ?> </span>
                                        <div class="comment-footer d-md-flex align-items-center">
                                             <span >On Item <b><?= $a["items"]?></b></span>
<!--                                             <span class="badge bg-primary rounded">Pending</span>-->
                                            <hr>
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0"><?= $a["date"] ?></div>
                                             
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                ?>
                                
                     
                            </div>

</div>


<?php
  }else {
        echo '<h4 class="container text-center alert alert-info mt-5">You don\'t have any comments yet</h4>' ;
  }
}
echo "<div class ='fixed-bottom' >";
require_once "footer.php";
echo "</div>" ;
?>