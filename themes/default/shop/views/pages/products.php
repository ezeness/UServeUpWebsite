
<section id="pro_list" style="">
    <a href="<?php echo "#postid" . $PostId; ?>" id="postidcall"></a>
        <?php if ($datas) : ?>
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
                                <div class="col-sm-5" >
                                    <div class="product-list-block ">
                                        <div class="product-list-box animate__animated animate__fadeInLeft">
                                            <div class="product-list-top">
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
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <ul class="dropdown_copy">
                                                                    <li><img src="<?= $assets; ?>images/New Icon/store.svg" class="img-fluid sto-icon" alt=""> Add to Favorite store</li>
                                                                    <li><img src="<?= $assets; ?>images/New Icon/ic_user_add_multiple.svg" class="img-fluid sto-icon" alt="" style="height: 13px;margin-right: 8px;"> Follow Profile</li>
                                                                    <li><img src="<?= $assets; ?>images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Profile</li>
                                                                    <li><img src="<?= $assets; ?>images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Profile</li>
                                                                    <li onclick="copyToClipboard('#ProfileDeepLinkUrl<?=$data['PostId']?>')"><img src="<?= $assets; ?>images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt="" > Copy Profile Url</li>
                                                                    <li><img src="<?= $assets; ?>images/New Icon/ic_block_account.svg" class="img-fluid sto-icon" alt=""> Block Profile</li>
                                                                    <li><img src="<?= $assets; ?>images/New Icon/ic_about_this_account.svg" class="img-fluid sto-icon" alt=""> About This Account</li>
                                                                    <li><img src="<?= $assets; ?>images/New Icon/ic_report_profile.svg" class="img-fluid sto-icon" alt=""> Report Profile</li>
                                                                </ul>
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
                                                                <a href="#"><img src="<?= $assets; ?>images/tag white.png" alt="ico"></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?= $assets; ?>images/video_icon.png" alt="ico" style="filter: invert(100%);"></a>
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
                                                    <ul>
                                                        <li>
                                                            <p class="hert-icon"></p>
                                                            <span><?php print_r($data['LikeCount']); ?></span>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="copy-icon"> <img src="<?= $assets; ?>images/Component 122.png" alt="icon"></a>
                                                            <span><?php print_r($data['ChainCount']); ?></span>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img src="<?= $assets; ?>images/bookmarkicongrey.png" alt="icon" style="width: 26px;"></a>
                                                            <span><?php print_r($data['BookMarkCount']); ?></span>
                                                        </li>
                                                        <li>
                                                            <p class="writeup-icon"></p>
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
                                                                <ul class="dropdown_copy">
                                                                <li><img src="<?= $assets; ?>images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Post</li>
                                                                <li><img src="<?= $assets; ?>images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Post</li>
                                                                <li  onclick="copyToClipboard('#PostURL<?=$data['PostId']?>')"><img src="<?= $assets; ?>images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post URL</li>
                                                                <li  onclick="copyToClipboard('#PostID<?=$data['PostId']?>')"><img src="<?= $assets; ?>images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post ID</li>
                                                                </ul>
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
                                                                        <img src="<?= $assets; ?>images/Icons/donate 2.jpg" alt="img" class="img-fluid">
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php if ($data['IsFreeContribution'] == 1) : ?>
                                                                    <li class="charity_btn">
                                                                        <img src="<?= $assets; ?>images/charity.jpg" alt="img" class="img-fluid" >
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php 
                                                                    if($loggedIn){ 
                                                                        if($loggedInUser->Store->LicenseType == 'Corp' && strpos($loggedInUser->Store->PlanName , '24') !== false){
                                                                        ?>
                                                                        <li>
                                                                            <img src="<?= $assets; ?>images/Icons/24-7 icon.png" alt="img" class="img-fluid">
                                                                        </li>
                                                                    <?php } } ?>
                                                                    <?php   foreach ($data['additionalinfo'] as $additionalinfo) :
                                                                        if ($additionalinfo['FieldName'] == 'home_delivery_service' && $additionalinfo['FieldValue'] == 1) : ?>
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
                                                               
                                                                    <?php
                                                                    if($data['PostType'] == 'callup'){
                                                                        echo ' <a href="tel:'.$data['StorePhone'].'">';
                                                                    }else{
                                                                        echo ' <a href="#">';
                                                                    }
                                                                    $string = strtoupper($data['PostType']);
                                                                    $str = $string;
                                                                     echo substr($str, 0, 4) . ' ' . substr($str, 4);
                                                                     ?>

                                                                </a>
                                                                <!-- <div class="product-sms-call"> -->
                                                                    <!-- <a href="tel:">Call</a> -->
                                                                    <!-- <a href="#">SMS</a> -->
                                                                <!-- </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="loca">
                                                    <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?=$data['StoreLatitude']?>,<?=$data['StoreLongitude']?>"> <i class="fas fa-map-marker-alt"></i> <?php echo $data['Location']; ?></a>
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
                <input id="ProfileDeepLinkUrl<?=$data['PostId']?>" type="hidden" value="<?=$data['ProfileDeepLinkUrl']?>">
                <input id="PostID<?=$data['PostId']?>" type="hidden" value="<?=$data['PostId']?>">
                <input id="PostURL<?=$data['PostId']?>" type="hidden" value="<?=$data['DeepLinkUrl']?>">
            <?php endforeach; ?>
        <?php endif; ?>
</section>

<script>
 
$( ".charity_btn" ).click(function() {
    var color = $( '.product-call>a, .product-call>button' ).css( "background-color" );
    if(color == 'rgb(20, 146, 230)'){
    $('.product-call>a, .product-call>button').css('background','#C69A41');
    }
    if(color == 'rgb(198, 154, 65)'){
    $('.product-call>a, .product-call>button').css('background','#1492e6');
    }
});
</script>



