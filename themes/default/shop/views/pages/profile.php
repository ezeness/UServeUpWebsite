
<style>
.header-bottom-block  {
display:none;
}
.hide_for_details{
display:none !important;
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
                                        </div>
                                            <div class="qr_code">
                                             
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
                                        <img src="<?=$assets?>images/Icons/24-7 icon.png" alt="scan">
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
                </div>

            </div>

        </div>

        <div class="main-category-block" style="margin-top:10px">
                <div class="">
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
            </div>
      
        <div class="men" style="display:none">
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
                            <a href="#"> <img src="<?=$assets?>images/writeupblack.png" alt="Home-icon" style="height:auto;"> </a>
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
            <br>
            <div class="header-benner">
            <!-- <div class="container">
                    <div class="header-page-title">
                        <h6>PAGE TITLE</h6>
                    </div>
                </div> -->
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
             <div class="">
                <div class="filters_title">
                <span id="discover_filter" onclick="catsbyUser('','','','store')"><img src="<?=$assets;?>images/grid.png"> <span>DISCOVER</span></span>
                <span id="shopup_filter" style="display:none" onclick="catsbyUser('','','','discover')"><img src="<?=$assets;?>images/details_view_icon.png"> <span>SHOP</span></span>
                <span href="#" data-toggle="modal" data-target="#discoverModal" id="discoverSorting"><img src="<?= $assets; ?>images/sort.png" style="height:28px;float: right;"></span>
                <span href="#" data-toggle="modal" data-target="#storeModal" id="storeSorting" style="display:none"><img src="<?= $assets; ?>images/sort.png" style="height:28px;float: right;"></span>
                <span onclick="openNav()" style="cursor: pointer;"><img src="<?= $assets; ?>images/categoryfiltericon.png" style="height:28px;float: right;margin-right:10px;"></span>
            </div>
        <div class="shop-profile">

                            <div class="tab-content tab-borda ">
                                <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post">
                                    <section>
                                        <div class="main-category">
                                            <div class="">
                                                <div class="main-category-block">
                                                    <div class="main-category-block" id="playlist">
                                                        <div class="">
                                                            <ul class="nav nav-tabs slider cate-sildercall same-tab" id="myTab" role="tablist" data-aos="fade-up">
                                                            <li class="nav-item ">
                                                                    <a class="nav-link border-radius highlight_a" data-toggle="modal" data-target="#playlist-modal">
                                                                        <i class="fa fa-plus-circle " aria-hidden="true" style="font-size:30px"></i>
                                                                        <p class="highlight_des">
                                                                            <b>Playlist</b><br>
                                                                            Add Playlist  
                                                                        </p>
                                                                    </a>
                                                                </li>
                                                                <?php 
                                                                    if(isset($playlist)){
                                                                    ?>
                                                            <?php 
                                                            
                                                                    foreach ($playlist as $key) {
                                                                ?>
                                                                <li class="nav-item border-radius">
                                                                    <a class="nav-link border-radius highlight_a" id="motord-tab" href="#"  style="height: 55px;">
                                                                        <img src="<?=$key['CoverImage']?>" alt="icomn">
                                                                        <p class="highlight_des"><b><?=$key['Title']?></b><br>
                                                                            <?=$key['SubTitle']?>
                                                                        </p>
                                                                    </a>
                                                                </li>
                                                                <?php } ?>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="lsit-cate profileproducts" style="display:none">
                                                        <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="overflow: auto;overflow-y: hidden;display:none">
                                                                <?php if ($catagories) : 
                                                                    ?>
                                                                    <?php foreach ($catagories as $key => $catagory) : 
                                                                    $id = $catagory['Id'];
                                                                        ?>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" onclick="catsbyUser(<?= $id?>,'','','store')" id="motord-tab" data-id="<?php print_r($catagory['Id']); ?>" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true" style="width:90px; height:120px">
                                                                                <img src="<?php print_r($catagory['CategoryImage']); ?>" alt="icomn" style="height:55px; width:55px; object-fit: cover; border-radius: 50%;">
                                                                                <p> <?php print_r($catagory['Name']); ?></p>
                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </ul> 
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
                                                                            <div class="rating">
                                                                                <div class="ratng-block bottom-left" style="display:none">
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
                                            
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>





        </div>
    </div>
    </div>
</section>
<form class="modal multi-step" id="demo-modal" action="<?=base_url('user/addhighlights')?>" method="POST"> 
    <div class="modal-dialog">         
        <div class="modal-content">            
             <div class="modal-header">                 
                 <h4 class="modal-title">Add New Highlights</h4>                             
             </div>             
             <div class="modal-body">             
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="cover_image">Highlight Cover Image</label>
                            <input type="file" onchange="encodeImageFileAsURL(this);" id="cover_image" class="form-control" name="cover_image" required />
                            <input type="hidden" id="ImageBase64" name="ImageBase64" value="">
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="hightlight_title">Highlight Title</label>
                            <input type="text" id="hightlight_title" class="form-control" name="hightlight_title" required />
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="hightlight_subtitle">Highlight Subtitle</label>
                            <input type="text" id="hightlight_subtitle" class="form-control" name="hightlight_subtitle" required />
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="posts_from">Select Posts from</label>
                            <select class="form-control" id="posts_from" required name="add_post_from">
                                <option readonly disabled selected>Select from</option>
                                <option value="discover">Add from My Home</option>
                                <option value="store">Add from My Store</option>
                                <option value="story">Add from My Story</option>
                            </select>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="posts">Select Posts</label>
                            <ul class="post_ul">
                                </ul>
                    </div>
                </div>
             </div>                       
         <div class="modal-footer">                 
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>       
             <button type="submit" class="btn btn-sm btn-primary">Submit</button>             
        </div>         
    </div>     
</div> 
</form> 

<form class="modal multi-step" id="playlist-modal" action="<?=base_url('user/addPlaylist')?>" method="POST"> 
    <div class="modal-dialog">         
        <div class="modal-content">            
             <div class="modal-header">                 
                 <h4 class="modal-title">Add New Playlist</h4>                             
             </div>             
             <div class="modal-body">             
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="playlistcover_image">Playlist Cover Image</label>
                            <input type="file" onchange="encodePlaylistImageFileAsURL(this);" id="playlistcover_image" class="form-control" name="playlistcover_image" required />
                            <input type="hidden" id="PlaylistImageBase64" name="PlaylistImageBase64" value="">
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="playlist_title">Playlist Title</label>
                            <input type="text" id="playlist_title" class="form-control" name="playlist_title" required />
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="playlist_subtitle">Playlist Subtitle</label>
                            <input type="text" id="playlist_subtitle" class="form-control" name="playlist_subtitle" required />
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="playlistposts_from">Select Posts from</label>
                            <select class="form-control" id="playlistposts_from" required name="add_post_from">
                                <option readonly disabled selected>Select from</option>
                                <option value="discover">Add from My Home</option>
                                <option value="store">Add from My Store</option>
                                <option value="story">Add from My Story</option>
                            </select>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="posts">Select Posts</label>
                            <ul class="playlistpost_ul">
                                </ul>
                    </div>
                </div>
             </div>                       
         <div class="modal-footer">                 
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>       
             <button type="submit" class="btn btn-sm btn-primary">Submit</button>             
        </div>         
    </div>     
</div> 
</form> 
<script type='text/javascript'>
  function encodeImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    $('#ImageBase64').val(reader.result);
  }
  reader.readAsDataURL(file);
}
function encodePlaylistImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    $('#PlaylistImageBase64').val(reader.result);
  }
  reader.readAsDataURL(file);
}
</script>
<script type="text/javascript" src="<?=$assets?>css/jquery.qrcode.min.js"></script>

<script>

$('.qr_code').qrcode({
  text: "<?=$user_details->ProfileDeepLinkUrl?>",
  width: 100,
  height: 100
});
$("#discover_filter").click(function(){
    // $('#shop_up').slideDown("slow", function() {});
    $('#shopup_filter').css('display' , 'contents');
    $('#discover_filter').css('display' , 'none');
    // $('#discover').slideUp("slow", function() {});
    $('.cate-silders').css('display' , 'block');
    $('#playlist').css('display' , 'none');
});
$("#shopup_filter").click(function(){
    // $('#shop_up').slideUp("slow", function() {});
    // $('.product-home').slideUp("slow" , function(){});
    $('#shopup_filter').css('display' , 'none');
    $('#discover_filter').css('display' , 'contents');
    // $('#discover').slideDown("slow", function() {});
    $('.cate-silders').css('display' , 'none');
    $('#playlist').css('display' , 'block');


});

var page = 'store';
    $('#posts_from').change(function(){
        var type = $('#posts_from').val();
        products(type , 'highlight');
    });
    $('#playlistposts_from').change(function(){
        var type = $('#playlistposts_from').val();
        products(type , 'playlist');
    });
            products= function (type , page){

                $.ajax({
                url:'<?php echo base_url('main/getProducts'); ?>',
                type: 'GET',
                dataType:'json',
                data:{
                   type:type,

                },
                success:function(data){
                    if(data.datas !=null){
                       
                    view = ``;
                        for(var i =0;i<data.datas.length;i++){
                            if(page == 'highlight'){
                            view += `
                                <li>
                                    <input class="input" value="`+data.datas[i].PostId+`" name="post_ids[]" type="checkbox" id="myCheckbox_`+data.datas[i].PostId+`" />
                                    <label class="label" for="myCheckbox_`+data.datas[i].PostId+`">
                                    <img src="`+data.datas[i].images[0].MediaThumbPath+`" />
                                    <span>`+data.datas[i].Title.substr(0, 10)+` </span>
                                    </label>
                                </li>
                               
                            `;
                            }else{
                                view += `
                                <li>
                                    <input class="input" value="`+data.datas[i].PostId+`" name="playlistpost_ids[]" type="checkbox" id="myCheckbox_`+data.datas[i].PostId+`" />
                                    <label class="label" for="myCheckbox_`+data.datas[i].PostId+`">
                                    <img src="`+data.datas[i].images[0].MediaThumbPath+`" />
                                    <span>`+data.datas[i].Title.substr(0, 10)+` </span>
                                    </label>
                                </li>
                               
                            `;
                            }
                                }
                    view+=``;
                    if(page == 'highlight'){
                        $(".post_ul").empty();
                        $(".post_ul").html(view);
                    }else{
                        $(".playlistpost_ul").empty();
                        $(".playlistpost_ul").html(view);
                    }
                    }
                    
                }
            });
            };
            var userNavbar = '';
            catsbyUser= function (subcat_id = '', parent_id = '', isSpecial = '', page_name = ''){
                localStorage.setItem('SubCategoryId', subcat_id);

                    if (parent_id == '') {
                        localStorage.setItem('MainCategoryId', subcat_id);
                        localStorage.setItem('MainCategoryId', subcat_id);
                        parent_id = localStorage.getItem('MainCategoryId');
                    }
                loadUserProducts(subcat_id,parent_id,isSpecial, page_name );
                $.ajax({
                url:'<?php echo base_url('main/getCategories'); ?>/'+parent_id+'/'+subcat_id,
                type: 'GET',
                dataType:'json',
                data:{
                    isSpecial: isSpecial,
                    page_name: page_name,
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
                                <a class="nav-link" onclick="catsbyUser('` + data.subcats[i].Id + `','` + parent_id + `', '` + data.subcats[i].IsSpecialCat + `' , 'store')" data-id="`+data.subcats[i].Id+`" id="motord-tab" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true" style="width:90px; height:120px">
                                        <img src="`+data.subcats[i].CategoryImage+`" alt="icomn" style="height:55px; width:55px; object-fit: cover; border-radius: 50%;">
                                            <p> `+data.subcats[i].Name+`</p>
                                    </a>
                                </li>
                            `;
                                }
                    view+=`</ul>`;
                 
                    $(".profileproducts").empty();
                    $(".profileproducts").html(view);                    
                }
            });
            };


            
            loadUserProducts = function (catid ='' , p_id = '', isSpecial = '', page_name = ''){
                $('.loader_overlay').css('display', 'block');
                // $('#shop_up').css("display",'block');
                    // closeNav();
                    $.ajax({
                    url:'<?php echo base_url('user/getProductsbyUserCtaegory'); ?>'+'/'+catid+'/'+p_id,
                    type: 'GET',
                    dataType:'json',
                    data:{
                        nav:navbar,
                        sortings: sortings,
                        isSpecial: isSpecial,
                        page_name: page_name,
                        user_id : <?=$user_details->Id?>,
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
                                                <li class="nav-item navbar_filter_profile ">
                                                    <a style="cursor: pointer;" class="nav-link  `+active+`" data-type="`+data.navbar[i].Type+`">`+data.navbar[i].Title+`</a>
                                                </li>
                                            `;
                                    }
                                
                        // $(".Navbar_Tabss").empty();
                        // $(".Navbar_Tabss").html(view);
                        }
                        // $(".navbar_filter_profile" ).click(function() {
                        //         userNavbar = $(this).data("type");
                        //         $(this).addClass('active');
                        //         catsbyUser(catid);
                        // });
                        if(data.datas != null){
                        view = ``;
                            for(var i =0;i<data.datas.length;i++){
                                var display = '';
                                var heightfordiv = '';
                                var km_last = '';
                                if (data.datas[i].PostType == 'postup' || page_name == 'discover') {
                                    display = "style='display:none'";
                                    km_last = '';
                                } else {
                                    heightfordiv = "style='height: 286px !important'";
                                    km_last = 'style="position: absolute; bottom: 87px;right: 2px;"';
                                }
                                view += `
                                <div class="product-box col-sm-4" data-aos="fade-up">
                                    <div class="product-img" ` + heightfordiv + `>
                                        <a href="<?= base_url('product'); ?>/`+data.datas[i].PostId+`#postid`+data.datas[i].PostId+`">`;
                                       
                                            view+=`<img src="`+data.datas[i].images[0].MediaThumbPath+`" alt="" class="img-fluid" style="width: 360px;height:198px; object-fit: cover;">
                                        `; 
                                        view+=`</a>
                                        <div class="rating">
                                            <div class="ratng-block bottom-left" ` + display + `>
                                                    `;
                                                    if (data.datas[i].Rating > 0) {
                                                       for (p = 1; p <= 5; p++) {
                                                            if (p <= data.datas[i].Rating) {
                                                          view+=`  <span>
                                                                <span class="fa fa-star checked pr-1"></span>
                                                            </span>`;
                                                             } else{
                                                            view+=`
                                                            <span>
                                                                <span class="fa fa-star pr-1"></span>
                                                            </span>`;
                                                             }
                                                            }
                                                        }
                                            view+=`</div>
                                            <div class="km-block last" ` + km_last + `>
                                                <span>
                                                    `+data.datas[i].Distance+`
                                                </span>
                                            </div>
                                        </div>`;
                                        for(var j =0;j<data.datas[i].additionalinfo.length;j++){
                                            if(data.datas[i].additionalinfo[j].FieldName == 'product_offer'){
                                                view+=`
                                                    <p> <del style="opacity: 0.5;">
                                                    `+data.datas[i].Currency+` `+data.datas[i].MRP+`
                                                        </del><span class="badge bg-warning text-light mt-1" style="float: right !important;">`+data.datas[i].additionalinfo[j].FieldValue+`%</span></p>
                                                `; } }
                                                view+=`
                                            <div>
                                                `+data.datas[i].Currency+` `+data.datas[i].SellPrice+`
                                            </div>
                                            <div>
                                                <p>`+data.datas[i].Title.substr(0,19)+`</p>
                                            </div>
                                            `; if (data.datas[i].MRP > data.datas[i].SellPrice) {
                                                view+=
                                                `
                                                <p><small> `+data.datas[i].ShortDescription.substr(0,10)+`</small></p>
                                          `; }else{
                                          view+=`
                                                <p><small> `+data.datas[i].ShortDescription.substr(0,10)+`</small></p>
                                            `; }
                                            view+=`
                                    </div>
                                </div>
                                `;
                                    }
                                $(".home-product").empty();
                                $(".home-product").html(view);
                                $(".profileproducts").css('display', 'block');
                                $(".home-product").css('margin-top', '0px');
                                } else{
                                $(".home-product").empty();
                                // $(".products").css('display', 'none');
                                // $(".hash_tags").css('display', 'none');
                                localStorage.setItem('SubCategoryId', '');
                                localStorage.setItem('MainCategoryId', '');
                                $(".home-product").html('No Post Found');
                                $(".home-product").css('margin-top', '19px');

                                }
                                // $('.filters_title').css('display' , 'none');
                                $('.loader_overlay').css('display', 'none');
                    }
                   
                });
                };

                $('.slider-blocks').css('height' , '150px');

                $(".navbar_filter_profile" ).click(function() {
                    navbar = $(this).data("type");
                    $('.navbar_filter_profile').removeClass("active");
                    $(this).addClass("active");
                    catsbyUser(localStorage.getItem('SubCategoryId'), localStorage.getItem('MainCategoryId'), '', page);
            });
</script>
<!-- <option value="`+data.datas[i].PostId+`">`+data.datas[i].Title+`</option> <img src="`+data.datas[i].images[0].MediaThumbPath+`"
 style="width:15px;height:15px; float:right"> -->