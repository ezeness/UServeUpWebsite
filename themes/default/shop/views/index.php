<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="tab-content tab-borda" >
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
        <section style="">
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
       
        <section>
            <div class="main-category">
                <div class="">
                <div class="filters_title">
                <span id="discover_filter" onclick="cats('','','','store')"><img src="<?=$assets;?>images/grid.png"> <span>DISCOVER</span></span>
                <span id="shopup_filter" style="display:none" onclick="cats('','','','discover')"><img src="<?=$assets;?>images/details_view_icon.png"> <span>SHOP</span></span>
                <span href="#" data-toggle="modal" data-target="#discoverModal" id="discoverSorting"><img src="<?= $assets; ?>images/sort.png" style="height:25px;float: right;"></span>
                <span href="#" data-toggle="modal" data-target="#storeModal" id="storeSorting" style="display:none"><img src="<?= $assets; ?>images/sort.png" style="height:25px;float: right;"></span>
                <span onclick="openNav()" style="cursor: pointer;"><img src="<?= $assets; ?>images/categoryfiltericon.png" style="height:25px;float: right;margin-right:4px;"></span>
            </div>
            <?php if (isset($catagories)) { 
                                    ?>
                    <div class="main-category-block cats_js"  style="display:none">
                        <div class="lsit-cate products">
                            <ul class="nav nav-tabs slider cate-silders same-tab cats_js_data" id="myTab" role="tablist" data-aos="fade-up" style="overflow: auto;overflow-y: hidden;">
                              
                                    <?php foreach ($catagories as $key => $catagory) : 
                                    $id = $catagory['Id'];
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="cats(<?= $id?>,'','','store')" id="motord-tab" data-id="<?php print_r($catagory['Id']); ?>" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true" style="width:90px; height:131px">
                                                <img src="<?php print_r($catagory['CategoryImage']); ?>" alt="icomn" style="height:70px; width:70px; object-fit: cover; border-radius: 50%;">
                                                <p> <?php print_r($catagory['Name']); ?></p>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                              
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                        <?php 
                        if(isset($hashtags) && isset($datas)){
                        ?>  
                            <div class="main-category-block hash_tags">
                                <div class="lsit-cate">
                                    <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="overflow: auto;overflow-y: hidden;">
                                              <?php 
                                              foreach ($hashtags as $hashtag) {
                                              ?>  
                                              <li class="nav-item">
                                                    <a class="nav-link" onclick="loadProducts('','','','discover' , '<?= $hashtag['HashTagMost']?>')" id="motord-tab"  data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true" style="width:90px; height:131px">
                                                        <img src="<?php echo $assets?>images/hashtag.png" alt="icomn" style="height:70px; width:70px; object-fit: cover; border-radius: 50%;">
                                                        <p> <?=$hashtag['HashTagTitle']?></p>
                                                    </a>
                                                </li>
                                                <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                </div>
            </div>
        </section>
       
    </div>
</div>

<div class="tab-content tab-borda " id="discover">
    <?php 
    $i = 0;
    if (isset($datas)) { ?>
    <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post">
        <section>
            <div class="main-category">
                <div class="">
                    <div class="main-category-block">
                        <div class="lsit-cate">
                        <div class="tag_title"><b>#Latest Posts</b></div>
                            <div class="tab-content" id="myTabContent" style="margin-top: -13px;padding: 2px;">
                                <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                    
                                    <div class="product-home">
                                        <div class="home-product">
                                      
                                                <?php foreach ($datas as $data) : ?>
                                                    <div class="product-box col-sm-4" <?=$i > 5 ? 'data-aos="fade-up"' : ''?>>
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
                                                <?php $i++; 
                                                    endforeach; ?>
                                           
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php } else{ ?>
                                    
    <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Post" style="height: 200px;padding: 10px;"><br>No Posts</p>
                                
    <?php } ?>
</div>


<div class="" id="shop_up" style="display:none">
<?php if (isset($shop_up)) { ?>
<div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post">
        <section>
            <div class="main-category">
                <div class="">
                    <div class="main-category-block">
                        <div class="lsit-cate">
                        <div class="tag_title"><b>#Latest Posts</b></div>
                            <div class="tab-content" id="myTabContent" style="margin-top: -13px;">
                                <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                    
                                    <div class="product-home">
                                        <div class="home-product">
                      
                            <?php foreach ($shop_up as $data) { ?>
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
                            <?php } ?>
                                           
                                           </div>
                                       </div>
                                   </div>
   
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </div>
       <?php } else{ ?>                        
            <p class="no_posts" style="text-align:center"><img src="<?=$assets?>images/empty-box.png" alt="No Post" style="height: 200px;padding: 10px;"><br>No Posts</p>
        <?php } ?>
   </div>

<div>
<script>
$("#discover_filter").click(function(){
    $('#shop_up').slideDown("slow", function() {});
    $('#shopup_filter').css('display' , 'contents');
    $('#discover_filter').css('display' , 'none');
    $('#discoverSorting').css('display' , 'none');
    $('#storeSorting').css('display' , 'contents');
    $('#discover').slideUp("slow", function() {});
    $('.cats_js').slideDown("slow", function() {});
    $('.hash_tags').slideUp("slow", function() {});
    $('#pills-postup-tab').css('display' , 'none');
    $('.navbar_type').removeClass("active");

});
$("#shopup_filter").click(function(){
    $('#shop_up').slideUp("slow", function() {});
    $('#storeSorting').css('display' , 'block');
    // $('.product-home').slideUp("slow" , function(){});
    $('#shopup_filter').css('display' , 'none');
    $('#discover_filter').css('display' , 'contents');
    $('#discover').slideDown("slow", function() {});
    $('#discoverSorting').css('display' , 'contents');
    $('#storeSorting').css('display' , 'none');

    $('.hash_tags').slideDown("slow", function() {});
    $('.cats_js').slideUp("slow", function() {});
    $('#pills-postup-tab').css('display' , 'block');
    $('.navbar_type').removeClass("active");



});
</script>
    </div>


    <div class="modal fade" id="discoverModal" tabindex="-1" role="dialog" aria-labelledby="discoverModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Sort</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        if(isset($DiscoverSorting)){
        ?>
        <ul>
            <?php 
            foreach ($DiscoverSorting as $key) {?>
              <li class="sortings" data-filtertype="<?=$key['PostType']?>" data-keyvalue="<?=$key['KeyValue']?>"><?=$key['Name']?></li>
            <?php  }
            ?>
        </ul>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Sort</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        if(isset($StoreSorting)){
        ?>
        <ul>
            <?php 
            foreach ($StoreSorting as $key) {?>
              <li class="sortings" data-filtertype="<?=$key['PostType']?>" data-keyvalue="<?=$key['KeyValue']?>"><?=$key['Name']?></li>
            <?php  }
            ?>
        </ul>
        <?php } ?>
      </div>
    </div>
  </div>
</div>