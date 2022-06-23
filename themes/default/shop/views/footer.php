<?php defined('BASEPATH') or exit('No direct script access allowed');

?>


</div>

<div class="menu-con-menu">
    <div class="container">
        <div class="c-icon">
            <span onclick="openNav()">
                <img src="<?= $assets; ?>images/Icons/Category Icon black.png" width="40px">
            </span>
        </div>
    </div>

</div>
<footer>
    <div class="footer-mian" >
    <!-- <div class="footer-mian" data-aos="fade-up"> -->
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="footer-top-left">
                            <div class="footer-top-left-logo">
                                <div class="logo">
                                    <a href="<?=base_url(); ?>"  class="logo_text">
                                        <h4><?=$utagUpCCategory->UTagcategoryFirstName?><sub class="logo_color"><?=$utagUpCCategory->UTagcategoryMiddleName?></sub></h4>
                                        <h4 class="up_text"><?=$utagUpCCategory->UTagcategoryLastName?></h4>   
                                    <!-- <img src="<?= $assets; ?>images/logo.png" alt="" class="img-fluid"> -->
                                    </a>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer-top-center">
                            <h4>About</h4>
                            <ul>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Corporate Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer-top-center">
                            <h4>Policy</h4>
                            <ul>
                                <li><a href="#">Return Policy</a></li>
                                <li><a href="#">Terms Of Use</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3" style="display:none">
                        <div class="footer-top-right">
                            <h4>News Letter</h4>
                            <form action="" class="newsletter">
                                <div class="">
                                    <input type="email" name="email" placeholder="Email*">
                                </div>
                                <button>Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-block">
                <div class="footer-left">
                    <p>All rights reserved © <?=date('Y')?> <?=$utagUpCCategory->UTagcategoryFirstName?> <?=$utagUpCCategory->UTagcategoryMiddleName?> <?=$utagUpCCategory->UTagcategoryLastName?></p>
                </div>
                <div class="footer-right">
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="navbar-fix-bottom">
    <div class="header-top-icon">
        <ul style="    align-items: baseline;">
        <li>
                <?php  if($loggedIn){
                                          
                            if(empty($Timeline)){?>
                        <a href="#" onclick="openSettingsTab()"> 
                            <?php } else{ 
                    ?>
                        <a href="<?=base_url('home')?>"> 
                        <?php } } else{
                            ?>
                        <a href="#" onclick="openSettingsTab()"> 
                                        <?php } ?>

                <img src="<?= $assets; ?>images/home (2).png" style="height: 26px;width:26px;margin:0px;"></a>
        </li>
        <li>
            <a href="<?php echo site_url('/'); ?>" class="search-icon">
                <img src="<?= $assets; ?>images/explore_fill.png" alt="Home-icon" style="height: 26px !important;width:26px !important;margin-bottom:2px;padding:0px;">
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
                    margin-top: 6px;
                    margin-right: 3px;
                    border-radius: 50%;">
            <?php } ?>
            </a>
                        </li>
            <li>
                    <a href="<?=base_url('writeup')?>">
                     <img src="<?= $assets; ?>images/writeupblack.png" alt="Home-icon" style="height: 30px;width:30px;margin:0px;padding:0px"> </a>
            </li>
            <li>
                <a href="#" onclick="openSettingsTab()"> 
                    <img src="<?= $assets; ?>images/chat_icon.png" alt="Chat-icon" class="chat_icon"> 
                    <img src="<?= $assets; ?>images/call_icon.png" alt="Home-icon" style="height: 30px;width:30px;margin:0px; margin-right:-13px"> 
                </a>
            </li>

        </ul>
    </div>
</div>
<div id="settings_tabs">

        <div class="set-top">
            <div class="tile-pro">
                <!-- <p>  <img style="height: 38px;" src="<?= $assets; ?>images/U-Serve-Up-copy.png" alt="" class="img-fluid"></p> -->
                
            </div>
             <a href="javascript:void(0)" class="closebtn" onclick="closeSettingsTab()">&times;</a>
        </div>
        <div class="pro-bottom" style="display:none">
                        <div class="float_left">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                        </div>
                <div class="float_left">
                    <a href="#" target="_blank">
                        <p class="blue_color"></p>
                    </a>
                </div>
                <div class="float_left">
                    <a href="#" target="_blank">
                        <i class="fas fa-map-marker-alt blue_color"></i>
                    </a>
                </div>
        </div>
        <div class="menu-lists">
            <ul>
            <?php if($loggedIn){ ?>
                <li>
                    <a href="<?=base_url('invitation')?>">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/user_add.png" alt="" style="transform: rotateY(180deg);filter: invert(40%);">
                        </div>
                        <p>Invite People</p>
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="#">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/hiring.png" alt="">
                        </div>
                        <p>Find Jobs</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/place.png" alt="" style="filter: invert(40%);">
                        </div>
                        <p>Discover People</p>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('nearbystores')?>">
                        <div class="menu-imgs" >
                                <img src="<?= $assets; ?>images/place.png" alt="" style="margin-top: 5px; filter: invert(40%);">
                        </div>
                        <p>Nearby Stores</p>
                    </a>
                </li>
                <?php if($loggedIn){ ?>
                <li>
                    <a href="#">
                        <div class="menu-imgs" >
                                <img src="<?= $assets; ?>images/store.png" alt="">
                        </div>
                        <p>Favourite Stores</p>
                    </a>
                </li>
                <?php } ?>
                <?php if($loggedIn){ ?>
                <li>
                    <a href="#">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/bluesettings.png" alt="">
                        </div>
                        <p>User Tools</p>
                    </a>
                </li>
                <?php } ?>
                <?php if($loggedIn){ ?>
                <li>
                    <a href="#">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/add.png" alt="" style="filter: invert(40%);">
                        </div>
                        <p>Add Story</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/add.png" style="filter: invert(40%);">
                        </div>
                        <p>Add Post</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/writeupbluelight.png">
                        </div>
                        <p>Add Wall</p>
                    </a>
                </li>
                <?php }?>
                <?php if($loggedIn){ ?>
                    <li>
                    <a href="<?=base_url('logout')?>">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/profile-user.png" alt="">
                        </div>
                        <p>Logout</p>
                    </a>
                </li>

                <?php } else {?>
                    <li>
                    <a href="<?=base_url('signup')?>">
                        <div class="menu-imgs">
                            <img src="<?= $assets; ?>images/profile-user.png" alt="">
                        </div>
                        <p>Sign Up</p>
                    </a>
                </li>
                    <?php } ?>
            </ul>
        </div>

        <div class="pro-top">
            <ul>
                <li>
                    <a href="#"><img src="<?= $assets; ?>images/settings.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="<?= $assets; ?>images/add.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="<?= $assets; ?>images/qr.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="<?= $assets; ?>images/notification.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="<?= $assets; ?>images/shopping_cart_black.png" alt=""></a>
                </li>
            </ul>
        </div>
        <div class="profile-view" <?=$loggedInUser ? "style='background:".$loggedInUser->UserAccountTypeColor."'" : ''?>>
            <div class="profile-view-left">
                <div class="profile_pic float_left">
                    <img src="<?= $assets; ?>images/profile-user.png" alt="icon">
                </div>
                <div class="user_details float_left">
                        <p><a href="#"> Hello</a></p>
                        <p><a href="#"> <?=$loggedInUser ? $loggedInUser->Name : 'To '.$utagUpCCategory->UTagcategoryName.' Up'?></a></p>
                </div>
            </div>
            <div class="profile-view-right">
                <p><a href="<?=base_url(); ?>"> <img src="<?= $assets; ?>images/messenger.png" alt=""></a></p>
            </div>
        </div>
       
    </div>
<script type="text/javascript">
    var cart = <?= isset($cart) && !empty($cart) ? json_encode($cart) : '{}' ?>;
    var site = {base_url: '<?= base_url(); ?>', site_url: '<?= site_url('/'); ?>', shop_url: '<?= shop_url(); ?>', csrf_token: '<?= $this->security->get_csrf_token_name() ?>', csrf_token_value: '<?= $this->security->get_csrf_hash() ?>'}
    var lang = {};
    lang.page_info = '<?= lang('page_info'); ?>';
    lang.cart_empty = '<?= lang('empty_cart'); ?>';
    lang.item = '<?= lang('item'); ?>';
    lang.items = '<?= lang('items'); ?>';
    lang.unique = '<?= lang('unique'); ?>';
    lang.total_items = '<?= lang('total_items'); ?>';
    lang.total_unique_items = '<?= lang('total_unique_items'); ?>';
    lang.tax = '<?= lang('tax'); ?>';
    lang.Serveping = '<?= lang('Serveping'); ?>';
    lang.total_w_o_tax = '<?= lang('total_w_o_tax'); ?>';
    lang.product_tax = '<?= lang('product_tax'); ?>';
    lang.order_tax = '<?= lang('order_tax'); ?>';
    lang.total = '<?= lang('total'); ?>';
    lang.grand_total = '<?= lang('grand_total'); ?>';
    lang.reset_pw = '<?= lang('forgot_password?'); ?>';
    lang.type_email = '<?= lang('type_email_to_reset'); ?>';
    lang.submit = '<?= lang('submit'); ?>';
    lang.error = '<?= lang('error'); ?>';
    lang.add_address = '<?= lang('add_address'); ?>';
    lang.update_address = '<?= lang('update_address'); ?>';
    lang.fill_form = '<?= lang('fill_form'); ?>';
    lang.already_have_max_addresses = '<?= lang('already_have_max_addresses'); ?>';
    lang.send_email_title = '<?= lang('send_email_title'); ?>';
    lang.message_sent = '<?= lang('message_sent'); ?>';
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
<script type="text/javascript" src="<?= $assets; ?>js/libs.min.js"></script>
<script type="text/javascript" src="<?= $assets; ?>js/scripts.min.js"></script>

<script type="text/javascript">
   
    <?php if ($message || $warning || $error || $reminder || $notice) { ?>
    $(document).ready(function() {
        <?php if ($message) { ?>
        sa_alert('<?=lang('success');?>', '<?= trim(str_replace(array("\r","\n","\r\n"), '', addslashes($message))); ?>');
        <?php } if ($warning) { ?>
        sa_alert('<?=lang('warning');?>', '<?= trim(str_replace(array("\r","\n","\r\n"), '', addslashes($warning))); ?>', 'warning');
        <?php } if ($error) { ?>
         sa_alert('<?=lang('Notice!');?>', '<?= trim(str_replace(array("\r","\n","\r\n"), '', addslashes($error))); ?>', 'error', 1);
        <?php } if ($reminder) { ?>
        sa_alert('<?=lang('reminder');?>', '<?= trim(str_replace(array("\r","\n","\r\n"), '', addslashes($reminder))); ?>', 'info');
        <?php } if ($notice) { ?>
        sa_alert('<?=lang('Notice!');?>', '<?= trim(str_replace(array("\r","\n","\r\n"), '', addslashes($notice))); ?>', 'info',5000);
        <?php } ?>
    });
    <?php } ?>
</script>

<!-- <script src="<?= $assets; ?>itx/js/jquery-1.11.1.min.js"></script> -->
<!-- <script src="<?= $assets; ?>itx/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $assets; ?>front/js/owl-carousel/owl.carousel.js"></script>
<script src="<?= $assets; ?>itx/js/owl.carousel.min.js"></script>
<script src="<?= $assets; ?>itx/js/echo.min.js"></script>
<script src="<?= $assets; ?>itx/js/jquery.easing-1.3.min.js"></script>
<script src="<?= $assets; ?>itx/js/bootstrap-slider.min.js"></script>
<script src="<?= $assets; ?>itx/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="<?= $assets; ?>itx/js/lightbox.min.js"></script>
<script src="<?= $assets; ?>itx/js/bootstrap-select.min.js"></script>
<script src="<?= $assets; ?>itx/js/wow.min.js"></script>
<script src="<?= $assets; ?>itx/js/scripts.js"></script> -->


<script type="text/javascript" src="<?= $assets; ?>js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="<?= $assets; ?>css/aos/aos.js"></script>
<script type="text/javascript" src="<?= $assets; ?>js/popper.min.js"></script>
<script type="text/javascript" src="<?= $assets; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $assets; ?>js/slick.js"></script>
<!-- <script type="text/javascript" src="<?= $assets; ?>js/audio.min.js"></script> -->
<script type="text/javascript" src="<?= $assets; ?>js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?= $assets; ?>js/jquery.multi-select.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<!-- <script type="text/javascript" src="<?= $assets; ?>js/intlTelInput.min.js"></script> -->
<script>
   AOS.init({
   duration: 1200,
})

$('.mob-slider').slick({
   slidesToShow: 6,
   slidesToScroll: 6,
   dots: false,
   //autoplay: true,
   //autoplaySpeed: 2000,
   arrows: false,
   infinite: false,
   cssEase: 'linear',
   responsive: [{
           breakpoint: 1024,
           settings: {
               slidesToShow: 6,
               slidesToScroll: 3,
               infinite: true,

           }
       }, {
           breakpoint: 600,
           settings: {
               slidesToShow: 4,
               slidesToScroll: 2
           }
       }, {
           breakpoint: 480,
           settings: {
               slidesToShow: 3,
               slidesToScroll: 3
           }
       }

   ]
});
$('.mene-slider').slick({
   slidesToShow: 5,
   slidesToScroll: 5,
   dots: false,
   //autoplay: true,
   //autoplaySpeed: 2000,
   arrows: false,
   infinite: false,
   cssEase: 'linear',
   responsive: [{
           breakpoint: 1024,
           settings: {
               slidesToShow: 6,
               slidesToScroll: 3,
               infinite: true,

           }
       }, {
           breakpoint: 600,
           settings: {
               slidesToShow: 4,
               slidesToScroll: 2
           }
       }, {
           breakpoint: 480,
           settings: {
               slidesToShow: 4,
               slidesToScroll: 4
           }
       }

   ]
});
$('.single-product').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   dots: false,
   // autoplay: true,
   // autoplaySpeed: 2000,
   arrows: true,
   infinite: true,
});

$('.story-product').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   dots: true,
   autoplay: true,
   autoplaySpeed: 2000,
   arrows: true,
   infinite: true,
});
$('.slider-banner').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   autoplay: true,
   autoplaySpeed: 2000,
   dots: false,
   arrows: true,
});
$('.cates-silder').slick({
   slidesToShow: 10,
   slidesToScroll: 1,
   dots: false,

   arrows: false,
   infinite: false,
   cssEase: 'linear',
   responsive: [{
           breakpoint: 1024,
           settings: {
               slidesToShow: 6,
               slidesToScroll: 3,
               infinite: true,
               dots: true
           }
       }, {
           breakpoint: 600,
           settings: {
               slidesToShow: 4,
               slidesToScroll: 2
           }
       }, {
           breakpoint: 480,
           settings: {
               slidesToShow: 4,
               slidesToScroll: 1
           }
       }

   ]
});
$('.cate-silder').slick({
   slidesToShow: 10,
   slidesToScroll: 1,
   dots: false,

   arrows: false,
   infinite: false,
   cssEase: 'linear',
   responsive: [{
       breakpoint: 1024,
       settings: {
           slidesToShow: 6,
           slidesToScroll: 4,
           infinite: true,
           dots: true
       }
   }, {
       breakpoint: 600,
       settings: {
           slidesToShow: 4,
           slidesToScroll: 3
       }
   }, {
       breakpoint: 480,
       settings: {
           slidesToShow: 4,
           slidesToScroll: 3
       }
   }]
});
$('.dropdown-toggle').dropdown();
$('.posts').multiSelect({
        'modalHTML': '<div class="multi-select-modal">'
    });

</script>
<style>
    .main-category {
        background: #FAFAFA;
    }
</style>

<script type="text/javascript" src="<?= $assets; ?>js/common.js"></script>


<script>
    $(".dropdown-cart").click(function() {

        console.log('ddd');
        $(this).toggleClass("open");
    })
</script>
</body>
</html>
