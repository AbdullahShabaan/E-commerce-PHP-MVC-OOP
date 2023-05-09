<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>TimelessWatches</title>

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
                    echo strtoupper ($_SESSION["name"] );
                }else {
                    echo "TimelessWatches";
                }
                
                ?></h5>
           
                             
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item m-3">
                        <b><a  class = "text-dark" href="<?=CSS_PATH?>homecontroller/index">Home</a></b>
                    </li>
              
        <?php
                    if (isset ($_SESSION["name"])) {
        ?>
                     <div class="btn-group ">
<!--                             <button type="button" class="btn btn-info btn-sm">Categories</button>-->
                             <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             </button>
                             <div class="dropdown-menu">
                    
                    
                    <li class="dropdown-item ">
                        <a   href="<?=CSS_PATH . "homecontroller/"?>profile">Profile</a>
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
                        
                    <?php
                    }
                              ?>
                </ul>
            </div>
        </div>
    </nav>
    
    

  
