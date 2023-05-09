<?php
ob_start () ; 
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin News</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= CSS_PATH ; ?>/back/plugins/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ByBxVJW0y+GJX9tN+TtFFo/8Z8Y1TJL1zqN2Qs/h845yEa3cX9IuOD0+JbFwWY/XnE+7CJmIzrVlZf8pP9e9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/1646f4ce46.js" crossorigin="anonymous"></script>
    
    <!-- Custom CSS -->
   <link href="<?= CSS_PATH ; ?>/back/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--    [if lt IE 9]>-->
<!--
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
-->
<!--<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="<?= CSS_PATH ; ?>/back/plugins/images/logo-icon.png" alt="homepage" />
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?= CSS_PATH ; ?>/back/plugins/images/logo-text.png" alt="homepage" />

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li> 
                            <a class="profile-pic" href="#">
                            <?php 
                             $b = $_SESSION["data"] ;
                                foreach ($b as $d ) {
//                                    echo $d['image'];
                                }
                            if (!empty($b)) { 
                            foreach ($b as $da ) { ?> 
                                <img src="<?=CSS_PATH.'back/plugins/images/'.$d['image']?>" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?= $da["user_ar_name"] ?> </span>
                            <?php } 
                            }else {?>
                                <img src="<?=CSS_PATH?>back/plugins/images/1.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?=$_SESSION["user"]?></span>
                            <?php } 
                            ?>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
              <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= CSS_PATH.'admincontroller/';?>dashboard"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= CSS_PATH.'admincontroller/';?>profile"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= CSS_PATH.'admincontroller/';?>cat"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= CSS_PATH.'admincontroller/';?>items"
                                aria-expanded="false">
                             <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Items</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= CSS_PATH.'admincontroller/';?>members"
                                aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Members</span>
                            </a>
                        </li>
                           <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= CSS_PATH.'admincontroller/';?>pending"
                                aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Pending Members</span>
                            </a>
                        </li>
                          <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= CSS_PATH.'admincontroller/';?>comments"
                                aria-expanded="false">
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                <span class="hide-menu">Comments</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index"
                                aria-expanded="false">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span class="hide-menu">Blank Page</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=CSS_PATH . "admincontroller/logout"?>"
                                aria-expanded="false">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="hide-menu">LogOut</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="error404"
                                aria-expanded="false">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <span class="hide-menu">Error 404</span>
                            </a>
                        </li>
                 
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
            <div class="row align-items-center">
               
           <div class="col-lg-11 m-2">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href='<?=CSS_PATH."admincontroller/dashboard/"?>' class="fw-normal">Dashboard</a></li>
                            </ol>
                        
                        </div>
                    </div>
                 
                </div>
        
<?php
ob_end_flush() ;
                        