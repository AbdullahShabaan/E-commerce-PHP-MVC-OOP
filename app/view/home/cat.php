<?php
require "header2.php";
?>





<div class="jumbotron text-center">
        <h1 class="carousel-title">Products of <?php 
                                foreach ($catName as $d) {
                                    echo $d["name"] ;
                                }
                                                        ?></h1>
    <p></p>
   
  
<?php
if (empty($item)) {
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<div class='alert alert-info'><h4>there is no items in this category</h4></div>";
}
    ?>
    
    
</div>

           <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="d-md-flex">
                          
                                
                                	<div class="container">
<!--		<h1>الأقسام</h1>-->
            
		<div class="row m-4">
            <?php foreach ($item as $new) { 
            if ($new["approve_status"] == 1) {
            
            ?>
            
			<div class="col-md-4 mb-4">
				<div class="card">
                    <a href="<?= CSS_PATH . "homecontroller/item/" . $new["id"]?>" >
					<img src="<?=CSS_PATH.'back/plugins/images/'.$new['img']?>" class="card-img-top" height = "200px" width= "150px" >
                    </a>
					<div class="card-body">
						<h5 class="card-title"><?= $new["name"]?></h5>
						<p class="card-text"><?= $new["description"]?></p>
						<p class="card-text"><?= $new["date"]?></p>
						<p class="card-text">Made In : <?= $new["made_in"]?></p>
						<p class="card-text alert-danger"><b><?= $new["price"]?>$</b></p>
						<a href="<?= CSS_PATH . "homecontroller/item/" . $new["id"]?>" class="btn btn-primary">Show Item</a>
					</div>
				</div>
			</div>
            
            <?php } } ?>
		
	
		</div>
	</div>
                            </div>
                        
                        </div>
                    </div>
                </div>
        
        
        














<?php
echo "<div class ='fixed-bottom' >";
require_once "footer.php";
echo "</div>" ;
?>
