
<style>
    .header-bottom-block  {
        display:none;
    }
    .hide_for_details{
        display:none !important;
    }
    .single-product-block{
        width: 100%;
        background-color: #f3f3f3;
        height: 28px;
        padding-left:3px;
    }
    .product-list-box {
    max-width: 430px;
    }
    .product-center {
    position: relative;
    z-index: 0;
    margin-top: 26px;
}
</style>
        <section>
            
            <div class="product-list">
                <div class="container remove_width" style="background:white;width: 1024px">
                    <div class="product-block single-block">
                        <div class="single-productss">
                            <div class="row">
                                <!-- <div class="col-sm-1">
                                    <div class="back-btn">
                                        <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>
                                    </div>
                                </div> -->
                                <div class="col-sm-6">
                                    <!-- <p style="font-size: 18px;;position: absolute; top: 50%;right:90%"><i class="fa fa-arrow-left" aria-hidden="true"></i></p> -->

                                <!-- <div class="col-sm-6" data-aos="fade-up"> -->
                                    <div class="product-list-block">
                                        <div class="product-list-box">
                                            <div class="product-list-top">
                                                <div class="product-list-top-left">
                                                    <div class="product-list-top-left-img">
                                                        <div class="pink_border">
                                                            <div class="green_border">
                                                                <div class="blue_border">
                                                                    <a href="#">
                                                                        <img src="<?=$data->UserImage?>" alt="" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <h5><?=$data->StoreName?></h5>
                                                            <p><?=$data->UserEmail?></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-list-top-right">
                                                    <div class="icon-menu share-icon">

                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/store.svg" class="img-fluid sto-icon" alt=""> Add to Favorite store</a>
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/ic_user_add_multiple.svg" class="img-fluid sto-icon" alt=""> Follow Profile</a>
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Profile</a>
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Profile</a>
                                                                <a href="#" onclick="copyToClipboard('#ProfileDeepLinkUrl')"><img src="<?= $assets; ?>images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt="" > Copy Profile Url</a>
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/ic_block_account.svg" class="img-fluid sto-icon" alt=""> Block Profile</a>
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/ic_about_this_account.svg" class="img-fluid sto-icon" alt=""> About This Account</a>
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/ic_report_profile.svg" class="img-fluid sto-icon" alt=""> Report Profile</a>
                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-center">
                                                <div class="product-video">
                                                    <a href="#">
                                                        <img src="<?= $assets; ?>images/Icons/video1.png" alt="video">
                                                    </a>
                                                </div>
                                                <div class="product-imgs single-product">
                                                <?php 
                                                    foreach ($data->images as $key) {
                                                ?>
                                                    
                                                    <?php 
                                                        if($key->MediaType == 'image'){
                                                    ?>
                                                    <a href="#" >
                                                        <img src="<?php echo $key->MediaPath?>" alt="img" class="img-fluid" style="height:550px; object-fit: cover;">
                                                        </a>
                                                        <?php }
                                                          if($key->MediaType == 'video'){
                                                        ?>
                                                        <a href="#" >
                                                            <video autoplay muted loop >
                                                                <source src="<?php print_r($key->MediaPath); ?>" type="video/mp4">
                                                            </video>
                                                    </a>
                                                    <?php } 
                                                } ?>
                                                </div>
                                                <div class="product-view">
                                                    <div class="product-view-block">
                                                         <ul>
                                                            <li class="tag_white">
                                                                <a href="#"><img src="<?= $assets; ?>images/tag white.png" alt="ico"></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?= $assets; ?>images/video_icon.png" alt="ico" style="filter: invert(100%);"></a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <p style=" filter: opacity(90%);">Views
                                                                        <br><?php print_r($data->ViewCount); ?>
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
                                                            <span><?php print_r($data->LikeCount); ?></span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="copy-icon"> <img src="<?= $assets; ?>images/Component 122.png" alt="icon"></a><br>
                                                            <span><?php print_r($data->ChainCount); ?></span>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img src="<?= $assets; ?>images/bookmarkicongrey.png" alt="icon" style="width: 26px;"></a><br>
                                                            <span><?php print_r($data->BookMarkCount); ?></span>
                                                        </li>
                                                        <li>
                                                            <p class="writeup-icon"></p><br>
                                                            <span><?php print_r($data->CommentCount); ?></span>
                                                        </li>
                                                    </ul>
                                                    <div class="icon-menu share-icon">
                                                        <div class="ratng-block">
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i <= $data->Rating) : ?>
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
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Post</a>
                                                                <a href="#"><img src="<?= $assets; ?>images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Post</a>
                                                                <a href="#" onclick="copyToClipboard('#PostURL')"><img src="<?= $assets; ?>images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post URL</a>
                                                                <a href="#" onclick="copyToClipboard('#PostID')"><img src="<?= $assets; ?>images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post ID</a>

                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                                <div class="product-bottom-top">
                                                <?php foreach ($data->additionalinfo as $additionalinfo) : ?>
                                                        <?php if ($additionalinfo->FieldName == 'product_offer') : ?>
                                                            <div class="pro-sale-price">
                                                                <p> <?php echo  $data->Currency . " " . $data->MRP; ?>/-</p>
                                                                <span><?php echo $additionalinfo->FieldValue; ?>% Off</span>
                                                                <div class="time-end" style="display:none">
                                                                    <p><span>TIME ENDS IN</span> 
                                                                    <?php echo $time;
                                                                     ?> 
                                                                    </p>
                                                                </div>
                                                            </div>
                                                          
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="price-icon">
                                                        <div class="sale-pric">
                                                            <h6><?php echo $data->Currency . " " . $data->SellPrice; ?>/-</h6>
                                                        </div>
                                                        <div class="dliver-icon">
                                                            <ul>
                                                                <?php if ($data->IsOrderToLiftUp == 1) : ?>
                                                                    <li>
                                                                        <img src="<?= $assets; ?>images/Icons/donate 2.jpg" alt="img" width="60px">
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php if ($data->IsFreeContribution == 1) : ?>
                                                                    <li>
                                                                        <img src="<?= $assets; ?>images/charity.jpg" alt="img" class="img-fluid">
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php foreach ($data->additionalinfo as $additionalinfo) : ?>
                                                                    <?php if ($additionalinfo->FieldName == 'twenty_four_service' && $additionalinfo->FieldValue == 1) : ?>
                                                                        <li>
                                                                            <img src="<?= $assets; ?>images/Icons/24-7 icon.png" alt="img" class="img-fluid">
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <?php if ($additionalinfo->FieldName == 'home_delivery_service' && $additionalinfo->FieldValue == 1) : ?>
                                                                        <li>
                                                                            <img src="<?= $assets; ?>images/Icons/delivery-icon-black .jpg" alt="img" class="img-fluid">
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
                                                                    <p><a style="color: white;" href="http://maps.google.com/maps">DRIVE UP <i class="fas fa-location-arrow"></i></a></p>
                                                                </li>
                                                                <li>
                                                                    <p> <?php echo $data->Distance ?></p>
                                                                </li>
                                                                <li>
                                                                    <p><?php echo $data->EstimatedReachTime ?></p>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="pro-price-loca-right">
                                                            <div class="product-call">
                                                                <a href="#">
                                                                <?php 
                                                                    $string = strtoupper($data->PostType);
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
                                                    <a href="#"> <i class="fas fa-map-marker-alt"></i> <?php echo $data->Location; ?></a>
                                                </div>
                                                    <?php 
                                                    if(!empty($data->audios)) {
                                                        foreach ($data->audios as $key) {
                                                    ?>
                                                    <audio controls>
                                                        <source src="<?= $key->MediaNormalPath?>" type="audio/mpeg">
                                                    </audio>
                                                    <?php } } ?>
                                                <div class="singpe-des">
                                                    <h1><?php echo $data->Title?> </h1>
                                                    <p><?php echo $data->ShortDescription?></p>
                                                </div>
                                                <div class="product-bottom-bottom">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="motord-tab" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true">
                                                                <p>Specification</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="homes-tab" data-toggle="tab" href="#homes" role="tab" aria-controls="homes" aria-selected="false">
                                                                <p>Ingredients</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="nutrients-tab" data-toggle="tab" href="#nutrients" role="tab" aria-controls="nutrients" aria-selected="false">
                                                                <p>Nutrient</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                                            <h3></h3>
                                                            <p></p>
                                                        </div>
                                                        <div class="tab-pane fade" id="homes" role="tabpanel" aria-labelledby="homes-tab">
                                                            <h3></h3>
                                                            <p></p>
                                                        </div>
                                                        <div class="tab-pane fade" id="nutrients" role="tabpanel" aria-labelledby="nutrients-tab">
                                                            <h3></h3>
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!-- <div class="col-sm-1">
                                     <div class="back-btn">
                                        <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>
                                    </div>
                                </div> -->
                                <div class="col-sm-6">
                                    <!-- <p style="font-size: 18px;position: absolute; top: 50%;left:94%"><i class="fa fa-arrow-right" aria-hidden="true"></i></p> -->

                                <!-- <div class="col-sm-6" data-aos="fade-up"> -->
                                    <div class="single-pro-right">
                                        <div class="write-up-main">
                                                            <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="commnets-tab" data-toggle="tab" href="#commnets" role="tab" aria-controls="commnets" aria-selected="true">
                                                                        <p>Comments</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link " id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
                                                                        <p>Reviews</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content" id="myTab1Content">
                                                                <div class="tab-pane fade show active" id="commnets" role="tabpanel" aria-labelledby="commnets-tab">
                                                                <?php 
                                                                    if($comments){
                                                                        foreach ($comments as $key) {
                                                                 ?>
                                                                <div class="write-up-box"  data-aos="fade-up">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="<?=$key->UserImage?>" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6><?=$key->Name?></h6>
                                                                            <p><?=$key->AccountCategory?></p>
                                                                            <span></span>
                                                                            <span class="button_style"><?=$key->Distance?></span>
                                                                            <span class="button_style"><?=$key->EstimatedReachTime?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="write-title">
                                                                            <h6><p><?=mb_strimwidth($key->PostShortDescription, 0, 15, "...")?></p> </h6>
                                                                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                                                        </div>
                                                                        <div class="fol u-follow">
                                                                            <a href="#"> U Follow </a>
                                                                        </div>
                                                                        <div class="ra-h">
                                                                            <div class="rating">
                                                                                <div class="ratng-block">
                                                                                      <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                                        <?php if ($i <= $key->Rating) : ?>
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
                                                                            </div>
                                                                            <div class="shop-qwe">
                                                                                <a href="#">SHOP UP</a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="write-price">
                                                                    <div class="write-price-top">
                                                                        <div class="sale-price">
                                                                            <!-- <p><?php echo $key->Currency. " " . $key->PostSellPrice?>/-</p> -->
                                                                        </div>
                                                                        <div class="product-price">
                                                                        <?php foreach ($key->additionalinfo as $additionalinfo) : ?>
                                                                                 <?php if ($additionalinfo->FieldName == 'product_offer') : ?>
                                                                            <!-- <p><?php echo  $additionalinfo->Currency. " " . $key->PostMRP?>/-</p> -->
                                                                            <span><?php echo $additionalinfo->FieldValue ?> % Off</span>
                                                                            <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="write-price-bottom">
                                                                        <p><?=$key->PostShortDescription?></p>
                                                                        <a href="#">View Details</a>
                                                                    </div>
                                                                    <div class="audio-play">
                                                                        <audio controls>
                                                                            <source src="<?=$key->MediaPath?>" type="audio/mpeg">
                                                                        </audio>
                                                                        <!-- <audio preload="auto" src=""></audio> -->
                                                                    </div>
                                                                </div>
                                                                <div class="write-imgs">
                                                                    <ul>
                                                                        <?php 
                                                                            if($key->PostImages){
                                                                            foreach ($key->PostImages as $keys) {
                                                                        ?>
                                                                        <li>
                                                                            <img src="<?=$keys->MediaPath?>" alt="" class="img-fluid">
                                                                        </li>
                                                                        <?php } } ?>
                                                                    </ul>
                                                                    <div class="upload-img">
                                                                        <input type="file" id="real-file" hidden="hidden" />
                                                                        <button type="button" id="custom-button"><img src="<?= $assets; ?>images/Icons/noun_Download_29074.png" alt=""></button>
                                                                        <span id="custom-text">File Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="write-up-box-bottom">
                                                                    <div class="write-up-box-top-right">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#" class=""><i class="far fa-heart"></i> <span><?=$key->LikeCount?></span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"><img src="<?= $assets; ?>images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"><img src="<?= $assets; ?>images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span>Replies</span></a>
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
                                                                <?php } }else{  ?>
                                                                    <p style="padding: 15px;"> <br> No Comments</p>
                                                                    <?php } ?>
                                                           </div>
                                                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                                                <?php if($reviews)
                                                                    {
                                                                        foreach ($reviews as $key) {
                                                                ?>
                                                                <div class="write-up-box"  data-aos="fade-up">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="<?=$key->UserImage?>" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6><?=$key->Name?></h6>
                                                                            <p><?=$key->AccountCategory?></p>
                                                                            <span><?=$time?></span>
                                                                            <span class="button_style"><?=$key->Distance?></span>
                                                                            <span class="button_style"><?=$key->EstimatedReachTime?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="write-title">
                                                                            <h6><p><?=mb_strimwidth($key->PostShortDescription, 0, 15, "...")?></p> </h6>
                                                                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                                                        </div>
                                                                        <div class="fol u-follow">
                                                                            <a href="#"> U Follow </a>
                                                                        </div>
                                                                        <div class="ra-h">
                                                                            <div class="rating">
                                                                                <div class="ratng-block">
                                                                                      <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                                        <?php if ($i <= $key->Rating) : ?>
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
                                                                            </div>
                                                                            <div class="shop-qwe">
                                                                                <a href="#">SHOP UP</a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="write-price">
                                                                    <div class="write-price-top">
                                                                        <div class="sale-price">
                                                                            <!-- <p><?php echo $key->Currency. " " . $key->PostSellPrice?>/-</p> -->
                                                                        </div>
                                                                        <div class="product-price">
                                                                        <?php foreach ($key->additionalinfo as $additionalinfo) : ?>
                                                                                 <?php if ($additionalinfo->FieldName == 'product_offer') : ?>
                                                                            <p><?php echo  $key->Currency. " " . $key->PostMRP?>/-</p>
                                                                            <span><?php echo $additionalinfo->FieldValue ?> % Off</span>
                                                                            <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="write-price-bottom">
                                                                        <p><?=$key->PostShortDescription?></p>
                                                                        <a href="#">View Details</a>
                                                                    </div>
                                                                    <div class="audio-play">
                                                                        <audio preload="auto" src="<?=$key->MediaThumbPath?>"></audio>
                                                                    </div>
                                                                </div>
                                                                <div class="write-imgs">
                                                                    <ul>
                                                                        <?php 
                                                                            if($key->PostImages){
                                                                            foreach ($key->PostImages as $keys) {
                                                                        ?>
                                                                        <li>
                                                                            <img src="<?=$keys->MediaPath?>" alt="" class="img-fluid">
                                                                        </li>
                                                                        <?php } } ?>
                                                                    </ul>
                                                                    <div class="upload-img">
                                                                        <input type="file" id="real-file" hidden="hidden" />
                                                                        <button type="button" id="custom-button"><img src="<?= $assets; ?>images/Icons/noun_Download_29074.png" alt=""></button>
                                                                        <span id="custom-text">File Name</span>
                                                                    </div>
                                                                </div>
                                                                <div class="write-up-box-bottom">
                                                                    <div class="write-up-box-top-right">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#" class=""><i class="far fa-heart"></i> <span><?=$key->LikeCount?></span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"><img src="<?= $assets; ?>images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"><img src="<?= $assets; ?>images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span>Replies</span></a>
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
                                                                <?php } } else{?>
                                                                    
                                                                    <p style="padding: 15px;">No Reviews</p>
                                                                    <?php }?>
                                                        </div>
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
        <?php if(isset($TaggedPosts)){ ?>
        <section>
            <div class="latest-product-list">
                <div class="">
                    <div class="single-product-block">
                        <div class="single-product-title" data-aos="fade-up">
                            <span class="single-product-title">
                            #TAG UP POSTS
                        </span>
                        </div>
                        <div class="product-home Similar-section" data-aos="fade-up">
                            <div class="product-home" data-aos="fade-up">
                                <div class="home-products slider">

                                <?php 
                                    
                                        foreach ($TaggedPosts as $key => $value) {
                                ?>
                                    <div class="product-box height_box aos-init aos-animate" data-aos="fade-up">
                                         <div class="product-img" >
                                             <a href="<?=base_url('productDetail/'.$value['PostId'])?>">
                                                 <img src="<?=$value['images'][0]['MediaPath']?>" alt="" class="img-fluid" style="height:215px; width:170px; object-fit: cover;">
                                             </a>
                                             <div class="rating">
                                                 <div class="ratng-block">

                                                 </div>
                                                 <div class="km-block">
                                                     <span>
                                                     <?=$value['Distance']?>
                                                 </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="prodct-detsil">
                                             <div class="product-price">
                                            <?php if(isset($value['additionalinfo'])){ 
                                                foreach ($value['additionalinfo'] as $additionalinfo) : ?>
                                                <?php if ($additionalinfo['FieldName'] == 'product_offer') : ?>
                                                 <p><?php echo  $value['Currency'] . " " . $value['MRP']; ?>/-</p>
                                                 <span><?php echo $additionalinfo['FieldValue']; ?>% Off</span>
                                                 <?php endif; ?>
                                                    <?php endforeach; } ?>
                                             </div>
                                             <div class="sale-price">
                                                 <p><?php echo $value['Currency'] . " " . $value['SellPrice']; ?>/-</p>
                                             </div>
                                             
                                                <div class="product-title">
                                                <a href="<?=base_url('productDetail/'.$value['PostId'])?>">
                                                    <p><?=$value['Title']?></p>
                                                    <span><?php echo $value['ShortDescription']?></span> </a>
                                                 </div>
                                           
                                         </div>
                                     </div>
                                     <?php 
                                } ?>
                                 </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php   } if(isset($TaggedUsers)){ 
            ?>
        <section>
            <div class="latest-product-list">
                <div class="">
                    <div class="single-product-block">
                        <div class="single-product-title" data-aos="fade-up">
                            <span class="single-product-title">
                            #TAG UP PROFILES
                        </span>
                        </div>
                        <div class="product-home Similar-section" data-aos="fade-up">
                            <div class="product-home" data-aos="fade-up">
                                <div class="home-products slider">

                                <?php 
                                  
                                        foreach ($TaggedUsers as $key => $value) {
                                ?>
                                    <div class="product-list-top-left">
                                        <div class="product-list-top-left-img" style="height: 80px;width: 80px;">
                                            <a href="#">
                                                <img src="<?=$value['UserImage']?>" alt="" class="img-fluid">
                                                <h5 class="muted_text profile_text">@_<?=$value['ProfileName']?></h5>
                                            </a>
                                            
                                        </div>
                                    </div>
                            <?php 
                                } ?>
                                 </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php 
         } if(isset($similarProducts)){
        ?>
        <section>
            <div class="latest-product-list">
                <div class="">
                    <div class="single-product-block">
                        <div class="single-product-title" data-aos="fade-up">
                            <span class="single-product-title">
                            # Similar POSTS
                        </span>
                        </div>
                        <div class="product-home Similar-section" data-aos="fade-up">
                            <div class="product-home" data-aos="fade-up">
                                <div class="home-products slider">

                                <?php 
                                   
                                        foreach ($similarProducts as $key => $value) {
                                ?>
                                    <div class="product-box height_box aos-init aos-animate" data-aos="fade-up">
                                         <div class="product-img" >
                                             <a href="<?=base_url('productDetail/'.$value['PostId'])?>">
                                                 <img src="<?=$value['images'][0]['MediaPath']?>" alt="" class="img-fluid" style="height:215px; width:170px; object-fit: cover;">
                                             </a>
                                             <div class="rating">
                                                 <div class="ratng-block">

                                                 </div>
                                                 <div class="km-block">
                                                     <span>
                                                     <?=$value['Distance']?>
                                                 </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="prodct-detsil">
                                             <div class="product-price">
                                             <?php foreach ($value['additionalinfo'] as $additionalinfo) : ?>
                                                <?php if ($additionalinfo['FieldName'] == 'product_offer') : ?>
                                                 <p><?php echo  $value['Currency'] . " " . $value['MRP']; ?>/-</p>
                                                 <span><?php echo $additionalinfo['FieldValue']; ?>% Off</span>
                                                 <?php endif; ?>
                                                    <?php endforeach; ?>
                                             </div>
                                             <div class="sale-price">
                                                 <p><?php echo $value['Currency'] . " " . $value['SellPrice']; ?>/-</p>
                                             </div>
                                             
                                                <div class="product-title">
                                                <a href="<?=base_url('productDetail/'.$value['PostId'])?>">
                                                    <p><?=$value['Title']?></p>
                                                    <span><?php echo $value['ShortDescription']?></span> </a>
                                                 </div>
                                           
                                         </div>
                                     </div>
                                     <?php 
                                }  ?>
                                 </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
      

<input id="ProfileDeepLinkUrl" type="hidden" value="<?=$data->ProfileDeepLinkUrl?>">
<input id="PostID" type="hidden" value="<?=$data->PostId?>">
<input id="PostURL" type="hidden" value="<?=$data->DeepLinkUrl?>">

<script>
    function copyToClipboard(element) {
        var copyText = $(element).val();
        navigator.clipboard.writeText(copyText);
        alertMessage("Link Copied!" , "success")
        }
        var wdith = $( window ).width();
        if(wdith <= 700){
            $('.remove_width').css('width' , 'auto');
        }

</script>