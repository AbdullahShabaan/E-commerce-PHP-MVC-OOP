<?php
require_once "header.php";
?>


  <header id="home" class="header">
        <div class="overlay"></div>

        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">  
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">
                                Find your perfect <br> timepiece .</h1>
                            <button class="btn btn-primary btn-rounded">Learn More</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">Welcome to <br> Timeless Watches </h1>
                            <button class="btn btn-primary btn-rounded">Learn More</button>
                          </div>
                    </div>
                  
                </div>
            </div>        
        </div>

        <div class="infos container mb-4 mb-md-2">
            <div class="title">
                <h5>Timeless elegance for every occasion</h5>
                <p class="font-small">"Make a statement with our luxurious timepieces."</p>
            </div>
            <div class="socials text-right">
                <div class="row justify-content-between">
                    <div class="col">
                        <a class="d-block subtitle"><i class="ti-microphone pr-2"></i> (123) 456-7890</a>
                        <a class="d-block subtitle"><i class="ti-email pr-2"></i> Timeless@website.com</a>
                    </div>
                    <div class="col">
                        <h6 class="subtitle font-weight-normal mb-2">Social Media</h6>
                        <div class="social-links">
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-twitter-alt"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-google"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-pinterest-alt"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-instagram"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
      

    <section class="section" id="about">
        

        <div class="container">

            <div class="row align-items-center mr-auto">
                <div class="col-md-4">
                 
                    <h3 class="section-title">About Us</h3>
                    <p>We offer a variety of high-quality watches from top brands at affordable prices. Our team is dedicated to providing excellent customer service and ensuring a seamless online shopping experience. Thank you for choosing us as your destination for watches!</p>

                </div>
                <div class="col-sm-6 col-md-4 ml-auto">
                    <div class="widget">
                        <div class="icon-wrapper">
                            <i class="ti-calendar"></i>
                        </div>
                        <div class="infos-wrapper">
                            <h4 class="text-primary"><?=$itemCount?>+</h4>
                            <p>Ads</p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="icon-wrapper">
                            <i class="ti-face-smile"></i>
                        </div>
                        <div class="infos-wrapper">
                            <h4 class="text-primary">125+</h4>
                            <p>onsectetur perspiciatis</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="widget">
                        <div class="icon-wrapper">
                            <i class="ti-comment"></i>
                        </div>
                        <div class="infos-wrapper">
                            <h4 class="text-primary"><?=$commentsCount?>+</h4>
                            <p>Comments</p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="icon-wrapper">
                            <i class="ti-user"></i>
                        </div>
                        <div class="infos-wrapper">
                            <h4 class="text-primary"><?=$membersCount?>+</h4>
                            <p>Members</p>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </section>

    <section class="section" id ="cat">
        <div class="container">
            <h3 class="section-title mb-4">Categories</h3>

            <div class="row text-center">
                <?php foreach ($data as $c) { ?>
                <div class="col-lg-4">
                    <a href="<?=CSS_PATH . "homecontroller/cat/" . $c["id"]?>" class="card border-0 text-dark">
                        <img class="card-img-top" src="<?= CSS_PATH . 'back/plugins/images/' . $c["img"]?>"  height="250px" >
                        <span class="card-body">
                            <h4 class="title mt-4"><?=$c["name"]?></h4>
                            <p ><?=$c["description"]?></p>
                        </span>
                    </a>
                </div>
                <?php } ?>
               
            </div>
        </div>
    </section>

    <section class="section"  id="Products">
        <div class="container">
            <h3 class="section-title pb-4">Our Products</h3>
        </div>
        
        
        
        
        
        
        
        
           <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="d-md-flex">
                          
                                
                                	<div class="container">
<!--		<h1>الأقسام</h1>-->
		<div class="row m-4">
            <?php foreach ($item as $new) {
            if ($new["approve_status"] !== 0 ) {  
            
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
            <?php } 
        } 
            ?>
		
          
	
		</div>
	</div>
                            </div>
                        
                        </div>
                    </div>
                </div>
        
        
        
        
        
        
        
        
        
        
        
     
    </section>


    

    <section id="contact" class="section pb-0">

        <div class="container">
            <h3 class="section-title mb-5">Contact Us</h3>

            <div class="row align-items-center justify-content-between">
                <div class="col-md-8 col-lg-7">

                    <form class="contact-form">
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Your Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Send Message">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 d-none d-md-block order-1">
                    <ul class="list">
                        <li class="list-head">
                            <h6>CONTACT INFO</h6>
                        </li>
                        <li class="list-body">
                            <p class="py-2">Contact us and we'll get back to you within 24 hours.</p>
                            <p class="py-2"><i class="ti-location-pin"></i> 12345 Fake ST NoWhere AB Country</p>
                            <p class="py-2"><i class="ti-email"></i>  Timeless@website.com</p>
                            <p class="py-2"><i class="ti-microphone"></i> (123) 456-7890</p>
                            

                        </li>
                    </ul> 
                </div>
            </div>
            <a href="help">help</a>
<?php
require_once "footer.php";
?>