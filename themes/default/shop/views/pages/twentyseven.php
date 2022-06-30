
<style>
ul {
    list-style: none;
}
.header-bottom{
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

<section class="store_top">
                <div class="product-list">
                        <div class="product-block single-block">
                            <div class="row">
                                    <div class="write-up">
                                        <!-- <div class="write-up-img">
                                            <img src="assets/images/Banners/download.png" alt="" class="img-fluid">
                                        </div> -->

                                        <div class="write-up-block wall-main">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">24/7 STORES</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ALL STORES</a>
                                                </li>
                                                <li class="nav-item write-plus">
                                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> 
                                                        STORES MAP
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <!-- <div class="sort">
                                                    <ul>
                                                        
                                                        <li>
                                                            <a href="#"><ion-icon name="funnel-outline"></ion-icon> FILTER</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img src="assets/images/Icons/icons8-sorting-30 (1).png" alt=""> Sort</a>
                                                        </li>
                                                        <li>
                                                            <div class="ser">
                                                                <form action="">
                                                                    <input type="text" class="searchTerm" placeholder="Search">
                                                                    <button type="submit" class="searchButton">
                                                                        <img src="assets/images/Icons/search-icon grey1.png" alt="" class="img-fluid">
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="filters">
                                                        
                                                        <div class="sort-list">
                                                        <?php 
                                                                if(isset($twentyfour)){
                                                                    foreach ($twentyfour as $key) {
                                                            ?>
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                    <div class="product-list-top-left" style="margin-top: 7px;">
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
                                                                            <h6><?=$key['StoreOwner']?></h6>
                                                                            <p><?=$key['AccountCategory']?></p>
                                                                            <span><?=$key['Address']?></span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                            
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
                                                                
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#"><?=$key['Distance']?></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"><?=$key['EstimatedReachTime']?></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } }  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div class="filters">
                                                        
                                                        <div class="sort-list">
                                                            <?php 
                                                                if(isset($allstories)){
                                                                    foreach ($allstories as $key) {
                                                            ?>
                                                                <a href="<?=base_url('profile/'.$key['Id'])?>">
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
                                                                                            <h6><?=$key['StoreOwner']?></h6>
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
                                                                    </a>
                                                            <?php } }  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                    <div class="filters">
                                                        
                                                        <div class="sort-list">
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="assets/images/Icons/Toyota-Concept-i-RIDE.jpg" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6>Store Name</h6>
                                                                            <p>Account Category</p>
                                                                            <span>Dubai, United Arab Emirates</span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="fol folloes">
                                                                            <a href="#">U Follow </a>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">5 KM</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">20 Mints</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="assets/images/Icons/Toyota-Concept-i-RIDE.jpg" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6>Store Name</h6>
                                                                            <p>Account Category</p>
                                                                            <span>Dubai, United Arab Emirates</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="fol folloes">
                                                                            <a href="#">U Follow </a>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">5 KM</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">20 Mints</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="assets/images/Icons/Toyota-Concept-i-RIDE.jpg" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6>Store Name</h6>
                                                                            <p>Account Category</p>
                                                                            <span>Dubai, United Arab Emirates</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="fol folloes">
                                                                            <a href="#">U Follow </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">5 KM</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">20 Mints</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="assets/images/Icons/Toyota-Concept-i-RIDE.jpg" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6>Store Name</h6>
                                                                            <p>Account Category</p>
                                                                            <span>Dubai, United Arab Emirates</span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="fol folloes">
                                                                            <a href="#">U Follow </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">5 KM</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">20 Mints</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="assets/images/Icons/Toyota-Concept-i-RIDE.jpg" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6>Store Name</h6>
                                                                            <p>Account Category</p>
                                                                            <span>Dubai, United Arab Emirates</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="fol folloes">
                                                                            <a href="#">U Follow </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">5 KM</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">20 Mints</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="assets/images/Icons/Toyota-Concept-i-RIDE.jpg" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6>Store Name</h6>
                                                                            <p>Account Category</p>
                                                                            <span>Dubai, United Arab Emirates</span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="fol folloes">
                                                                            <a href="#">U Follow </a>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">5 KM</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">20 Mints</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sort-list-box" data-aos="fade-left">
                                                                <div class="write-up-box-top">
                                                                    <div class="write-up-box-top-left">
                                                                        <div class="product-list-top-left">
                                                                            <div class="sli-img">
                                                                                <img src="assets/images/Icons/Toyota-Concept-i-RIDE.jpg" alt="" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-name">
                                                                            <h6>Store Name</h6>
                                                                            <p>Account Category</p>
                                                                            <span>Dubai, United Arab Emirates</span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="write-up-box-top-rights">
                                                                        <div class="fol folloes">
                                                                            <a href="#">U Follow </a>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="store-24">
                                                                    <div class="store-img">
                                                                        <ul>
                                                                            <li>
                                                                                <img src="assets/images/Icons/delivery-icon-grey .jpg" alt="" class="img-fluid">
                                                                            </li>
                                                                            <li>
                                                                                <img src="assets/images/Icons/24-7 icon.png" alt="" class="img-fluid">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="store-km">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">5 KM</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">20 Mints</a>
                                                                            </li>
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
                                </div>
                            </div>
                        </div>
            </section>