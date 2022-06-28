<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<style>
.header-bottom-block{
    display:none !important;
}
.product-home .product-box {
    max-width: 33% !important;
}
.product-list-top-left{
    width:15%;
}
.user-name{
    width: 60%;
}
.store-24{
    width: 25%;
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
                                                <a class="nav-link active" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> 
                                                PROFILES</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PROFILE MAP</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            
                                            </div>
                                            <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <?php if(isset($Profiles)) {?>
                                                <h6><b>#STORES</b></h6>
                                                <?php 
                                                foreach ($Profiles as $key) {
                                                        ?>
                                                        <div class="sort-list-box">
                                                            <div class="write-up-box-top">
                                                                <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left">
                                                                        <div class="sli-img">
                                                                        <div class="pink_border">
                                                                            <div class="green_border">
                                                                                <div class="blue_border">
                                                                                <img src="<?=$key['UserImage']?>" alt="" class="img-fluid">
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <h6><?=$key['UserFullName']?></h6>
                                                                        <p>
                                                                            <?php 
                                                                            foreach ($key['AdditionalInfo'] as $Info) {
                                                                            ?>    
                                                                              <?=$Info['FieldName'] == 'Category' ? $Info['FieldValue'] : ''?>
                                                                            <?php } ?>
                                                                      </p>
                                                                        <span><?=$key['Address']['City'].' , '.$key['Address']['Country']?></span>

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
                                                                            echo '<div class="fol u-follow"><a href="#"> U Follow</a><br><a href="'.base_url('unfollow/'.$key['Id']).'" class="remove_ufllow" style="color: #0378CC !important"> Remove</a></div>';
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
                                                        <?php } }?>
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