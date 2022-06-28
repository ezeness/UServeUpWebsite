<?php defined('BASEPATH') or exit('No direct script access allowed'); 
?>

    <!DOCTYPE html>
    <html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?=$utagUpCCategory->UTagcategoryFirstName?> <?=$utagUpCCategory->UTagcategoryMiddleName?> <?=$utagUpCCategory->UTagcategoryLastName?></title>
        
        <meta name="description" content="<?=$utagUpCCategory->UTagcategoryFirstName?> <?=$utagUpCCategory->UTagcategoryMiddleName?> <?=$utagUpCCategory->UTagcategoryLastName?>">
        <meta name="keywords" content="<?=$utagUpCCategory->UTagcategoryFirstName?> <?=$utagUpCCategory->UTagcategoryMiddleName?> <?=$utagUpCCategory->UTagcategoryLastName?>">
        <meta name="author" content="<?=$utagUpCCategory->UTagcategoryFirstName?> <?=$utagUpCCategory->UTagcategoryMiddleName?> <?=$utagUpCCategory->UTagcategoryLastName?>">
        <meta 
        name='viewport' 
        content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
    />
        <meta property="og:url" name="shareUrl" content="<?= site_url(); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?= $page_title; ?>" />
        <meta property="og:description" content="<?= $page_desc; ?>" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="icon" type="image/png" sizes="16x16" href="">
            <link rel="shortcut icon" href="<?= $assets; ?>images/logo.png" type="image/x-icon" /> 
            <title><?=$utagUpCCategory->UTagcategoryFirstName?> <?=$utagUpCCategory->UTagcategoryMiddleName?> <?=$utagUpCCategory->UTagcategoryLastName?></title>
            <link rel="stylesheet" href="<?= $assets; ?>css/bootstrap.min.css">
            <link rel="stylesheet" href="<?= $assets; ?>css/slick.css">
            <link rel="stylesheet" href="<?= $assets; ?>fonts/fonts.css">
            <link rel="stylesheet" href="<?= $assets; ?>fonts/font-awesome/fontawesome-all.min.css">
            <link rel="stylesheet" href="<?= $assets; ?>css/animate.css/animate.min.css">
            <link rel="stylesheet" href="<?= $assets; ?>css/aos/aos.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css">
            <link rel="stylesheet" href="<?= $assets; ?>css/stylesheet.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
            
 

        <script>
            var base_url = '<?= base_url(); ?>';
            var assets = '<?= $assets ?>';
        </script>
    </head>
<?php 
$uri =  $this->uri->segment(1);
?>
    <style>
.swal-wide{
    width:400px !important;
}

.logo_color {
    color: <?=$utagUpCCategory->UTagcategoryColor?>;
}
</style>
</head>
  <body>
    <div class="overlay show"></div>
    <div class="loader_overlay" style="display:none">
        <div class="loading">Loading&#8230;</div>
    </div>
        <header class="header" id="home">
            <div class="header-top">
                <div class="container">
                    <div class="header-top-block">
                        <div class="header-top-left">
                            <div class="logo">
                                <a href="<?=base_url(); ?>" class="logo_text">
                                <h4><?=$utagUpCCategory->UTagcategoryFirstName?><sub class="logo_color"><?=$utagUpCCategory->UTagcategoryMiddleName?> </sub></h4>
                                <h4 class="up_text"><?=$utagUpCCategory->UTagcategoryLastName?></h4>
                                    <!-- <img src="<?= $assets; ?>images/logo.png" alt="" class="img-fluid"> -->
                                </a>
                            </div>

                            <div class="service-24">
                                <a href="<?=base_url('twentyseven')?>">
                                <img src="<?= $assets; ?>images/Icons/24-7-png-8.png" alt=""></a>
                            </div>
                        </div>
                        <div class="med">
                            <div class="header-search">
                            <?= form_open('search', 'id="header_search"'); ?> 
                                    <input type="text" placeholder="Search.." name="search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="header-top-icon">
                                <ul style="display: inline-table;">
                                <li  class="<?=$uri == 'home' ? 'active' : ''?>">

                                    <?php 
                                       if($loggedIn){
                                          
                                           if(empty($Timeline)){?>
                                        <a href="#" onclick="openSettingsTab()"> 
                                          <?php } else{ 
                                    ?>
                                       <a href="<?=base_url('home')?>"> 
                                       <?php } } else{
                                           ?>
                                        <a href="#" onclick="openSettingsTab()"> 
                                        <?php } ?>
                                       <img src="<?= $assets; ?>images/home (2).png" style="height: 26px;width:26px;"></a>
                                    
                                </li>
                                <li class="<?=$uri == '' ? 'active' : ''?>">
                                    <a href="<?php echo site_url('/'); ?>" class="search-icon">
                                        <img src="<?= $assets; ?>images/explore_fill.png" alt="Home-icon" style="height: 26px !important;width:26px !important;margin:4px;">
                                    </a>
                                </li>
                                    <li style="margin-top: -3px;">
                                            <a class="user_back_white" href="#" onclick="openSettingsTab()">
                                            <?php 
                                                if($loggedIn){
                                                    echo "<img src='".$loggedInUser->UserImage."' style='
                                                   
                                                    height: 27px;
                                                    width: 27px;
                                                    margin-top: 5px;
                                                    margin-right: 0px;
                                                    border-radius: 50%;'>";
                                                } else{
                                                ?>

                                            <img src="<?= $assets; ?>images/profile-user.png" style="
                                                   
                                                    height: 27px;
                                                    width: 27px;
                                                    margin-top: 5px;
                                                    margin-right: -1px;
                                                    border-radius: 50%;">
                                            <?php } ?>
                                            </a>
                                                        </li>

                                    <li class="<?=$uri == 'writeup' ? 'active' : ''?>">
                                        <a href="<?=base_url('writeup')?>" > 
                                        <img src="<?= $assets; ?>images/writeupblack.png" alt="Home-icon" style="height:29px;width:29px;margin:0px;padding:0px;margin-top: 2px;"> </a>
                                    </li>
                                  
                                    <li>
                                    <a href="#" onclick="openSettingsTab()"> 
                                            <img src="<?= $assets; ?>images/chat_icon.png" alt="Chat-icon" class="chat_icon"> 
                                            <img src="<?= $assets; ?>images/call_icon.png" alt="Home-icon" style="height:29px;width:29px;margin:0px;margin-top: 2px;"> 
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="header-top-right">
                        <?php 
                        if($loggedIn){?>

                                <div class="dropdown">
                                        <p style="float:right" class="dropdown-toggle"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton"> 
                                        <?=$loggedInUser->Name?>
                                        <img  style="width:35px;border-radius: 50px;" src="<?=$loggedInUser->UserImage?>" alt="user icon">
                                    </p> 
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?php echo site_url('/addresses'); ?>">Addresses</a>
                                    <a class="dropdown-item" href="<?php echo site_url('/profile/'.$loggedInUser->Id); ?>">Profile</a>
                                    <a class="dropdown-item" href="<?php echo site_url('/logout'); ?>">Logout</a>
                                </div>
                                </div>
                            <?php } else{
                                ?>
                                        <p class="" style="float:right" class="dropdown-toggle" > 
                                           <a href="<?=base_url('signup')?>"> Sign In</a>
                                    </p> 
                            <?php } ?>    
                        </div>
                        </div>
                    </div>
                    <div class="header-bottom">
                <div class="container">
                    <div class=header-bottom-block>
                        <div class="header-bottom-left" >
                            <div class="c-menu">
                                <?php
                               ?>
                                    <ul class="nav nav-tabs Navbar_Tabss discover_navbar">

                                    <?php
                                        if (isset($discovernavbar)) {
                                            foreach ($discovernavbar as $key) {
                                                ?>
                                        <!-- <li class="nav-item">
                                            <a style="cursor: pointer;" 
                                            id="pills-<?=$key['Type']?>-tab" data-toggle="pill" href="#pills-<?=$key['Type']?>" role="tab" aria-controls="pills-<?=$key['Type']?>" aria-selected="true"
                                            class="nav-link <?php echo $filter == $key['Type'] ? 'active' : ''; ?> " data-type="<?=$key['Type']; ?>"><?=$key['Title']; ?></a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a style="cursor: pointer;" 
                                            id="pills-<?=$key['Type']?>-tab" data-toggle="pill" href="#pills-<?=$key['Type']?>" role="tab" aria-controls="pills-<?=$key['Type']?>" aria-selected="true"
                                            class="nav-link navbar_type <?php echo $filter == $key['Type'] ? 'active' : ''; ?> " data-type="<?=$key['Type']; ?>"><?=$key['Title']; ?></a>
                                        </li>

                                        <?php
                                            }
                                        }
                                    ?>
                                    </ul>

                                    <ul class="nav nav-tabs Navbar_Tabss store_navbar" style="display:none">

                                    <?php
                                        if (isset($storenavbar)) {
                                            foreach ($storenavbar as $key) {
                                                ?>
                                        <li class="nav-item">
                                            <a style="cursor: pointer;" 
                                            id="pills-<?=$key['Type']?>-tab" data-toggle="pill" href="#pills-<?=$key['Type']?>" role="tab" aria-controls="pills-<?=$key['Type']?>" aria-selected="true"
                                            class="nav-link navbar_type <?php echo $filter == $key['Type'] ? 'active' : ''; ?> " data-type="<?=$key['Type']; ?>"><?=$key['Title']; ?></a>
                                        </li>

                                        <?php
                                            }
                                        }
                                    ?>
                                    </ul>

                            </div>
                        </div>
                        <div class="header-bottom-right">
                             <?php 
                            if($loggedIn){ 
                                if($loggedInUser->Store->LicenseType == 'Corp' && strpos($loggedInUser->Store->PlanName , '24') !== false){
                                ?>

                            <a href="<?=base_url('twentyseven')?>">                               
                            <img src="<?= $assets; ?>images/Icons/24-7 icon.png" alt="24/7" class="img-fluid">
                            </a>
                            <?php } } ?>
                        </div>
                    </div>
                    <div id="mySidenav" class="sidenav">
                        <div class="slider-block">
                            <div class="side-top">
                                <div class="set-top">
                                    <div class="tile-pro">
                                        <p> <?=$utagUpCCategory->UTagcategoryFirstName?> <?=$utagUpCCategory->UTagcategoryMiddleName?> <?=$utagUpCCategory->UTagcategoryLastName?> <i class="fas fa-chevron-down"></i></p>
                                    </div>
                                    <div class="ser">
                                        <form action="">
                                            <input type="text" class="searchTerm" placeholder="Search">
                                            <!-- <button type="submit" class="searchButton">
                                                <img src="<?= $assets; ?>images/Icons/search-icon grey1.png" alt="" class="img-fluid">
                                            </button> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="fil">
                                    <div class="fil-left">
                                        <a href="#"><i class="fas fa-square-full"></i> FILTER</a>
                                    </div>
                                    <div class="fil-right">
                                        <div class="c-menu">
                                            <ul class="nav nav-tabs">
                                                <?php
                                                 if (isset($navbar)) {
                                                     foreach ($navbar as $key) {
                                                         ?>
                                                <li class="nav-item" >
                                                    <a id="<?=$key['Type']?>" class="nav-link back_link"  onclick="filterNav('<?=$key['Type']?>')" href="#"><?=$key['Title']; ?></a>
                                                </li>
                                                <?php
                                                     }
                                                 } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rows">
                            <div class="col-sm-3s side_cats_filter">
                                <ul class="nav nav-tabs tabs-left">
                                    <?php if (isset($catagories)) : ?>
                                        <?php foreach ($catagories as $key => $catagory) : ?>
                                            <?php if ($key == 0) : ?>
                                                <li>
                                                    <a href="#SideTabCats" data-toggle="tab" class="active" id="SideClick" data-id="<?php print_r($catagory['Id']); ?>" onclick="sideCats('<?php print_r($catagory['Id']); ?>')">
                                                    <!-- <a href="#ClientInfo" data-toggle="tab" > -->
                                                        <img src="<?php print_r($catagory['CategoryThumbImage']); ?>" alt="icomn" style="height:40px; width:40px; object-fit: cover;border-radius: 50%;">
                                                        <p><?php print_r($catagory['Name']); ?></p>
                                                    </a>
                                                </li>
                                                <?php else : ?>
                                                <li>
                                                    <a href="#SideTabCats" data-toggle="tab"  id="SideClick"  data-id="<?php print_r($catagory['Id']); ?>" onclick="sideCats('<?php print_r($catagory['Id']); ?>' , '')">
                                                        <img src="<?php print_r($catagory['CategoryImage']); ?>" alt="icomn" style="height:40px; width:40px; object-fit: cover; border-radius: 50%;">
                                                        <p><?php print_r($catagory['Name']); ?></p>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                       
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-sm-9s">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="SideTabCats">
                                        <!-- <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="assets/images/Icons/Category User Icon grey.png" alt=""> Store Category
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i>-</i>
                                                            <img src="assets/images/Icons/Category User Icon grey.png" alt="">
                                                            <span> Department</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i>-</i>
                                                            <img src="assets/images/Icons/Category User Icon grey.png" alt="">
                                                            <span> Department</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                    </div>
                </div>
            </div>
                </div>
            </div>


        </header>

       <div class="container" id="main_body_div">
