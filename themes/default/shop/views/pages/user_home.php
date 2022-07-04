
<style>
.catsfilter{
    display:none !important;
}
.tag_color{
    background-color: #f7f1ec;
}
.chain_color{
    background-color:#f6faea;
}
</style>
<?php if($stories || $mystories)
{

?>

<style>
.header-bottom-block  {
display:none;
}
.hide_for_details{
display:none !important;
}
.menu-pro ul{
    max-width: 100%;
    justify-content: start;
}
@media (max-width: 575px){
    .header-benner {
        margin-top: 0px !important;
    }
}
</style>
<section class="index_top">
    <div class="user-profile">
        <div class="">
            <div class="user-profile-block" style="background-color: white;padding:10px 10px 10px 10px;">
                <div class="profile-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="padding-bottom: 15px;border: 1px solid #0000000d;">
                                <?=$user_details->ProfileName?>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-top:10px">
                            <a href="#">Profile</a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content profile_tab_content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container">
                          <div class="user-pro">
                                <div class="user-right">
                                </div>
                            <div class="profile-inner">
                                <div class="prof">
                                    <div class="pro-img">
                                        <div class="left-pro">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url(<?=$user_details->UserThumbImage?>);">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-details-right">
                                        <div class="profile-inner">

                                            <div class="pro-name col-sm-12">
                                                <div class="pro-name-left">
                                                    <div class="user-name">
                                                        <p><?=$user_details->Name?></p>
                                                    </div>
                                                        <div class="user-bio">
                                                            <?php 
                                                            if(isset($user_details->AdditionalInfo)){
                                                                foreach ($user_details->AdditionalInfo as $key) {
                                                                    if($key->FieldName == 'Category'){
                                                                        echo '<p>'.$key->FieldValue.'</p>';
                                                                    }
                                                                    if($key->FieldName == 'Bio'){
                                                                        echo '<span>'.$key->FieldValue.'</span>';
                                                                    }
                                                                } 
                                                                } ?>
                                                        </div>
                                                            <span><?=$user_details->Address->City?></span>
                                                            <div class="user-details">
                                                                <div class="site-url">
                                                                <?php 
                                                                if(isset($user_details->AdditionalInfo)){
                                                                    foreach ($user_details->AdditionalInfo as $key) {
                                                                        if($key->FieldName == 'Website'){
                                                                            echo '<a href="'.$key->FieldValue.'">'.$key->FieldValue.'</a>';
                                                                        }
                                                                    } } ?>     
                                                                    
                                                                    <p>
                                                                        <?php 
                                                                        if($user_details->Store->StoreTimes){
                                                                            $found = false;
                                                                            for ($i = 0; $i<count($user_details->Store->StoreTimes); $i++)
                                                                            {
                                                                                if(!$found)
                                                                                {
                                                                                $day = date("l");
                                                                                if($day == $user_details->Store->StoreTimes[$i]->Day){
                                                                                echo 'Today Store Timing '.date("h:i", strtotime($user_details->Store->StoreTimes[$i]->StartTime)).' - '.date("h:i", strtotime($user_details->Store->StoreTimes[$i]->EndTime)).'<br>';
                                                                                $found=true;
                                                                                }
                                                                            }

                                                                            }
                                                                        }
                                                                        ?>    
                                                                    </p>
                                                                    <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?=$user_details->Store->Latitude?>,<?=$user_details->Store->Longitude?>"><img src="<?=$assets?>images/location.png" class="location_icon">
                                                                    <?=$user_details->Store->City.' '.$user_details->Store->Country?> </a>
                                                                </div>
                                                                <ul>
                                                                    <li><a href="#"><?=$user_details->Distance?></a></li>
                                                                    <li><a href="#"><?=$user_details->EstimatedReachTime?></a></li>
                                                                    <li><a href="#">DRIVE UP <i class="fas fa-location-arrow"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-img-right">
                                        <div class="pro-name-right">
                                            <div class="follow-user">
                                                <h3><?=$user_details->FriendsCount?></h3>
                                                <span>U FriendS</span>
                                                <a href="#">Follow Up</a>
                                            </div>
                                            <div class="hellp-user">
                                                <h3><?=$user_details->FellowshipCount?></h3>
                                                <span>Fellowship</span>
                                                <a href="#">Follow Up</a>
                                            </div>
                                            <?php 
                                            if(count($user_details->Role) == 3){
                                            ?>
                                            <div class="hellp-user">
                                                <h3><?=$user_details->ServeUpCount?></h3>
                                                <span>Services</span>
                                                <a href="#">Services UP</a>
                                            </div>
                                            <?php } ?>
                                            <div class="qr_code"></div>
                                        </div>
                                    </div>
                                    <?php 
                                           if($user_details->Store->LicenseType == 'Corp' && strpos($user_details->Store->PlanName , '24') !== false){
                                        ?>
                                        <img src="<?=$assets?>images/Icons/24-7 icon.png" class="img-fluid profile_icon">
                                        <?php 
                                            }
                                            ?>
                                             <?php   foreach ($user_details->AdditionalInfo as $additionalinfo) :
                                                    if ($additionalinfo->FieldName == 'home_delivery_service' && $additionalinfo->FieldValue == 1) : ?>
                                        <img src="<?= $assets; ?>images/Icons/delivery-icon-black .jpg" class="img-fluid profile_icon">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                </div>

            </div>

        </div>

        <div class="main-category-block" style="margin-top:10px">
                    <ul class="nav nav-tabs slider cate-sildercall same-tab" id="myTab" role="tablist" data-aos="fade-up">
                        <li class="nav-item ">
                            <a class="nav-link border-radius highlight_a" data-toggle="modal" data-target="#demo-modal">
                                <i class="fa fa-plus-circle" aria-hidden="true" style="font-size:30px"></i>
                                <p class="highlight_des">
                                    <b>HighLights</b><br>
                                    Add Highlights  
                                </p>
                            </a>
                        </li>
                        <?php 
                            if(isset($highlights)){
                            ?>
                       <?php 
                     
                            foreach ($highlights as $key) {
                        ?>    
                        <li class="nav-item border-radius">
                            <a class="nav-link border-radius highlight_a" id="motord-tab" href="#" style="height: 55px;">
                                <img src="<?=$key['CoverImage']?>" alt="icomn">
                                <p class="highlight_des"><b><?=$key['Title']?></b><br>
                                    <?=$key['SubTitle']?>
                                </p>
                            </a>
                        </li>
                        <?php }  ?>
                        <?php } ?>
                    </ul>
            </div>
      
        <div class="men" >
            <div class="menu-user">
                <div class="header-top-icon">
                    <ul>
                         <li>
                            <a href="#"> <img src="<?=$assets?>images/home_outline.png" alt="Home-icon" style="filter: brightness(0.5);"> </a>
                        </li>
                        <li>
                            <a href="#" class="search-icon">
                                <img src="<?=$assets?>images/nav4.png" alt="Home-icon">
                            </a>
                        </li>
                        <li>
                            <a href="#"> <img src="<?=$assets?>images/writeupblack.png" alt="Home-icon"> </a>
                        </li>
                        <li style="display:none">
                            <a href="#"> <img src="<?=$assets?>images/group.png" alt="Home-icon" style=""> </a>
                        </li>


                    </ul>
                </div>
            </div>
            <div class="menu-pro">
                <?php 
                
                if(!empty($navbar)){
                ?>
                <ul class="nav nav-pills mb-3 Navbar_Tabss" id="pills-tab" role="tablist">
                    <?php 
                    foreach ($navbar as $key) {
                    ?>
                    <li class="nav-item navbar_filter_profile <?php echo $filter == $key['Type'] ? 'active' : ''; ?> " data-type="<?=$key['Type']; ?>">
                        <a class="nav-link"  id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                           <?=$key['Title']?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>

            </div>
        </div>         
            <div class="header-benner">
                <div class="slider-banner" style="margin-top:0px">
                    <div class="slider-blocks" style="height:140 px;width:auto !important">
                        <a href="#"> <img src="<?= $assets?>images/Banners/slider1.jpg" alt="" class="img-fluid"> </a>
                    </div>
                    <div class="slider-blocks" style="height:140 px;width:auto !important">
                        <a href="#"> <img src="<?= $assets?>images/Banners/slider2.jpg" alt="" class="img-fluid"> </a>
                    </div>
                    <div class="slider-blocks" style="height:140 px;width:auto !important">
                        <a href="#"> <img src="<?= $assets?>images/Banners/slider3.jpg" alt="" class="img-fluid"> </a>
                    </div>
                </div>
            <div class="container">
                <div class="page-name">
                    <a href="#">page</a>
                </div>
                <section>
                    <div class="banner-titile">
                            <div class="banner-block">
                                <div class="banner-left">
                                    <h6>Banner Title</h6>
                                </div>
                                <div class="banner-right">
                                    <div class="banner-call">
                                        <ul>
                                            <li>
                                                <div class="product-call btn_shop_post">
                                                    <a href="#" style="background-color:#C6C6C6">
                                                        POST UP
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                 </section>
            </div>
  <?php foreach ($mystories as $key) {
                    ?>
                     <?php } ?>
        <section id="stories">
            <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="overflow: auto;overflow-y: hidden;">
                    <li class="story_list">
                    <div class="product-list-top-left" style="text-align: center;">
                        <div class="product-list-top-left-img height_story">
                            <div class="pink_border">
                                <div class="green_border">
                                    <div class="blue_border">
                                        <!-- <a href="<?=base_url('profile').'/'.$key['UserName']?>"> -->
                                            <img src="<?php print_r($_SESSION['UserImage']); ?>" alt="" class="img-fluid pt-1">
                                            <i class="fa fa-plus-circle plus_icon_style" aria-hidden="true" ></i>
                                        <!-- </a> -->
                                    </div>
                                </div>
                            </div>
                            <p class="user_story_p"><?=$_SESSION['ProfileName']?></p>
                        </div>
                    </div>
                </li>
           
            <?php foreach ($stories as $key) {
                    ?>
                    <li class="story_list">
                    <div class="product-list-top-left">
                        <div class="product-list-top-left-img height_story">
                            <div class="pink_border">
                                <div class="green_border">
                                    <div class="blue_border">
                                        <a href="#" data-toggle="modal" data-target="#example">
                                            <img src="<?php print_r($key['UserImage']); ?>" alt="" class="img-fluid pt-1">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p class="user_story_p"><?=$key['ProfileName']?></p>
                        </div>
                    </div>
                </li>
            <?php } ?>
                <ul>
            </section>
<?php } ?>
<section id="pro_list">
    <a href="" id="postidcall"></a>
        <?php if (isset($datas)) : ?>
            <?php foreach ($datas as $data) : 
                ?>
                <div class="product-list product-list-s" id="<?php echo "postid" . $data['PostId']; ?>">
                    <div class="container">
                        <div class="product-block">
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="back-btn">
                                        <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="product-list-block ">
                                        <div class="product-list-box animate__animated animate__fadeInLeft">
                                            <div class="product-list-top <?=$data['Istagged'] == 1 ? 'tag_color' : ''?> <?=$data['IsChained'] == 1 ? 'chain_color' : ''?>">
                                                <div class="product-list-top-left">
                                                    <div class="product-list-top-left-img">
                                                        <div class="pink_border">
                                                            <div class="green_border">
                                                                <div class="blue_border">
                                                                    <a href="<?=base_url('profile').'/'.$data['UserId']?>">
                                                                        <img src="<?php print_r($data['UserImage']); ?>" alt="" class="img-fluid pt-1">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="product_list_store">
                                                        <a href="<?=base_url('profile').'/'.$data['UserId']?>">
                                                            <li style="max-width: 250px;">
                                                                <h6><?php print_r(mb_strimwidth($data['UserFullName'], 0, 31, "...")); ?>
                                                                </h6>
                                                                <p><?php print_r($data['ProfileName']); ?></p>
                                                            </li>
                                                        </a>
                                                    </ul>
                                                </div>
                                                <div class="product-list-top-right">
                                                    <div class="icon-menu share-icon">
                                                           <?php 
                                                           if($data['Istagged'] == 1){
                                                            echo '<img src="'.base_url().'/assets/images/tag black.png" alt="ico" class="tag_icon">';
                                                           }
                                                           if($data['IsChained'] == 1){
                                                            echo '<img src="'.base_url().'/assets/images/chainiconwhite.png" alt="ico" class="chain_icon">';
                                                           }
                                                           ?>
                                                         
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/store.svg" class="img-fluid sto-icon" alt=""> Add to Favorite store</a>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_user_add_multiple.svg" class="img-fluid sto-icon" alt=""> Follow Profile</a>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Profile</a>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Profile</a>
                                                                <a href="#" onclick="copyToClipboard('#ProfileDeepLinkUrl')"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt="" > Copy Profile Url</a>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_block_account.svg" class="img-fluid sto-icon" alt=""> Block Profile</a>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_about_this_account.svg" class="img-fluid sto-icon" alt=""> About This Account</a>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_report_profile.svg" class="img-fluid sto-icon" alt=""> Report Profile</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-center">
                                                <div class="product-video">
                                                    <a href="#">
                                                        <img src="<?php echo base_url()?>/assets/images/Icons/video1.png" alt="video">
                                                    </a>
                                                </div>
                                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                    <!-- <div class="carousel-inner"> -->
                                                        <!-- <?php foreach ($data['images'] as $key => $images) : ?>
                                                            <?php if ($key == 0) : ?>
                                                                <div class="carousel-item active">
                                                                    <img class="d-block w-100" style="height:400px; width:500px; object-fit: cover;" src="<?php print_r($images['MediaPath']); ?>" alt="First slide">
                                                                </div>
                                                            <?php else : ?>
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100" style="height:400px; width:500px; object-fit: cover;" src="<?php print_r($images['MediaPath']); ?>" alt="First slide">
                                                                </div>
                                                            <?php endif ?>
                                                        <?php endforeach; ?>
                                                    </div> -->
                                                    <div class="product-imgs single-product">
                                                         <?php 
                                                            foreach ($data['images'] as $key => $images) {
                                                        ?>
                                                            <a href="#">
                                                                <?php 
                                                                if($images['MediaType'] == 'image'){
                                                                ?>
                                                                     <img src="<?php echo $images['MediaPath']?>" alt="img" class="img-fluid"  style=" width:400px; object-fit: cover;">
                                                                <?php }
                                                                if($images['MediaType'] == 'video'){
                                                                ?>
                                                                    <video autoplay muted controls loop class="video">
                                                                        <source src="<?php print_r($images['MediaPath']); ?>" type="video/mp4">
                                                                    </video>
                                                                <?php } ?>
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                    <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a> -->
                                                </div>
                                                <div class="product-view">
                                                    <div class="product-view-block">
                                                        <ul>
                                                            <li class="tag_white">
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/tag white.png" alt="ico"></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/video_icon.png" alt="ico" style="filter: invert(100%);"></a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <p style=" filter: opacity(90%);">Views
                                                                        <br><?php print_r($data['ViewCount']); ?>
                                                                    </p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-bottom">
                                                <div class="pro-bottom" style="background-color:transparent;padding:2px 2px 2px 2px">
                                                    <ul style="max-width: 100%;">
                                                        <li>
                                                            <p class="hert-icon"></p>
                                                            <span><?php print_r($data['LikeCount']); ?></span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="copy-icon"> <img src="<?php echo base_url()?>/assets/images/Component 122.png" alt="icon"></a><br>
                                                            <span><?php print_r($data['ChainCount']); ?></span>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img src="<?php echo base_url()?>/assets/images/bookmarkicongrey.png" alt="icon" style="width: 26px;"></a><br>
                                                            <span><?php print_r($data['BookMarkCount']); ?></span>
                                                        </li>
                                                        <li>
                                                            <p class="writeup-icon"></p><br>
                                                            <span><?php print_r($data['CommentCount']); ?></span>
                                                        </li>
                                                    </ul>
                                                    <div class="icon-menu share-icon " style="max-width: 120px;">
                                                        <div class="ratng-block">

                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i <= $data['Rating']) : ?>
                                                                    <span>
                                                                        <span class="fa fa-star checked pr-1"></span>
                                                                    </span>
                                                                <?php else : ?>
                                                                    <span>
                                                                        <span class="fa fa-star pr-1"></span>
                                                                    </span>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <!-- <p class="text-muted"> <?php echo $time; ?></p> -->
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Post</a>
                                                                <a href="#"><img src="<?php echo base_url()?>/assets/images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Post</a>
                                                                <a href="#"  onclick="copyToClipboard('#PostURL')"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post URL</a>
                                                                <a href="#"  onclick="copyToClipboard('#PostID')"><img src="<?php echo base_url()?>/assets/images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post ID</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-bottom-top">
                                                    <?php foreach ($data['additionalinfo'] as $additionalinfo) : ?>
                                                        <?php if ($additionalinfo['FieldName'] == 'product_offer') : ?>
                                                            <div class="pro-sale-price">
                                                                <p> <?php echo  $data['Currency'] . " " . $data['MRP']; ?>/-</p>
                                                                <span><?php echo $additionalinfo['FieldValue']; ?>% Off</span>
                                                                <div class="time-end" style="display:none">
                                                                     <p><span>TIME ENDS IN</span> 
                                                                     <?php print_r( $time[0]);
                                                                    ?> 
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="price-icon">
                                                        <div class="sale-pric">
                                                            <h6><?php echo $data['Currency'] . " " . $data['SellPrice']; ?>/-</h6>
                                                        </div>
                                                        <div class="dliver-icon">
                                                            <ul>
                                                                <?php if ($data['IsOrderToLiftUp'] == 1) : ?>
                                                                    <li>
                                                                        <img src="<?php echo base_url()?>/assets/images/Icons/donate 2.jpg" alt="img" width="85px">
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php if ($data['IsFreeContribution'] == 1) : ?>
                                                                    <li>
                                                                        <img src="<?php echo base_url()?>/assets/images/charity.jpg" alt="img" class="img-fluid" style="height:36px">
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php foreach ($data['additionalinfo'] as $additionalinfo) : ?>
                                                                    <?php if ($additionalinfo['FieldName'] == 'twenty_four_service' && $additionalinfo['FieldValue'] == 1) : ?>
                                                                        <li>
                                                                            <img src="<?php echo base_url()?>/assets/images/Icons/24-7 icon.png" alt="img" class="img-fluid" style="width: 55px;">
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <?php if ($additionalinfo['FieldName'] == 'home_delivery_service' && $additionalinfo['FieldValue'] == 1) : ?>
                                                                        <li>
                                                                            <img src="<?php echo base_url()?>/assets/images/Icons/delivery-icon-black .jpg" alt="img" class="img-fluid" style="height: 31px;">
                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="pro-price-loca">
                                                        <div class="pro-price-loca-left">
                                                            <ul>
                                                                <li>
                                                                    <p ><a style="color: white;" href="http://maps.google.com/maps">DRIVE UP <i class="fas fa-location-arrow"></i></a></p>
                                                                </li>
                                                                <li>
                                                                    <p> <?php echo $data['Distance']; ?></p>
                                                                </li>
                                                                <li>
                                                                    <p><?php echo $data['EstimatedReachTime']; ?></p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pro-price-loca-right">
                                                            <div class="product-call">
                                                                <a href="#">
                                                                    <?php 
                                                                    $string = strtoupper($data['PostType']);
                                                                    $str = $string;
                                                                     echo substr($str, 0, 4) . ' ' . substr($str, 4); 
                                                                     ?>

                                                                </a>
                                                                <div class="product-sms-call">
                                                                    <a href="tel:1234567891">call</a>
                                                                    <a href="#">SMS</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="loca">
                                                    <a href="#"> <i class="fas fa-map-marker-alt"></i> <?php echo $data['Location']; ?></a>
                                                </div>
                                                <?php 
                                                if(!empty($data['audios'])) {
                                                ?>
                                                <audio controls>
                                                    <source src="<?php echo $data['audios'][0]['MediaNormalPath']?>" type="audio/mpeg">
                                                </audio>
                                                <?php } ?>
                                                <div class="product-bottom-bottom" style="margin-bottom: 0px !important;">
                                                    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist"> -->
                                                        <!-- <li class="nav-item">
                                                            <a class="nav-link active" id="motord-tab" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true">

                                                                <p></p>
                                                            </a>
                                                        </li> -->
                                                        <!-- <li class="nav-item">
                                                            <a class="nav-link" id="homes-tab" data-toggle="tab" href="#homes" role="tab" aria-controls="homes" aria-selected="false">
                                                                <p>Specification</p>
                                                            </a>
                                                        </li> -->
                                                    <!-- </ul> -->

                                                    <!-- <div class="tab-content" id="myTabContent"> -->
                                                        <div class="" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                                            <a href="<?php echo base_url('productDetail/' . $data['PostId']); ?>"><h5><?php echo mb_strimwidth($data['Title'] , 0 , 20 , "...")?></h5>
                                                            <p><?php print_r(mb_strimwidth($data['ShortDescription'], 0, 50, "..."));?></p></a>
                                                        </div>
                                                        <!-- <div class="tab-pane fade" id="homes" role="tabpanel" aria-labelledby="homes-tab">
                                                            <h3>Minor denting repair at the sddd</h3>
                                                            <p>best We feel proud to announce the completion of our 34th year in this fielrrrrd.</p>
                                                        </div> -->
                                                    <!-- </div> -->
                                                    <div class="my-2 py-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
</section>
<input id="ProfileDeepLinkUrl" type="hidden" value="<?=isset($data['ProfileDeepLinkUrl'])?>">
<input id="PostID" type="hidden" value="<?=isset($data['PostId'])?>">
<input id="PostURL" type="hidden" value="<?=isset($data['DeepLinkUrl'])?>">

<script>
    function copyToClipboard(element) {
        var copyText = $(element).val();
        navigator.clipboard.writeText(copyText);
        alertMessage("Link Copied!" , "success")
        }
</script>

    <div class="modal_slider" style="display:none">
      <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://utagup.com/dev/assect/images/products/normal/2022/04/04/624b070b31fd8.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://utagup.com/dev/assect/images/products/normal/2022/04/04/624b070b31fd8.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
    </div>


