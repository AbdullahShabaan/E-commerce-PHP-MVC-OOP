<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>TimelesWatches</title>

    <!-- font icons -->
    
    <link rel="stylesheet" href="<?= CSS_PATH . 'front2/vendors/themify-icons/css/themify-icons.css'?>" >
    
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= CSS_PATH . 'front2/vendors/owl-carousel/css/owl.carousel.css'?>" >
<link rel="stylesheet" href="<?= CSS_PATH . 'front2/vendors/owl-carousel/css/owl.theme.default.css'?>" >

    <!-- Bootstrap + Ollie main styles -->
	<link rel="stylesheet" href="<?= CSS_PATH . 'front2/css/ollie.css'?>"  >

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?= CSS_PATH . 'front2/imgs/brand.svg'?>" alt="" class="brand-img"></a>
            <h5 class="nav-link"><?php 
                
                if (isset ($_SESSION["name"])) {
                    echo strtoupper ($_SESSION["name"]) ;
                }else {
                    echo "TimelessWatches";
                }
                
                ?></h5>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                             
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=CSS_PATH?>homecontroller/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Products">All Products</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cat">Categories</a>
                    </li>
              
                    
                    <div class="btn-group">
<!--                             <button type="button" class="btn btn-info btn-sm">Categories</button>-->        
                             <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             </button>
                             <div class="dropdown-menu">
                    
                    <?php foreach ($data as $da) { ?>
                    <li class="dropdown-item ">
                        <a   href="<?=CSS_PATH?>homecontroller/cat/<?=$da["id"]?>"><?=$da["name"]?></a>
                    </li>
                    <?php } ?>
                        
                           
                       
                            </div>
                    </div>
                  
                    <?php 
                    
                    if (!isset ($_SESSION["name"])) {
                    ?> 
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link btn btn-primary" href="userlogin">Login/SignUp</a>
                    </li>
                    <?php } else { ?>
                    
                     <div class="btn-group m-2">
<!--                             <button type="button" class="btn btn-info btn-sm">Categories</button>-->
                             <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             </button>
                             <div class="dropdown-menu">
                    
                    
                    <li class="dropdown-item ">
                        <a   href="profile">Profile</a>
                    </li>
                    <li class="dropdown-item ">
                        <a   href="<?=CSS_PATH . "homecontroller/edituser/" . $_SESSION["id"] ?>">Setting</a>
                    </li>
                    <li class="dropdown-item ">
                        <a   href="<?=CSS_PATH . "homecontroller/additem"?>">Add Item</a>
                    </li>
                    <li class="dropdown-item ">
                        <a   href="logout">Logout</a>
                    </li>
               
                        
                           
                       
                            </div>
                    </div>
                    <?php } ?>
                        
                    
                </ul>
            </div>
        </div>
    </nav>
    
    

  
