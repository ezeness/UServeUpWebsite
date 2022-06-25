
<style>
.header-bottom-block{
    display:none !important;
}
</style>

<section>
<div class="tab-content tab-borda">
    <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post">
        <div class="header-benner">
            <!-- <div class="container">
                    <div class="header-page-title">
                        <h6>PAGE TITLE</h6>
                    </div>
                </div> -->
            <div class="slider-banner" style="margin-top:0px">
                <div class="slider-blocks" style="height:250 px;width:auto !important">
                    <a href="#"> <img src="<?= $assets; ?>images/Banners/slider1.jpg" alt="" class="img-fluid"> </a>
                </div>
                <div class="slider-blocks" style="height:250 px;width:auto !important">
                    <a href="#"> <img src="<?= $assets; ?>images/Banners/slider2.jpg" alt="" class="img-fluid"> </a>
                </div>
                <div class="slider-blocks" style="height:250 px;width:auto !important">
                    <a href="#"> <img src="<?= $assets; ?>images/Banners/slider3.jpg" alt="" class="img-fluid" > </a>
                </div>
            </div>
            <div class="container">
                <div class="page-name">
                    <a href="#">page</a>
                </div>
            </div>
        </div>
        <section>
            <div class="banner-titile">
                <div class="">
                    <div class="banner-block">
                        <div class="banner-left">
                            <h6>Banner Title</h6>
                        </div>
                        <div class="banner-right">
                            <div class="banner-call">
                                <ul>
                                    <li>
                                        <div class="product-call">
                                            <a href="#">
                                                SHOP UP
                                            </a>
                                            <!-- <div class="product-sms-call">
                                                        <a href="tel:1234567891">call</a>
                                                        <a href="#">SMS</a>
                                                    </div> -->
                                        </div>
                                    </li>
                                    <!-- <li><a href="tel:+971 50 735 2382">+971 50 735 2382</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
        <div class="main-category">
                <!-- <div class="">
                <div class="filters_title">
                <span id="discover_filter"><i class="fa fa-list"></i></span>
                <span id="shopup_filter" style="display:none"><i class="fa fa-th"></i></span>
                <span ><img src="<?= $assets; ?>images/sort.png" style="width:25px;float: right;"></span>
                <span onclick="openWallNav()" style="cursor: pointer;"><img src="<?= $assets; ?>images/sliders-solid.svg" style="width: 17px;float: right;margin-top:4px; margin-right:4px;"></span>
            </div> -->

            <div id="myWallSidenav" class="sidenav">
                        <div class="slider-block">
                            <div class="side-top">
                                <div class="set-top">
                                    <div class="tile-pro">
                                        <p> U SHIP UP <i class="fas fa-chevron-down"></i></p>
                                    </div>
                                    <div class="ser">
                                        <form action="">
                                            <input type="text" class="searchTerm" placeholder="Search">
                                            <button type="submit" class="searchButton">
                                                <img src="<?= $assets; ?>images/Icons/search-icon grey1.png" alt="" class="img-fluid">
                                            </button>
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
                                                 if ($navbar) {
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeWallNav()">&times;</a>

                    </div>
            
        <section>
            <div class="product-list">
                <div class="container">
                    <div class="product-block single-block">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="write-up">
                                    <!-- <div class="write-up-img">
                                        <img src="assets/images/Banners/download.png" alt="" class="img-fluid">
                                    </div> -->

                                    <div class="write-up-block wall-main">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ALL WALL</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> HIRING</a>
                                            </li>
                                            <li class="nav-item write-plus">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> 
                                                SEEKING</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <?php if(isset($wall)) { ?>
                                                <div class="writw-up wall-block">
                                                    <div class="write-up-main">
                                                        <?php 
                                                        foreach ($wall as $key ) {
                                                        ?>
                                                        <div class="write-up-box">
                                                            <div class="write-up-box-top">
                                                                <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left">
                                                                        <div class="sli-img">
                                                                            <img src="<?=$key['UserThumbImage']?>" alt="" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <h6><?=$key['Username']?></h6>
                                                                        <p><?=$key['AccountCategory']?></p>
                                                                        <span class="user_distance_details"><?=$key['Distance']?></span>
                                                                        <span class="user_distance_details"><?=$key['EstimatedReachTime']?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="write-up-box-top-rights">
                                                                    <div class="write-title">
                                                                        <h6><p><?=$key['ProfileName']?></p> </h6>
                                                                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                                                    </div>
                                                                    <?php 
                                                                        if($key['IsFriend'] == 1){
                                                                            echo '<div class="fol friendsU"><a href="#"> U FriendS</a></div>';
                                                                        }
                                                                        elseif($key['IsFollowU'] == 1){
                                                                            echo '<div class="fol"><a href="#"> Follow U</a></div>';
                                                                        }
                                                                        elseif($key['IsUFollow'] == 1){
                                                                            echo '<div class="fol u-follow"><a href="#"> U Follow</a></div>';
                                                                        }

                                                                        ?>
                                                                        <?php 
                                                                        if($key['WriteupType'] != ''){
                                                                        ?>
                                                                    <div class="ra-h">
                                                                        
                                                                        <div class="shop-qwe">
                                                                            <a href="#">
                                                                            <?php 
                                                                             echo $key['WriteupType'];
                                                                            ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="write-price">
                                                                
                                                                <div class="write-price-bottom">
                                                                    <h6><b><?=mb_strimwidth($key['WallTitle'], 0, 31, "...")?></b></h6>
                                                                    <p><?=mb_strimwidth($key['Comment'], 0, 150, "...")?></p>
                                                                    <!-- <a href="#">View Details</a> -->
                                                                </div>
                                                                
                                                              
                                                            </div>
                                                            <div class="audio-play">
                                                                <?php 
                                                                        if(!empty($key['audio'])) {
                                                                        ?>
                                                                        <audio controls>
                                                                            <source src="<?php echo $key['audios'][0]['MediaNormalPath']?>" type="audio/mpeg">
                                                                        </audio>
                                                                        <?php } ?>
                                                                </div>
                                                            <div class="write-imgs">
                                                            <?php 
                                                                if($key['images']){
                                                                ?>
                                                            <ul>
                                                                <li>
                                                                    <?php 
                                                                        foreach ($key['images'] as $keyss => $images) {
                                                                    ?>
                                                                                <img src="<?php echo $images['MediaPath']?>" alt="img" class="img-fluid">
                                                                        <?php } ?>
                                                                </li>
                                                                </ul>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="write-up-box-bottom">
                                                                <div class="write-up-box-top-right">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" class=""><i class="far fa-heart"></i> <span><?=$key['CommentCount']?></span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="<?= $assets; ?>images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="<?= $assets; ?>images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span><?=$key['CommentCount']?> Replies</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="far fa-bookmark"></i> <span></span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="fas fa-share-alt"></i><span></span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     <?php } ?>
                                                    </div>
                                                </div>
                                                <?php } else {
                                                      ?>
                                                        <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Data" style="height: 200px;padding: 10px;"><br>No Data</p>
                                                   <?php  }?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <?php if(isset($hiring)) { ?>
                                                <div class="writw-up wall-block">
                                                    <div class="write-up-main">
                                                        <?php 
                                                        foreach ($hiring as $key ) {
                                                        ?>
                                                        <div class="write-up-box">
                                                            <div class="write-up-box-top">
                                                                <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left">
                                                                        <div class="sli-img">
                                                                            <img src="<?=$key['UserThumbImage']?>" alt="" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <h6><?=$key['Username']?></h6>
                                                                        <p><?=$key['AccountCategory']?></p>
                                                                        <span class="user_distance_details"><?=$key['Distance']?></span>
                                                                        <span class="user_distance_details"><?=$key['EstimatedReachTime']?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="write-up-box-top-rights">
                                                                    <div class="write-title">
                                                                        <h6><p><?=$key['ProfileName']?></p> </h6>
                                                                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                                                    </div>
                                                                    <?php 
                                                                        if($key['IsFriend'] == 1){
                                                                            echo '<div class="fol friendsU"><a href="#"> U FriendS</a></div>';
                                                                        }
                                                                        elseif($key['IsFollowU'] == 1){
                                                                            echo '<div class="fol"><a href="#"> Follow U</a></div>';
                                                                        }
                                                                        elseif($key['IsUFollow'] == 1){
                                                                            echo '<div class="fol u-follow"><a href="#"> U Follow</a></div>';
                                                                        }

                                                                        ?>
                                                                        <?php 
                                                                        if($key['WriteupType'] != ''){
                                                                        ?>
                                                                    <div class="ra-h">
                                                                        
                                                                        <div class="shop-qwe">
                                                                            <a href="#">
                                                                            <?php 
                                                                             echo $key['WriteupType'];
                                                                            ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="write-price">
                                                                
                                                                <div class="write-price-bottom">
                                                                    <h6><b><?=mb_strimwidth($key['WallTitle'], 0, 31, "...")?></b></h6>
                                                                    <p><?=mb_strimwidth($key['Comment'], 0, 150, "...")?></p>
                                                                    <!-- <a href="#">View Details</a> -->
                                                                </div>
                                                                
                                                              
                                                            </div>
                                                            <div class="audio-play">
                                                                <?php 
                                                                        if(!empty($key['audio'])) {
                                                                        ?>
                                                                        <audio controls>
                                                                            <source src="<?php echo $key['audios'][0]['MediaNormalPath']?>" type="audio/mpeg">
                                                                        </audio>
                                                                        <?php } ?>
                                                                </div>
                                                            <div class="write-imgs">
                                                            <?php 
                                                                if($key['images']){
                                                                ?>
                                                            <ul>

                                                                <li>
                                                                    <?php 
                                                                        foreach ($key['images'] as $keyss => $images) {
                                                                    ?>
                                                                                <img src="<?php echo $images['MediaPath']?>" alt="img" class="img-fluid">
                                                                        <?php } ?>
                                                                </li>
                                                                </ul>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="write-up-box-bottom">
                                                                <div class="write-up-box-top-right">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" class=""><i class="far fa-heart"></i> <span><?=$key['CommentCount']?></span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="assets/images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="assets/images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span><?=$key['CommentCount']?> Replies</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="far fa-bookmark"></i> <span></span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="fas fa-share-alt"></i><span></span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     <?php } ?>
                                                    </div>
                                                </div>
                                                <?php } else {
                                                      ?>
                                                        <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Data" style="height: 200px;padding: 10px;"><br>No Data</p>
                                                   <?php  }?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <?php if(isset($seeking)) { ?>
                                                <div class="writw-up wall-block">
                                                    <div class="write-up-main">
                                                        <?php 
                                                        foreach ($seeking as $key ) {
                                                        ?>
                                                        <div class="write-up-box">
                                                            <div class="write-up-box-top">
                                                                <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left">
                                                                        <div class="sli-img">
                                                                            <img src="<?=$key['UserThumbImage']?>" alt="" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <h6><?=$key['Username']?></h6>
                                                                        <p><?=$key['AccountCategory']?></p>
                                                                        <span class="user_distance_details"><?=$key['Distance']?></span>
                                                                        <span class="user_distance_details"><?=$key['EstimatedReachTime']?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="write-up-box-top-rights">
                                                                    <div class="write-title">
                                                                        <h6><p><?=$key['ProfileName']?></p> </h6>
                                                                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                                                    </div>
                                                                    <?php 
                                                                        if($key['IsFriend'] == 1){
                                                                            echo '<div class="fol friendsU"><a href="#"> U FriendS</a></div>';
                                                                        }
                                                                        elseif($key['IsFollowU'] == 1){
                                                                            echo '<div class="fol"><a href="#"> Follow U</a></div>';
                                                                        }
                                                                        elseif($key['IsUFollow'] == 1){
                                                                            echo '<div class="fol u-follow"><a href="#"> U Follow</a></div>';
                                                                        }

                                                                        ?>
                                                                        <?php 
                                                                        if($key['WriteupType'] != ''){
                                                                        ?>
                                                                    <div class="ra-h">
                                                                        
                                                                        <div class="shop-qwe">
                                                                            <a href="#">
                                                                            <?php 
                                                                             echo $key['WriteupType'];
                                                                            ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="write-price">
                                                                
                                                                <div class="write-price-bottom">
                                                                    <h6><b><?=mb_strimwidth($key['WallTitle'], 0, 31, "...")?></b></h6>
                                                                    <p><?=mb_strimwidth($key['Comment'], 0, 150, "...")?></p>
                                                                    <!-- <a href="#">View Details</a> -->
                                                                </div>
                                                                
                                                              
                                                            </div>
                                                            <div class="audio-play">
                                                                <?php 
                                                                        if(!empty($key['audio'])) {
                                                                        ?>
                                                                        <audio controls>
                                                                            <source src="<?php echo $key['audios'][0]['MediaNormalPath']?>" type="audio/mpeg">
                                                                        </audio>
                                                                        <?php } ?>
                                                                </div>
                                                            <div class="write-imgs">
                                                                <?php 
                                                                if($key['images']){
                                                                ?>
                                                            <ul>

                                                                <li>
                                                                    <?php 
                                                                        foreach ($key['images'] as $keyss => $images) {
                                                                    ?>
                                                                                <img src="<?php echo $images['MediaPath']?>" alt="img" class="img-fluid">
                                                                        <?php } ?>
                                                                </li>
                                                                </ul>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="write-up-box-bottom">
                                                                <div class="write-up-box-top-right">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" class=""><i class="far fa-heart"></i> <span><?=$key['CommentCount']?></span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="assets/images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="assets/images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span><?=$key['CommentCount']?> Replies</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="far fa-bookmark"></i> <span></span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="fas fa-share-alt"></i><span></span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     <?php } ?>
                                                    </div>
                                                </div>
                                                <?php } else {
                                                      ?>
                                                        <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Data" style="height: 200px;padding: 10px;"><br>No Data</p>
                                                   <?php  }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   </section>

        <script>
 $('.slider-blocks').css('height', '150px');
        </script>