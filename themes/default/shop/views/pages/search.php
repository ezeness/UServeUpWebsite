<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<style>
.header-bottom-block{
    display:none !important;
}
.product-home .product-box {
    max-width: 33% !important;
}

</style>    
        <section style="margin-top: 2%;">
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
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">VIEW ALL</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> #TAGS</a>
                                            </li>
                                            <li class="nav-item write-plus">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> 
                                                PROFILES</a>
                                            </li>
                                            <!-- <li class="nav-item write-plus">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> 
                                                LOCATIONS</a>
                                            </li> -->
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <?php if(isset($StoreSeach) || isset($Users)|| isset($ProductsPostUp) || isset($ProductsBookUp) || isset($ProductsCallUp) || isset($ProductsShopUp)) { ?>
                                            <?php if(isset($StoreSeach)) {?>
                                            <h6><b>#STORES</b></h6>
                                                <?php foreach ($StoreSeach as $key) {
                                                        ?>
                                                        <div class="sort-list-box">
                                                            <div class="write-up-box-top">
                                                                <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left">
                                                                        <div class="sli-img">
                                                                        <div class="pink_border">
                                                                            <div class="green_border">
                                                                                <div class="blue_border">
                                                                                <img src="<?=$key['StoreImage']?>" alt="" class="img-fluid">
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <h6><?=$key['StoreName']?></h6>
                                                                        <p><?=$key['AccountCategory']?></p>
                                                                        <span><?=$key['City'].' , '.$key['Country']?></span>

                                                                    </div>
                                                                        <div class="store-24">
                                                                            <div class="store-img">
                                                                                <ul>
                                                                                    <li>
                                                                                        <img src="<?=$assets?>images//Icons/delivery-icon-black .jpg" alt="" class="img-fluid">
                                                                                    </li>
                                                                                    <li>
                                                                                        <img src="<?=$assets?>images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                                    </li>
                                                                                </ul>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="write-up-box-top-rights">
                                                                    <div class="fol folloes">
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
                                                                    </div>
                                                                    <ul class="store_km_dis">
                                                                        <li>
                                                                            <span class="user_distance_details"><?=$key['Distance']?></span>
                                                                        </li>
                                                                        <li>
                                                                                <span class="user_distance_details"><?=$key['EstimatedReachTime']?></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php } } ?>

                                                            <section id="stories">
                                                            <?php if(isset($Users)) { $u = 0;?>
                                                            <h6><b>#PROFILES</b></h6>
                                                                <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="padding-top: 12px;overflow: auto;overflow-y: hidden;">
                                                                <?php foreach ($Users as $key) {    ?>
                                                                   <li class="story_list">
                                                                        <div class="product-list-top-left">
                                                                            <div class="product-list-top-left-img height_story">
                                                                                <div class="pink_border">
                                                                                    <div class="green_border">
                                                                                        <div class="blue_border">
                                                                                            <a href="#" data-toggle="modal" data-target="#example">
                                                                                                <img src="<?=$key['UserImage']?>" alt="" class="img-fluid pt-1">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="user_story_p"><?=$key['ProfileName']?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <?php  $u++ ; 
                                                                            if($u ==11){
                                                                                break;
                                                                            }
                                                                        } ?>
                                                                    <ul>
                                                                    <?php } ?>
                                                                </section>
                                                                <?php if(isset($ProductsPostUp)){ $s= 0?>
                                                                <section id="postup">
                                                                     <div class="main-category">
                                                                                <div class="main-category-block">
                                                                                    <div class="lsit-cate">
                                                                                    <div class="tag_title"><b>#POST UP</b></div>
                                                                                        <div class="tab-content" style="margin-top: -13px;padding: 2px;">
                                                                                            <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                                                                                
                                                                                                <div class="product-home">
                                                                                                    <div class="home-product">
                                                                                                
                                                                                                            <?php foreach ($ProductsPostUp as $data) : ?>
                                                                                                                <div class="product-box col-sm-4">
                                                                                                                    <div class="product-img">
                                                                                                                        <a href="<?php echo base_url('product/' . $data['PostId'].'#postid'.$data['PostId']); ?>">
                                                                                                                            
                                                                                                                            <img src="<?php print_r($data['images'][0]['MediaThumbPath']); ?>" alt="" class="img-fluid" style="width: 360px;height: 300px; object-fit: cover;">
                                                                                                                            
                                                                                                                                    
                                                                                                                        </a>
                                                                                                                        <div class="rating" style="display:none">
                                                                                                                            <div class="ratng-block bottom-left">
                                                                                                                                <?php if ($data['Rating'] > 0) : ?>
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
                                                                                                                                <?php endif; ?>
                                                                                                                            </div>
                                                                                                                            <div class="km-block last">
                                                                                                                                <span>
                                                                                                                                    <?php echo $data['Distance']; ?>
                                                                                                                                </span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            <?php 
                                                                                                            $s++; 
                                                                                                            if($s == 11){
                                                                                                                break;
                                                                                                            }
                                                                                                                endforeach; ?>
                                                                                                    
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </section>
                                                                <?php } ?>
                                                                <?php if(isset($ProductsShopUp)){ $i = 0;?>
                                                                <section id="shopup">
                                                                    <div class="main-category">
                                                                            <div class="main-category-block">
                                                                                <div class="lsit-cate">
                                                                                <div class="tag_title"><b>#SHOP UP</b></div>
                                                                                    <div class="tab-content" style="margin-top: -13px;">
                                                                                        <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                                                                            
                                                                                            <div class="product-home">
                                                                                                <div class="home-product">
                                                                            
                                                                                                    <?php foreach ($ProductsShopUp as $data) { ?>
                                                                                                        <div class="product-box height_box col-sm-4" data-aos="fade-up" style="height: 275px;">
                                                                                                            <div class="product-img" style="">
                                                                                                                <a href="<?php echo base_url('product/' . $data['PostId'].'#postid'.$data['PostId']); ?>">
                                                                                                        
                                                                                                            <img src="<?php print_r($data['images'] ? $data['images'][0]['MediaThumbPath'] : ''); ?>" alt="" class="img-fluid" style="height:275px;width: 360px; object-fit: cover;">
                                                                                                        
                                                                                                            </a>
                                                                                                                </div>
                                                                                                                <div class="rating">
                                                                                                                    <div class="ratng-block rating-block-shop-bottom-left">
                                                                                                                        <?php if ($data['Rating'] > 0) : ?>
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
                                                                                                                        <?php endif; ?>
                                                                                                                    </div>
                                                                                                                    <div class="km-block km-block-shop-last mx-0" style="position: absolute; bottom: 76px;right: 5px;">
                                                                                                                        <span>
                                                                                                                            <?php echo $data['Distance']; ?>
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <?php foreach ($data['additionalinfo'] as $additionalinfo) : ?>
                                                                                                                    <?php if ($additionalinfo['FieldName'] == 'product_offer') : ?>
                                                                                                                        <p class="currency_details"> <del style="opacity: 0.5;" class="currency">
                                                                                                                                <?php echo $data['Currency'] . " " . $data['MRP']; ?>
                                                                                                                            </del><span class="badge bg-warning text-light mt-1" style="float: right !important;"><?php echo $additionalinfo['FieldValue'] . "%"; ?></span></p>
                                                                                                                    <?php endif; ?>
                                                                                                                <?php endforeach; ?>
                                                                                                                <div class="details_product">
                                                                                                                
                                                                                                                <div class="currency">
                                                                                                                    <?php echo $data['Currency'] . " " . $data['SellPrice']; ?>
                                                                                                                </div>
                                                                                                                <div class="post_title">
                                                                                                                    <p><?php echo mb_strimwidth($data['Title'], 0, 19, "..."); ?></p>
                                                                                                                </div>
                                                                                                                <?php if ($data['MRP'] > $data['SellPrice']) : ?>
                                                                                                                    <p><small> <?php echo mb_strimwidth($data['ShortDescription'], 0, 10, "..."); ?></small></p>
                                                                                                                <?php else : ?>
                                                                                                                    <p><small> <?php echo mb_strimwidth($data['ShortDescription'], 0, 10, "..."); ?></small></p>
                                                                                                                <?php endif; ?>
                                                                                                                </div>
                                                                                                            
                                                                                                        
                                                                                                        </div>
                                                                                                    <?php  $i++; 
                                                                                                            if($i == 11){
                                                                                                                break;
                                                                                                            }
                                                                                                        } ?>
                                                                                                
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </section>
                                                                        <?php 
                                                                    } ?>
                                                                <?php if(isset($ProductsBookUp)){ $p = 0 ;?>
                                                                <section id="bookup">
                                                                    <div class="main-category">
                                                                            <div class="main-category-block">
                                                                                <div class="lsit-cate">
                                                                                <div class="tag_title"><b>#BOOK UP</b></div>
                                                                                    <div class="tab-content" style="margin-top: -13px;">
                                                                                        <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                                                                            
                                                                                            <div class="product-home">
                                                                                                <div class="home-product">
                                                                            
                                                                                                    <?php foreach ($ProductsBookUp as $data) { ?>
                                                                                                        <div class="product-box height_box col-sm-4" data-aos="fade-up" style="height: 286px;">
                                                                                                            <div class="product-img" style="">
                                                                                                                <a href="<?php echo base_url('product/' . $data['PostId'].'#postid'.$data['PostId']); ?>">
                                                                                                        
                                                                                                            <img src="<?php print_r($data['images'][0]['MediaThumbPath']); ?>" alt="" class="img-fluid" style="height:275px;width: 360px; object-fit: cover;">
                                                                                                        
                                                                                                            </a>
                                                                                                                </div>
                                                                                                                <div class="rating">
                                                                                                                    <div class="ratng-block rating-block-shop-bottom-left">
                                                                                                                        <?php if ($data['Rating'] > 0) : ?>
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
                                                                                                                        <?php endif; ?>
                                                                                                                    </div>
                                                                                                                    <div class="km-block km-block-shop-last mx-0" style="position: absolute; bottom: 86px;right: 5px;">
                                                                                                                        <span>
                                                                                                                            <?php echo $data['Distance']; ?>
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <?php foreach ($data['additionalinfo'] as $additionalinfo) : ?>
                                                                                                                    <?php if ($additionalinfo['FieldName'] == 'product_offer') : ?>
                                                                                                                        <p class="currency_details"> <del style="opacity: 0.5;" class="currency">
                                                                                                                                <?php echo $data['Currency'] . " " . $data['MRP']; ?>
                                                                                                                            </del><span class="badge bg-warning text-light mt-1" style="float: right !important;"><?php echo $additionalinfo['FieldValue'] . "%"; ?></span></p>
                                                                                                                    <?php endif; ?>
                                                                                                                <?php endforeach; ?>
                                                                                                                <div class="details_product">
                                                                                                                
                                                                                                                <div class="currency">
                                                                                                                    <?php echo $data['Currency'] . " " . $data['SellPrice']; ?>
                                                                                                                </div>
                                                                                                                <div class="post_title">
                                                                                                                    <p><?php echo mb_strimwidth($data['Title'], 0, 19, "..."); ?></p>
                                                                                                                </div>
                                                                                                                <?php if ($data['MRP'] > $data['SellPrice']) : ?>
                                                                                                                    <p><small> <?php echo mb_strimwidth($data['ShortDescription'], 0, 10, "..."); ?></small></p>
                                                                                                                <?php else : ?>
                                                                                                                    <p><small> <?php echo mb_strimwidth($data['ShortDescription'], 0, 10, "..."); ?></small></p>
                                                                                                                <?php endif; ?>
                                                                                                                </div>
                                                                                                            
                                                                                                        
                                                                                                        </div>
                                                                                                    <?php $p++; 
                                                                                                            if($p == 11){
                                                                                                                break;
                                                                                                            }} ?>
                                                                                                
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                        
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                                <?php } ?>
                                                                <?php if(isset($ProductsCallUp)){ $c=0;?>
                                                                <section id="callup">
                                                                    <div class="main-category">
                                                                            <div class="main-category-block">
                                                                                <div class="lsit-cate">
                                                                                <div class="tag_title"><b>#CALL UP</b></div>
                                                                                    <div class="tab-content" style="margin-top: -13px;">
                                                                                        <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                                                                            
                                                                                            <div class="product-home">
                                                                                                <div class="home-product">
                                                                            
                                                                                                    <?php foreach ($ProductsCallUp as $data) { ?>
                                                                                                        <div class="product-box height_box col-sm-4" data-aos="fade-up" style="height: 286px;">
                                                                                                            <div class="product-img" style="">
                                                                                                                <a href="<?php echo base_url('product/' . $data['PostId'].'#postid'.$data['PostId']); ?>">
                                                                                                        
                                                                                                            <img src="<?php print_r($data['images'][0]['MediaThumbPath']); ?>" alt="" class="img-fluid" style="height:275px;width: 360px; object-fit: cover;">
                                                                                                        
                                                                                                            </a>
                                                                                                                </div>
                                                                                                                <div class="rating">
                                                                                                                    <div class="ratng-block rating-block-shop-bottom-left">
                                                                                                                        <?php if ($data['Rating'] > 0) : ?>
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
                                                                                                                        <?php endif; ?>
                                                                                                                    </div>
                                                                                                                    <div class="km-block km-block-shop-last mx-0" style="position: absolute; bottom: 86px;right: 5px;">
                                                                                                                        <span>
                                                                                                                            <?php echo $data['Distance']; ?>
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <?php foreach ($data['additionalinfo'] as $additionalinfo) : ?>
                                                                                                                    <?php if ($additionalinfo['FieldName'] == 'product_offer') : ?>
                                                                                                                        <p class="currency_details"> <del style="opacity: 0.5;" class="currency">
                                                                                                                                <?php echo $data['Currency'] . " " . $data['MRP']; ?>
                                                                                                                            </del><span class="badge bg-warning text-light mt-1" style="float: right !important;"><?php echo $additionalinfo['FieldValue'] . "%"; ?></span></p>
                                                                                                                    <?php endif; ?>
                                                                                                                <?php endforeach; ?>
                                                                                                                <div class="details_product">
                                                                                                                
                                                                                                                <div class="currency">
                                                                                                                    <?php echo $data['Currency'] . " " . $data['SellPrice']; ?>
                                                                                                                </div>
                                                                                                                <div class="post_title">
                                                                                                                    <p><?php echo mb_strimwidth($data['Title'], 0, 19, "..."); ?></p>
                                                                                                                </div>
                                                                                                                <?php if ($data['MRP'] > $data['SellPrice']) : ?>
                                                                                                                    <p><small> <?php echo mb_strimwidth($data['ShortDescription'], 0, 10, "..."); ?></small></p>
                                                                                                                <?php else : ?>
                                                                                                                    <p><small> <?php echo mb_strimwidth($data['ShortDescription'], 0, 10, "..."); ?></small></p>
                                                                                                                <?php endif; ?>
                                                                                                                </div>
                                                                                                            
                                                                                                        
                                                                                                        </div>
                                                                                                    <?php 
                                                                                                            $c++; 
                                                                                                            if($c == 11){
                                                                                                                break;
                                                                                                            }
                                                                                                } ?>
                                                                                                
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </section>
                                                                <?php 

                                                            } ?>

                                                           <?php } else{ ?>
                                       
                                                                     <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Post" style="height: 200px;padding: 10px;"><br>No Data Found </p>
                                                                    
                                                                <?php } ?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                              
                                            <?php if(isset($hashtag)){?>
                                                <section id="hashtags">
                                               <div class="container">
                                               <?php
                                                        foreach ($hashtag as $key) { ?>
                                                    <div class="row hash_padding">
                                                        <!-- <a href="#"> -->
                                                            <div class="col-2">
                                                                <img src="<?php echo $assets?>images/hashtag.png" alt="icomn" style="height:45px; width:45px; object-fit: cover; border-radius: 50%;">
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="hash_tag_p"><?=$key['HashTag']?></p>
                                                                    <span class="text-muted muted_font"><?=$key['HashTagPostCount']?></span>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="product-call align-items-right">
                                                                    <a type="button" id="checklogin" class="">U Follow</a>
                                                                </div>
                                                            </div>
                                                        <!-- </a> -->
                                                      
                                                    </div>
                                                    <?php } ?>
                                                    </div>
                                               </section>
                                                        <?php } else{ ?>
                                                
                                                        <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Post" style="height: 200px;padding: 10px;"><br>No Data Found </p>
                                                        
                                                    <?php } ?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <?php 
                                                if(isset($StoreSeach) || isset($Users)){
                                                ?>
                                            
                                                <?php if(isset($StoreSeach)) {?>
                                                <h6><b>#STORES</b></h6>
                                                <?php foreach ($StoreSeach as $key) {
                                                        ?>
                                                        <div class="sort-list-box">
                                                            <div class="write-up-box-top">
                                                                <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left">
                                                                        <div class="sli-img">
                                                                        <div class="pink_border">
                                                                            <div class="green_border">
                                                                                <div class="blue_border">
                                                                                <img src="<?=$key['StoreImage']?>" alt="" class="img-fluid">
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <h6><?=$key['StoreName']?></h6>
                                                                        <p><?=$key['AccountCategory']?></p>
                                                                        <span><?=$key['City'].' , '.$key['Country']?></span>

                                                                    </div>
                                                                        <div class="store-24">
                                                                            <div class="store-img">
                                                                                <ul>
                                                                                    <li>
                                                                                        <img src="<?=$assets?>images//Icons/delivery-icon-black .jpg" alt="" class="img-fluid">
                                                                                    </li>
                                                                                    <li>
                                                                                        <img src="<?=$assets?>images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                                    </li>
                                                                                </ul>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="write-up-box-top-rights">
                                                                    <div class="fol folloes">
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
                                                                    </div>
                                                                    <ul class="store_km_dis">
                                                                        <li>
                                                                            <span class="user_distance_details"><?=$key['Distance']?></span>
                                                                        </li>
                                                                        <li>
                                                                                <span class="user_distance_details"><?=$key['EstimatedReachTime']?></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php } } ?>

                                                            <section id="stories">
                                                            <?php if(isset($Users)) { $u = 0;?>
                                                            <h6><b>#PROFILES</b></h6>
                                                                <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="    padding-top: 12px;overflow: auto;overflow-y: hidden;">
                                                                <?php foreach ($Users as $key) {    ?>
                                                                   <li class="story_list">
                                                                        <div class="product-list-top-left">
                                                                            <div class="product-list-top-left-img height_story">
                                                                                <div class="pink_border">
                                                                                    <div class="green_border">
                                                                                        <div class="blue_border">
                                                                                            <a href="#" data-toggle="modal" data-target="#example">
                                                                                                <img src="<?=$key['UserImage']?>" alt="" class="img-fluid pt-1">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="user_story_p"><?=$key['ProfileName']?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <?php  $u++ ; 
                                                                            if($u ==11){
                                                                                break;
                                                                            }
                                                                        } ?>
                                                                    <ul>
                                                                    <?php } ?>
                                                                </section>
                                                                <?php } else{ ?>
                                                
                                                        <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Post" style="height: 200px;padding: 10px;"><br>No Data Found </p>
                                                        
                                                    <?php } ?>
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


        <script>
 $('.slider-blocks').css('height', '150px');
        </script>