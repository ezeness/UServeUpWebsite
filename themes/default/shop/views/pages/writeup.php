
<style>
.catsfilter{
    display:none !important;
}
</style>
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
                    <a href="#"> <img src="<?php echo $assets?>images/Banners/slider1.jpg" alt="" class="img-fluid"> </a>
                </div>
                <div class="slider-blocks" style="height:250 px;width:auto !important">
                    <a href="#"> <img src="<?=$assets?>images/Banners/slider2.jpg" alt="" class="img-fluid"> </a>
                </div>
                <div class="slider-blocks" style="height:250 px;width:auto !important">
                    <a href="#"> <img src="<?php echo$assets?>images/Banners/slider3.jpg" alt="" class="img-fluid" > </a>
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

<div>

        <section id="writeUp">
            <div class="product-list w">
                <div class="container">
                    <div class="product-block single-block">
                        <div class="row">
                            <!-- <div class="col-sm-1">
                                <div class="back-btn">
                                    <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>
                                </div>
                            </div> -->
                            <div class="col-sm-7">
                                <div class="write-up">
                                    <!-- <div class="write-up-img">
                                        <img src="assets/images/Banners/download.png" alt="" class="img-fluid">
                                    </div> -->

                                    <div class="write-up-block">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ALL WRITE UP</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab"  href="<?=base_url('wall')?>">WALL</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                                <div class="writw-up">
                                                <section>
                                                    <div class="main-category">
                                                        <div class="">
                                                            <div class="main-category-block">
                                                                <div class="lsit-cate products">
                                                                    <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="overflow: auto;overflow-y: hidden;">
                                                                        <?php if (isset($catagories)) : 
                                                                            ?>
                                                                            <?php foreach ($catagories as $key => $catagory) : 
                                                                            $id = $catagory['Id'];
                                                                                ?>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link" onclick="catsWriteUp(<?= $id?>)" id="motord-tab" data-id="<?php print_r($catagory['Id']); ?>" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true" style="width:90px; height:131px">
                                                                                        <img src="<?php print_r($catagory['CategoryImage']); ?>" alt="icomn" style="height:70px; width:70px; object-fit: cover; border-radius: 50%;">
                                                                                        <p> <?php print_r($catagory['Name']); ?></p>
                                                                                    </a>
                                                                                </li>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <?php 
                                                    if(isset($writeups)){
                                                ?>
                                                    <div class="write-up-main">
                                                        <?php 
                                                            foreach ($writeups as $key) {
                                                        ?>
                                                        <div class="write-up-box " data-aos="fade-up">
                                                            <div class="write-up-box-top">
                                                                <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left" style="margin-top: 7px;">
                                                                        <div class="sli-img">
                                                                         <div class="pink_border">
                                                                            <div class="green_border">
                                                                                <div class="blue_border">
                                                                                    <img src="<?=$key['UserThumbImage']?>" alt="" class="img-fluid">
                                                                                </div>
                                                                              </div>
                                                                            </div>
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
                                                                        
                                                                    
                                                                    <div class="ra-h">
                                                                        <div class="rating">
                                                                            <div class="ratng-block">
                                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                                     <?php if ($i <= $key['Rating']) : ?>
                                                                                            <span class="fa fa-star checked"></span>
                                                                                                <?php else : ?>
                                                                                            <span class="fa fa-star"></span>
                                                                                        <?php endif; ?>
                                                                                <?php endfor; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="shop-qwe">
                                                                            <a href="#">
                                                                            <?php 
                                                                             $string = strtoupper($key['PostType']);
                                                                             $str = $string;
                                                                              echo substr($str, 0, 4) . ' ' . substr($str, 4); 
                                                                            ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="write-price">
                                                                <div class="write-price-top">
                                                                <div class="sale-price">
                                                                 <p>
                                                                      <?php
                                                                      for($i = 0 ;$i < count($key['additionalinfo']); $i++) {
                                                                        ?>
                                                                    
                                                                       <?php 
                                                                            if($key['additionalinfo'][$i]['FieldName'] == 'currency')
                                                                            {
                                                                            echo $key['additionalinfo'][$i]['FieldValue'] . " " . $key['SellPrice'].'/-' ;
                                                                            } 
                                                                            ?>  
                                                                        <?php } ?>
                                                                        </p>
                                                                    </div>
                                                                    <?php if ($key['additionalinfo'][0]['FieldName'] == 'product_offer') { 
                                                                        ?>
                                                                    <div class="product-price">
                                                                     <p>
                                                                    <?php for($i = 0 ;$i < count($key['additionalinfo']); $i++) {
                                                                        ?>
                                                                     <?php 
                                                                         if($key['additionalinfo'][$i]['FieldName'] == 'currency')
                                                                         {
                                                                            echo $key['additionalinfo'][$i]['FieldValue'] . " " . $key['MRP'].'/-' ;
                                                                            } 
                                                                            ?>
                                                                        <?php } ?>
                                                                     </p>
                                                                        <span><?php echo $key['additionalinfo'][0]['FieldValue']; ?>% Off</span>
                                                                        
                                                                    </div>
                                                                    <?php } ?>
                                                                
                                                                </div>
                                                                <div class="write-price-bottom">
                                                                    <h6><?=mb_strimwidth($key['Title'], 0, 31, "...")?></h6>
                                                                    <p><?=mb_strimwidth($key['ShortDescription'], 0, 150, "...")?> </p>
                                                                    <!-- <a href="#">View Details</a> -->
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
                                                            </div>
                                                            <div class="write-imgs">
                                                                <ul>

                                                                    <li>
                                                                         <?php 
                                                                            foreach ($key['images'] as $keyss => $images) {
                                                                        ?>
                                                                                    <img src="<?php echo $images['MediaPath']?>" alt="img" class="img-fluid">
                                                                            <?php } ?>
                                                                    </li>
                                                                </ul>
                                                                <div class="upload-img" style="display:none">
                                                                    <input type="file" id="real-file" hidden="hidden" />
                                                                    <button type="button" id="custom-button"><img src="<?=$assets?>images/Icons/noun_Download_29074.png" alt=""></button>
                                                                    <span id="custom-text">File Name</span>
                                                                </div>
                                                            </div>
                                                            <div class="write-up-box-bottom">
                                                                <div class="write-up-box-top-right">
                                                                   
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" class=""><i class="far fa-heart"></i> <span><?=$key['CommentCount']?></span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="<?=$assets?>images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="<?=$assets?>images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span><?=$key['CommentCount']?> Replies</span></a>
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
                                                        <?php }   ?>
                                                    </div>
                                                    <?php } else {
                                                      ?>
                                                        <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Data" style="height: 200px;padding: 10px;"><br>No Data</p>
                                                   <?php  }?>
                                                </div>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                
                                            </div>
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <div>
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

        <script>
         var userNavbar = '';
         catsWriteUp= function (subcat_id='',parent_id=''){
                if(parent_id == ''){
                    // localStorage.removeItem('MainCategoryId');
                    localStorage.setItem('MainCategoryId', subcat_id);
                    parent_id = localStorage.getItem('MainCategoryId');
                }
                loadUserProducts(subcat_id,parent_id);
                $.ajax({
                url:'<?php echo base_url('main/getWriteupCategories'); ?>/'+parent_id+'/'+subcat_id,
                type: 'GET',
                dataType:'json',
                data:{
                   nav:userNavbar,
                },
                success:function(data){
                    if(data.subcats ==null){
                    return;
                    }
                    view = ` <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="overflow: auto;overflow-y: hidden;">`;
                        for(var i =0;i<data.subcats.length;i++){
                            view += `
                                <li class="nav-item">
                                <a class="nav-link" onclick="catsWriteUp(`+data.subcats[i].Id+`,`+parent_id+`)" data-id="`+data.subcats[i].Id+`" id="motord-tab" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true" style="width:90px; height:120px">
                                        <img src="`+data.subcats[i].CategoryImage+`" alt="icomn" style="height:55px; width:55px; object-fit: cover; border-radius: 50%;">
                                            <p> `+data.subcats[i].Name+`</p>
                                    </a>
                                </li>
                            `;
                                }
                    view+=`</ul>`;
                 
                    $(".products").empty();
                    $(".products").html(view);                    
                }
            });
            };


            
            loadUserProducts = function (catid , p_id = ''){
                // $('#shop_up').css("display",'block');
                    // closeNav();
                    $.ajax({
                    url:'<?php echo base_url('user/getWriteupbyUserCtaegory'); ?>'+'/'+catid+'/'+p_id,
                    type: 'GET',
                    dataType:'json',
                    data:{
                        nav:navbar,
                    },
                    success:function(data){
                        if(data.navbar != null){
                            view = ``;
                            for(var i =0;i<data.navbar.length;i++){
                                if(data.navbar[i].Type == navbar){
                                    active = 'active';
                                }else{
                                    active = '';
                                }
                                view += `    
                                
                                    <li class="nav-item navbar_filter ">
                                        <a style="cursor: pointer;" class="nav-link  `+active+`" data-type="`+data.navbar[i].Type+`">`+data.navbar[i].Title+`</a>
                                    </li>
                                            `;
                                    }
                                
                        $(".Navbar_Tabss").empty();
                        $(".Navbar_Tabss").html(view);
                        }
                        $(".navbar_filter" ).click(function() {
                                userNavbar = $(this).data("type");
                                $(this).addClass('active');
                                catsWriteUp(catid);
                        });
                        if(data.datas != null){
                        view = ``;
                            for(var i =0;i<data.datas.length;i++){
                                
                                view += `
                                <div class="write-up-box" data-aos="fade-up">
                                    <div class="write-up-box-top">
                                        <div class="write-up-box-top-left">
                                            <div class="product-list-top-left">
                                                <div class="sli-img">
                                                    <div class="pink_border">
                                                    <div class="green_border">
                                                        <div class="blue_border">
                                                            <img src="`+data.datas[i].UserThumbImage+`" alt="" class="img-fluid">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-name">
                                                <h6>`+data.datas[i].Username+`</h6>
                                                <p>`+data.datas[i].AccountCategory+`</p>
                                                <span class="user_distance_details">`+data.datas[i].Distance+`</span>
                                                <span class="user_distance_details">`+data.datas[i].EstimatedReachTime+`</span>
                                            </div>
                                        </div>
                                        <div class="write-up-box-top-rights">
                                            <div class="write-title">
                                                <h6><p>`+data.datas[i].ProfileName+`</p> </h6>
                                                <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                            </div>`; 
                                                    if(data.datas[i].IsFriend == 1){
                                                        view+= `<div class="fol friendsU"><a href="#"> U FriendS</a></div>`;
                                                    }
                                                    else if(data.datas[i].IsFollowU == 1){
                                                        view+=`<div class="fol"><a href="#"> Follow U</a></div>`;
                                                    }
                                                    else if(data.datas[i].IsUFollow == 1){
                                                        view+=`<div class="fol u-follow"><a href="#"> U Follow</a></div>`;
                                                    }
                                                                    
                                                                  view+= `<div class="ra-h">
                                                                        <div class="rating">
                                                                            <div class="ratng-block">`;
                                                                            // if (data.datas[i].Rating) {
                                                                                for (a = 1; a <= 5; a++) {
                                                                                    
                                                                                        if (a <= data.datas[i].Rating) {
                                                                                            view+=`<span class="fa fa-star checked"></span>`;
                                                                                        } else{
                                                                                            view+=`<span class="fa fa-star"></span>`;
                                                                                        } 
                                                                                    } 
                                                                                // }
                                                                           view+=` </div>
                                                                        </div>
                                                                        <div class="shop-qwe">
                                                                            <a href="#">`+data.datas[i].PostType.toUpperCase().replace(/^(.{4})(.{4})(.{4})(.*)$/, "   ")+`</a>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="write-price">
                                                                <div class="write-price-top">
                                                                <div class="sale-price"><p>
                                                                `;
                                                                  
                                                                     for(var j =0;j<data.datas[i].additionalinfo.length;j++){
                                                                        if(data.datas[i].additionalinfo[j].FieldName == 'currency'){
                                                                         view+=` `+data.datas[i].additionalinfo[j].FieldValue+` `+data.datas[i].SellPrice+``;
                                                                        }
                                                                    }
                                                                        view+=`/-</p>
                                                                    </div>
                                                                   `;
                                                                        if(data.datas[i].additionalinfo[0].FieldName == 'product_offer'){
                                                                            view+=` <div class="product-price"><p>`;
                                                                        for(var j =0;j<data.datas[i].additionalinfo.length;j++){
                                                                        if(data.datas[i].additionalinfo[j].FieldName == 'currency'){
                                                                            view+=` `+data.datas[i].additionalinfo[j].FieldValue+` `+data.datas[i].MRP+` `; 
                                                                    } 
                                                                     } 
                                                                    view+=`/-</p>
                                                                        <span>`+data.datas[i].additionalinfo[0].FieldValue+`% Off</span>
                                                                    </div>`;
                                                                        }
                                                                    
                                                                view+=`</div>
                                                                <div class="write-price-bottom">
                                                                    <h6>`+data.datas[i].Title.substr(0,10)+`</h6>
                                                                    <p>`+data.datas[i].ShortDescription.substr(0,20)+`</p>
                                                                    <!-- <a href="#">View Details</a> -->
                                                                </div>
                                                                <div class="audio-play">`;
                                                                        if(data.datas[i].audio != '') {
                                                                            view+=`
                                                                        <audio controls>
                                                                            <source src="`+data.datas[i].audio[0].MediaNormalPath+`" type="audio/mpeg">
                                                                        </audio>`;
                                                                         } 
                                                               view+=` </div>
                                                            </div>
                                                            <div class="write-imgs">
                                                                <ul>

                                                                    <li>`;
                                                                        for(var k =0;k<data.datas[i].images.length;k++){ 
                                                                            console.log();
                                                                                view+=` <img src="`+data.datas[i].images[k].MediaThumbPath+`" alt="img" class="img-fluid">
                                                                           `;
                                                                          } 
                                                                    view+=`</li>
                                                                </ul>
                                                                <div class="upload-img" style="display:none">
                                                                    <input type="file" id="real-file" hidden="hidden" />
                                                                    <button type="button" id="custom-button"><img src="/images/Icons/noun_Download_29074.png" alt=""></button>
                                                                    <span id="custom-text">File Name</span>
                                                                </div>
                                                            </div>
                                                            <div class="write-up-box-bottom">
                                                                <div class="write-up-box-top-right">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" class=""><i class="far fa-heart"></i> <span>8</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="`+assets+`images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><img src="`+assets+`images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span>`+data.datas[i].CommentCount+` Replies</span></a>
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
                                `;
                                    }
                                $(".write-up-main").empty();
                                $(".write-up-main").html(view);
                                } else{
                                $(".write-up-main").empty();
                                $(".write-up-main").html('No WriteUp Found');
                                }
                    }
                });
                };

                $('.slider-blocks').css('height' , '150px');

                $(".navbar_filter" ).click(function() {
                    navbar = $(this).data("type");
                    $('.navbar_filter').removeClass("active");
                    $(this).addClass("active");
                    loadUserProducts(localStorage.getItem('MainCategoryId'));
            });
        </script>