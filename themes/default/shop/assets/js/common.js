$(window).bind('scroll', function() {
    var st = $('.header-top').height();
    if ($(window).scrollTop() > st) {
        $('.header-top').addClass('header-fixed');
        $('#main_body_div').css('margin-top', '15%');
    } else {
        $('.header-top').removeClass('header-fixed');
        $('#main_body_div').css('margin-top', '0px');

    }
});
var sortings = '';
localStorage.removeItem('sortings');
localStorage.removeItem('navFilter');

var url = window.location.pathname.split('/').slice(-2)[0];
var urlhome = window.location.pathname.split('/').slice(-1)[0];
if (url != 'product') {
    localStorage.setItem('SubCategoryId', '');
    localStorage.setItem('MainCategoryId', '');
}
$('.c-list ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});





$("#heart").click(function() {
    $(this).toggleClass('fas fa-heart');
    $(this).toggleClass('far fa-heart');
});


$(document).ready(function() {
    var li = $(".cate-silder li.nav-item a ");
    $(".cate-silder li.nav-item a ").click(function() {
        li.removeClass('active');
    });
});
$(document).ready(function() {
    var li = $(".mene-slider .nav-item a ");
    $(".mene-slider .nav-item a ").click(function() {
        li.removeClass('active');
    });

    $('.mene-slider').slick('refresh');
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function() {
    $($(this).attr('href')).find('.slider').slick({
        dots: true,
        arrows: true
    })
}).first().trigger('shown.bs.tab');

$(document).ready(function() {
    $('.menu-toggle').click(function() {
        $('nav').toggleClass('active'), $(this).toggleClass('change')
    })
});


function openNav() {
    document.getElementById("mySidenav").style.width = "360px";
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("mySidenav").style.opacity = 1;
}

function openSettingsTab() {
    document.getElementById("settings_tabs").style.display = "block";
    document.getElementById("settings_tabs").style.position = "fixed";
    document.getElementById("settings_tabs").style.opacity = 1;
}

function closeSettingsTab() {
    document.getElementById("settings_tabs").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.display = "none";
}


$(".header-top-icon .dropdown-toggle ").click(function() {
    $('.overlays').toggleClass('active');
});

$(".overlays ").click(function() {
    $('.overlays').toggleClass('');
});

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();


// localStorage.removeItem('MainCategoryId');
// localStorage.removeItem('MainSideCategoryId');
// localStorage.removeItem('navFilter');
var view = "";
var cat_id = '';
var active = '';
var navbar = '';
var pagename = '';
var urlsegment = window.location.pathname.split("/").pop();
//  if(urlsegment == 'u-shop-up'){
//  }
//  else{
//      pagename = 'discover';
//  }

/////////////////////////////////////////////////

$(".sortings").click(function() {
    sortings = $(this).data("keyvalue");
    filtertype = $(this).data("filtertype");
    localStorage.setItem('sortings', sortings);
    cats(localStorage.getItem('SubCategoryId'), localStorage.getItem('MainCategoryId'), '', filtertype);
    // $('#discover_filter').css('display', 'none');
    // $('#shopup_filter').css('display', 'block');
    $('.sotingmodal').modal('toggle');
});




cats = function(subcat_id = '', parent_id = '', isSpecial = '', page_name = '') {
    // $('#discover_filter').css('display', 'none');
    // $('#shopup_filter').css('display', 'block');
    $('#pills-postup-tab').css('display', 'none');
    $('.loader_overlay').css('display', 'block');
    localStorage.setItem('SubCategoryId', subcat_id);

    if (parent_id == '') {
        localStorage.setItem('MainCategoryId', subcat_id);
        localStorage.setItem('MainCategoryId', subcat_id);
        parent_id = localStorage.getItem('MainCategoryId');
    }

    loadProducts(subcat_id, parent_id, isSpecial, page_name);
    $.ajax({
        url: base_url + 'getCategories/' + parent_id + '/' + subcat_id,
        type: 'GET',
        dataType: 'json',
        data: {
            nav: navbar,
            isSpecial: isSpecial,
            page_name: page_name,
        },
        success: function(data) {
            if (data.subcats == null) {
                return;
            }
            view = ` <ul class="nav nav-tabs slider cate-silders same-tab" id="myTab" role="tablist" data-aos="fade-up" style="overflow: auto;overflow-y: hidden;">`;
            for (var i = 0; i < data.subcats.length; i++) {
                view += `
                              <li class="nav-item">
                              <a class="nav-link" onclick="cats('` + data.subcats[i].Id + `','` + parent_id + `', '` + data.subcats[i].IsSpecialCat + `' , 'store')"  data-id="` + data.subcats[i].Id + `" id="motord-tab" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true" style="width:90px; height:131px">
                                      <img src="` + data.subcats[i].CategoryImage + `" alt="icomn" style="height:70px; width:70px; object-fit: cover; border-radius: 50%;">
                                          <p> ` + data.subcats[i].Name + `</p>
                                  </a>
                              </li>
                          `;
            }
            view += `</ul>`;

            $(".products").empty();
            $(".products").html(view);
            $('.loader_overlay').css('display', 'none');
        }
    });
};
loadProducts = function(catid = '', p_id = '', isSpecial = '', page_name = '', hashtag_id = '') {
    var productUrl = "getProductsbyCtaegory/" + catid + '/' + p_id;

    if (hashtag_id != '') {
        navbar = '';
        productUrl = "getProductsbyHashtags/" + hashtag_id;
    }
    $('.loader_overlay').css('display', 'block');
    closeNav();
    $.ajax({
        url: base_url + productUrl,
        type: 'GET',
        dataType: 'json',
        data: {
            nav: navbar,
            sortings: sortings,
            isSpecial: isSpecial,
            page_name: page_name,
        },
        success: function(data) {
            if (data.navbar != null) {
                view = ``;
                for (var i = 0; i < data.navbar.length; i++) {
                    if (data.navbar[i].Type == navbar) {
                        active = 'active';
                    } else {
                        active = '';
                    }
                    view += `        <li class="nav-item">
                                                  <a style="cursor: pointer;" class="nav-link navbar_type ` + active + `" data-type="` + data.navbar[i].Type + `">` + data.navbar[i].Title + `</a>
                                              </li>
                                          `;
                }

                // $(".Navbar_Tabss").empty();
                // $(".Navbar_Tabss").html(view);
            }
            // cats(catid, p_id);
            // $(".navbar_type").click(function() {
            //     navbar = $(this).data("type");
            //     $(this).addClass('active');
            //     cats(catid, p_id);
            // });
            if (data.datas != null) {
                view = ``;
                for (var p = 0; p < data.datas.length; p++) {
                    var display = '';
                    var heightfordiv = '';
                    var km_last = '';
                    if (data.datas[p].PostType == 'postup' || page_name == 'discover') {
                        display = "style='display:none'";
                        km_last = '';
                    } else {
                        heightfordiv = "style='height: 286px !important'";
                        km_last = 'style="position: absolute; bottom: 87px;right: 2px;"';
                    }
                    view += `
                              <div class="product-box col-sm-4" data-aos="fade-up">
                                  <div class="product-img" ` + heightfordiv + `>
                                      <a href="` + base_url + `product/` + data.datas[p].PostId + `#postid` + data.datas[p].PostId + `">`;

                    view += `<img src="` + data.datas[p].images[0].MediaThumbPath + `" alt="" class="img-fluid" style="width: 360px;height:198px; object-fit: cover;">
                                                            `;
                    view += `</a>
                                        <div>
                                          <div class="rating">
                                             <div class="ratng-block bottom-left" ` + display + `>
                                                  `;
                    if (data.datas[p].Rating > 0) {
                        for (i = 1; i <= 5; i++) {
                            if (i <= data.datas[p].Rating) {
                                view += `  <span>
                                                              <span class="fa fa-star checked pr-1"></span>
                                                          </span>`;
                            } else {
                                view += `
                                                          <span>
                                                              <span class="fa fa-star pr-1"></span>
                                                          </span>`;
                            }
                        }
                    }
                    view += `</div>
                                          <div class="km-block last mobile_last" ` + km_last + `>
                                              <span>
                                                  ` + data.datas[p].Distance + `
                                              </span>
                                          </div>
                                      </div>`;
                    for (var j = 0; j < data.datas[p].additionalinfo.length; j++) {
                        if (data.datas[p].additionalinfo[j].FieldName == 'product_offer') {
                            view += `
                                                  <p> <del style="opacity: 0.5;">
                                                  ` + data.datas[p].Currency + ` ` + data.datas[p].MRP + `
                                                      </del><span class="badge bg-warning text-light mt-1" style="float: right !important;">` + data.datas[p].additionalinfo[j].FieldValue + `%</span></p>
                                              `;
                        }
                    }
                    view += `
                                          <div>
                                              ` + data.datas[p].Currency + ` ` + data.datas[p].SellPrice + `
                                          </div>
                                          <div>
                                              <p>` + data.datas[p].Title.substr(0, 19) + `</p>
                                          </div>
                                          `;
                    if (data.datas[p].MRP > data.datas[p].SellPrice) {
                        view +=
                            `
                                              <p><small> ` + data.datas[p].ShortDescription.substr(0, 10) + `</small></p>
                                        `;
                    } else {
                        view += `
                                              <p><small> ` + data.datas[p].ShortDescription.substr(0, 10) + `</small></p>
                                          `;
                    }
                    view += `       </div>
                                  </div>
                              </div>
                              `;
                }
                $(".home-product").empty();
                $(".home-product").html(view);
                $(".products").css('display', 'block');
                $(".home-product").css('margin-top', '0px');
            } else {
                $(".home-product").empty();
                // $(".products").css('display', 'none');
                // $(".hash_tags").css('display', 'none');
                localStorage.setItem('SubCategoryId', '');
                localStorage.setItem('MainCategoryId', '');
                $(".home-product").html('No Post Found');
                $(".home-product").css('margin-top', '19px');
            }
            $('.loader_overlay').css('display', 'none');
            $('.discover_filter').css('display', 'none');
            $('.shopup_filter').css('display', 'none');




        }
    });
};

$(".navbar_type").click(function() {

    var page = 'store';
    navbar = $(this).data("type");
    if (navbar == 'postup') {
        $('.hash_tags').css('display', 'block');
        $('.cats_js').css('display', 'none');
        page = 'discover';
    } else {
        $('.hash_tags').css('display', 'none');
        $('.cats_js').css('display', 'block');
    }
    $('.navbar_type').removeClass("active");
    $(this).addClass("active");
    var url = window.location.pathname.split('/').slice(-2)[0];
    var urlhome = window.location.pathname.split('/').slice(-1)[0];
    if (urlhome == 'writeup') {
        catsWriteUp();
        return;
    }
    if (url == 'product' || url == 'home') {
        $('.loader_overlay').css('display', 'block');
        $.ajax({
            url: base_url + "products",
            type: 'GET',
            dataType: 'json',
            data: {
                nav: navbar,
            },
            success: function(data) {
                if (data.datas != null) {
                    view = ``;
                    for (var i = 0; i < data.datas.length; i++) {
                        view += `
                                                      <div class="product-list product-list-s" id="` + data.datas[i].PostId + `">
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
                                                                                      <div class="product-list-top">
                                                                                          <div class="product-list-top-left">
                                                                                              <div class="product-list-top-left-img">
                                                                                                  <a href="#">
                                                                                                      <img src="` + data.datas[i].UserImage + `" alt="" class="img-fluid pt-1">
                                                                                                  </a>
                                                                                              </div>
                                                                                              <ul>
                                                                                                  <li style="max-width: 250px;">
                                                                                                      <h5>` + data.datas[i].Title.substr(0, 31) + `....
                                                                                                      </h5>
                                                                                                      <p>` + data.datas[i].ProfileName + `</p>
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
                                                                                                        <ul class="dropdown_copy">
                                                                                                          <li><img src="` + assets + `images/New Icon/store.svg" class="img-fluid sto-icon" alt=""> Add to Favorite store</li>
                                                                                                          <li><img src="` + assets + `images/New Icon/ic_user_add_multiple.svg" class="img-fluid sto-icon" style="height: 13px;margin-right: 8px;"> Follow Profile</li>
                                                                                                          <li><img src="` + assets + `images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Profile</li>
                                                                                                          <li><img src="` + assets + `images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Profile</li>
                                                                                                          <li onclick="copyToClipboard('#ProfileDeepLinkUrl` + data.datas[i].PostId + `')"><img src="` + assets + `images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt="" > Copy Profile Url</li>
                                                                                                          <li><img src="` + assets + `images/New Icon/ic_block_account.svg" class="img-fluid sto-icon" alt=""> Block Profile</li>
                                                                                                          <li><img src="` + assets + `images/New Icon/ic_about_this_account.svg" class="img-fluid sto-icon" alt=""> About This Account</li>
                                                                                                          <li><img src="` + assets + `images/New Icon/ic_report_profile.svg" class="img-fluid sto-icon" alt=""> Report Profile</li>
                                                                                                        </ul>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="product-center">
                                                                                          <div class="product-video">
                                                                                              <a href="#">
                                                                                                  <img src="` + assets + `images/Icons/video1.png" alt="video">
                                                                                              </a>
                                                                                          </div>
                                                                                          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                                                              <div class="product-imgs single-product">`;
                        if (data.datas[i].images != '') {
                            // $.each(data.datas[i].images, function( key, value ) {

                            //         });
                            for (var j = 0; j < data.datas[i].images.length; j++) {
                                view += `<a href="#">`;
                                if (data.datas[i].images[j].MediaType == 'image') {
                                    view += ` <img class="d-block w-100" style=" width:400px; object-fit: cover;" src="` + data.datas[i].images[j].MediaPath + `">`;
                                }
                                if (data.datas[i].images[j].MediaType == 'video') {
                                    view += `
                                                                                                              <video autoplay loop muted controls >
                                                                                                                  <source src="` + data.datas[i].images[j].MediaPath + `" type="video/mp4">
                                                                                                              </video>
                                                                                                              `;
                                }
                                view += `</a>
                                                                                                     `;
                            }
                        }
                        view += `
                                                                                              </div>
                                                                                          </div>
                                                                                          <div class="product-view">
                                                                                              <div class="product-view-block">
                                                                                                  <ul>
                                                                                                  <li class="tag_white">
                                                                                                          <a href="#"><img src="` + assets + `images/tag white.png" alt="ico"></a>
                                                                                                      </li>
                                                                                                      <li>
                                                                                                          <a href="#"><img src="` + assets + `images/video_icon.png" alt="ico" style="filter: invert(100%);"></a>
                                                                                                      </li>
                                                                                                      <li>
                                                                                                          <a href="#">
                                                                                                              <p style=" filter: opacity(90%);">Views
                                                                                                                  <br>` + data.datas[i].ViewCount + `
                                                                                                              </p>
                                                                                                          </a>
                                                                                                      </li>
                                                                                                  </ul>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="product-bottom">
                                                                                          <div class="pro-bottom">
                                                                                              <ul style="max-width: 150px;">
                                                                                                  <li>
                                                                                                      <p class="hert-icon"></p>
                                                                                                      <span>` + data.datas[i].LikeCount + `</span>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                      <a href="#" class="copy-icon"> <img src="` + assets + `images/Component 122.png" alt="icon"></a>
                                                                                                      <span>` + data.datas[i].ChainCount + `</span>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                      <a href="#"><i class="far fa-bookmark"></i></a>
                                                                                                      <span>` + data.datas[i].BookMarkCount + `</span>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                      <p class="writeup-icon"></p>
                                                                                                      <span>` + data.datas[i].CommentCount + `</span>
                                                                                                  </li>
                                                                                              </ul>
                                                                                              <div class="icon-menu share-icon " style="max-width: 120px;">
                                                                                                  <div class="ratng-block">`;

                        for (var a = 1; a <= 5; a++) {
                            if (i <= data.datas[i].Rating) {
                                view += `<span>
                                                                                                                  <span class="fa fa-star checked pr-1"></span>
                                                                                                              </span>`;
                            } else {
                                view += `<span>
                                                                                                                  <span class="fa fa-star pr-1"></span>
                                                                                                              </span>`;
                            }
                        }
                        view += `</div>
                                                                                                  <div class="dropdown">
                                                                                                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                          <i class="fas fa-chevron-down"></i>
                                                                                                      </button>
                                                                                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                                        <ul class="dropdown_copy">
                                                                                                          <li><img src="` + assets + `images/New Icon/ic_sharei.svg" class="img-fluid sto-icon" alt=""> Share Post</li>
                                                                                                          <li><img src="` + assets + `images/New Icon/icons8-qr-code-64.png" class="img-fluid sto-icon" alt=""> Scan Post</li>
                                                                                                          <li onclick="copyToClipboard('#PostURL` + data.datas[i].PostId + `')"><img src="` + assets + `images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post URL</li>
                                                                                                          <li onclick="copyToClipboard('#PostID` + data.datas[i].PostId + `')"><img src="` + assets + `images/New Icon/ic_copy.svg" class="img-fluid sto-icon" alt=""> Copy Post ID</li>
                                                                                                         </ul>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                          <div class="product-bottom-top">
                                                                                             `;
                        for (var k = 0; k < data.datas[i].additionalinfo.length; k++) {
                            if (data.datas[i].additionalinfo.FieldName == 'product_offer') {
                                view += ` <div class="pro-sale-price">
                                                                                                          <p> ` + data.datas[i].Currency + ` ` + data.datas[i].MRP + `/-
                                                                                                          <span>` + data.datas[i].additionalinfo.FieldValue + `% Off</span>
                                                                                                          <div class="time-end">
                                                                                                           
                                                                                                          </div>
                                                                                                      </div>`;
                            }
                        }
                        view += `<div class="price-icon">
                                                                                                  <div class="sale-pric">
                                                                                                      <h6>` + data.datas[i].Currency + ` ` + data.datas[i].SellPrice + `/-</h6>
                                                                                                  </div>
                                                                                                  <div class="dliver-icon">
                                                                                                      <ul>`;
                        if (data.datas[i].IsOrderToDonate == 1) {
                            view += `<li>
                                                                                                                          <img src="` + assets + `images/Icons/donate 2.jpg" alt="img"  class="img-fluid">
                                                                                                                      </li>`;
                        }
                        if (data.datas[i].IsCharity == 1) {
                            view += `<li>
                                                                                                                      <img src="` + assets + `images/charity.jpg" alt="img" class="img-fluid">
                                                                                                                      </li>`;
                        }
                        $.each(data.datas[i].additionalinfo, function(index) {
                            if (data.datas[i].additionalinfo[index].FieldName == 'twenty_four_service' && data.datas[i].additionalinfo[index].FieldValue == 1) {
                                view += ` 
                                                                                                                          <li>
                                                                                                                              <img src="` + assets + `images/Icons/24-7 icon.png" alt="img" class="img-fluid">
                                                                                                                          </li>`;
                            }
                            if (data.datas[i].additionalinfo[index].FieldName == 'home_delivery_service' && data.datas[i].additionalinfo[index].FieldValue == 1) {
                                view += `
                                                                                                                          <li>
                                                                                                                              <img src="` + assets + `images/Icons/delivery-icon-black .jpg" alt="img" class="img-fluid">
                                                                                                                          </li>
                                                                                                                      `;
                            }
                        });

                        view += `</ul>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <div class="pro-price-loca">
                                                                                                  <div class="pro-price-loca-left">
                                                                                                      <ul>
                                                                                                          <li>
                                                                                                              <p ><a style="color: white;" href="http://maps.google.com/maps">DRIVE UP <i class="fas fa-location-arrow"></i></a></p>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                              <p>` + data.datas[i].Distance + `</p>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                              <p>` + data.datas[i].EstimatedReachTime + `</p>
                                                                                                          </li>
                                                                                                      </ul>
                                                                                                  </div>
                                                                                                  <div class="pro-price-loca-right">
                                                                                                      <div class="product-call">`;
                        var callup = '';
                        if (data.datas[i].PostType == 'callup') {
                            callup = 'tel:' + data.datas[i].StorePhone;
                        } else {
                            callup = '#';
                        }
                        view += `<a href="` + callup + `">
                                                                                                      ` + data.datas[i].PostType.toUpperCase().replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim() + `
                                                                                                    </a>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                          <div class="loca">
                                                                                              <a href="#"> <i class="fas fa-map-marker-alt"></i> ` + data.datas[i].Location + `</a>
                                                                                          </div>
                                                                                          `;
                        if (data.datas[i].audios != "") {
                            view += `<div class="audio-play">
                                                                                              <audio preload="auto" src="` + data.datas[i].audios[0].MediaNormalPath + `"></audio>
                                                                                          </div>
                                                                                          `;
                        }
                        view += `<div class="product-bottom-bottom">
                                                                                                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                                                  <li class="nav-item">
                                                                                                      <a class="nav-link active" id="motord-tab" data-toggle="tab" href="#motord" role="tab" aria-controls="motord" aria-selected="true">

                                                                                                          <p>Product Details</p>
                                                                                                      </a>
                                                                                                  </li>
                                                                                                  <li class="nav-item">
                                                                                                      <a class="nav-link" id="homes-tab" data-toggle="tab" href="#homes" role="tab" aria-controls="homes" aria-selected="false">
                                                                                                          <p>Specification</p>
                                                                                                      </a>
                                                                                                  </li>
                                                                                              </ul>

                                                                                                  <div class="tab-pane fade show active" id="motord" role="tabpanel" aria-labelledby="motord-tab">
                                                                                                    <a href="` + base_url + `productDetail/` + data.datas[i].PostId + `">    
                                                                                                            <h5>` + data.datas[i].Title + `</h5>
                                                                                                            <p>` + data.datas[i].ShortDescription.substr(0, 160) + `</p>
                                                                                                     </a>
                                                                                                  </div>
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
                                                          <input id="ProfileDeepLinkUrl` + data.datas[i].PostId + `" type="hidden" value="` + data.datas[i].ProfileDeepLinkUrl + `">
                                                          <input id="PostID` + data.datas[i].PostId + `" type="hidden" value="` + data.datas[i].PostId + `">
                                                          <input id="PostURL` + data.datas[i].PostId + `" type="hidden" value="` + data.datas[i].DeepLinkUrl + `">
                                                      `;
                    }
                    $("#pro_list").empty();
                    $("#pro_list").html(view);
                    $('.loader_overlay').css('display', 'none');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    $('.single-product').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        // autoplay: true,
                        // autoplaySpeed: 2000,
                        arrows: true,
                        infinite: true,
                    });
                } else {
                    $("#pro_list").empty();
                    $("#pro_list").html('No Post Found');
                }

            }
        });
    } else {
        cats(localStorage.getItem('SubCategoryId'), localStorage.getItem('MainCategoryId'), '', page);
    }
});





////////Side Filter for Second Level Categories
sideCats = function(subcat_id = '', parent_id = '') {
    localStorage.setItem('MainSideCategoryId', subcat_id);
    parentS_id = localStorage.getItem('MainSideCategoryId');
    navbar = localStorage.getItem('navFilter');
    // loadProducts(subcat_id,parent_id);
    $.ajax({
        url: base_url + "/main/getSideCategories/" + parent_id + '/' + subcat_id,
        type: 'GET',
        dataType: 'json',
        data: {
            nav: navbar,
            page_name: 'store',

        },
        success: function(data) {
            if (data.subcats != "") {
                view = `
                               <div class="dropdown">
                  `;
                for (var i = 0; i < data.subcats.length; i++) {
                    view += `
                                          <button onclick="sideSubCats('` + parentS_id + `' , '` + data.subcats[i].Id + `')" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <img src="` + data.subcats[i].CategoryThumbImage + `" alt=""> ` + data.subcats[i].Name + `
                                          </button>
                                          
                                          <div class="dropdown-menu drop_list" aria-labelledby="dropdownMenu" id="dropdownMenu">
                                          </div>`;
                }
                view += ` 
                     </div>`;
                $("#SideTabCats").empty();
                $("#SideTabCats").addClass('active');
                $("#SideTabCats").html(view);
            } else {
                loadProducts(parent_id, subcat_id);
                closeNav();
                // $('#dropdownMenu').removeClass('dropdown-toggle');
            }
        }
    });
};
sideSubCats = function(subcat_id = '', parent_id = '') {

    parentS_id = localStorage.getItem('MainSideCategoryId');
    navbar = localStorage.getItem('navFilter');
    // loadProducts(subcat_id,parent_id);
    $.ajax({
        url: base_url + "/main/getSideCategories/" + subcat_id + '/' + parent_id,
        type: 'GET',
        dataType: 'json',
        data: {
            nav: navbar,

        },
        success: function(data) {
            if (data.subcats != null) {
                view = `<ul>
                      `;
                for (var i = 0; i < data.subcats.length; i++) {
                    view += `           <li>
                                                          <a href="#" onclick="loadProducts('` + data.subcats[i].Id + `' , '` + parentS_id + `')">
                                                              <img src="` + data.subcats[i].CategoryThumbImage + `" alt="">
                                                              <span>` + data.subcats[i].Name + `</span>
                                                          </a>
                                                      </li>
                                                  `;
                }
                view += ` 
                                  </ul>
                              `;
                $(".drop_list").empty();
                $(".drop_list").html(view);
            } else {
                loadProducts(parent_id, subcat_id);
                closeNav();
                // $('#dropdownMenu').removeClass('dropdown-toggle');
            }
        }
    });
};

filterNav = function(type) {
    view = ``;
    $('.back_link').removeClass('active');
    $('#' + type).addClass('active');
    localStorage.removeItem('navFilter');
    localStorage.setItem('navFilter', type);
    // parent_id =  localStorage.getItem('MainSideCategoryId', type);

    $.ajax({
        url: base_url + "main/getCategories",
        type: 'GET',
        dataType: 'json',
        data: {
            nav: type,
            page_name: 'store',
        },
        success: function(data) {
            if (data.subcats != null) {
                view = ` <ul class="nav nav-tabs tabs-left">
                              `;
                for (var i = 0; i < data.subcats.length; i++) {
                    view += `
                                              <li>
                                                  <a href="#SideTabCats" data-toggle="tab"  id="SideClick" data-id="` + data.subcats[i].Id + `" onclick="sideCats(` + data.subcats[i].Id + ` , '')">
                                                      <img src="` + data.subcats[i].CategoryThumbImage + `" alt="icomn" style="height:40px; width:40px; object-fit: cover;border-radius: 50%;">
                                                      <p>` + data.subcats[i].Name + `</p>
                                                  </a>
                                              </li>`;
                }
                view += ` 
                              </ul>`;
                $(".side_cats_filter").empty();
                $(".side_cats_filter").html(view);
            } else {
                $(".side_cats_filter").empty();
                $(".side_cats_filter").html(view);
            }
        }
    });
};
var height = $(window).height();
var wdith = $(window).width();

$('.slider-blocks').css('height', '250px');
if (wdith < 575) {
    $('.header-benner').css('width', wdith - 10);
    $('.filters_title').css('width', wdith - 10);
    $('.product-home').css('max-width', wdith - 10);
    $('.banner-block').css('max-width', wdith - 10);
    $('.product-list-box').css('max-width', wdith - 10);
    $('.main-category-block').css('max-width', wdith - 10);
    $('.cats_js').css('max-width', wdith - 10);
    $('.cats_js').css('overflow-x', 'auto');
    $('.slider-blocks').css('height', '');
    $('.video_css').css('width', '130');
    $('.video_css').css('height', '150');
    $('.cats_js_data').removeAttr('data-aos');
    $('.write-up').css('max-width', wdith - 10);
    $('.profile_tab_content').css('max-width', wdith - 10);
}
setTimeout(function() {
    $('div.spanner').removeClass('show');
    $('div.overlay').removeClass('show');
}, 3000);
$('.rows').css('height', height - 85);
if (urlsegment != 'u-shop-up') {
    // $('.header-benner').css('display' , 'none');
    // $('.banner-titile').css('display' , 'none');
    // $('.cate-silders').css('display' , 'none');
}

$(document).mouseup(function(e) {
    var container = $("#settings_tabs");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});

WallPosts = function(catid, p_id = '') {
    $.ajax({
        url: base_url + 'user/getWallPostsbyFilter' + '/' + catid + '/' + p_id,
        type: 'GET',
        dataType: 'json',
        data: {
            nav: navbar,
        },
        success: function(data) {
            if (data.navbar != null) {
                view = ``;
                for (var i = 0; i < data.navbar.length; i++) {
                    if (data.navbar[i].Type == navbar) {
                        active = 'active';
                    } else {
                        active = '';
                    }
                    view += `    
                    
                        <li class="nav-item navbar_filter ">
                            <a style="cursor: pointer;" class="nav-link  ` + active + `" data-type="` + data.navbar[i].Type + `">` + data.navbar[i].Title + `</a>
                        </li>
                                `;
                }

                $(".Navbar_Tabss").empty();
                $(".Navbar_Tabss").html(view);
            }
            $(".navbar_filter").click(function() {
                userNavbar = $(this).data("type");
                $(this).addClass('active');
                catsWriteUp(catid);
            });
            if (data.datas != null) {
                view = ``;
                for (var i = 0; i < data.datas.length; i++) {

                    view += `
                    <div class="write-up-box" data-aos="fade-up">
                        <div class="write-up-box-top">
                            <div class="write-up-box-top-left">
                                <div class="product-list-top-left">
                                    <div class="sli-img">
                                        <div class="pink_border">
                                        <div class="green_border">
                                            <div class="blue_border">
                                                <img src="` + data.datas[i].UserThumbImage + `" alt="" class="img-fluid">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6>` + data.datas[i].Username + `</h6>
                                    <p>` + data.datas[i].AccountCategory + `</p>
                                    <span class="user_distance_details">` + data.datas[i].Distance + `</span>
                                    <span class="user_distance_details">` + data.datas[i].EstimatedReachTime + `</span>
                                </div>
                            </div>
                            <div class="write-up-box-top-rights">
                                <div class="write-title">
                                    <h6><p>` + data.datas[i].ProfileName + `</p> </h6>
                                    <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                                </div>`;
                    if (data.datas[i].IsFriend == 1) {
                        view += `<div class="fol friendsU"><a href="#"> U FriendS</a></div>`;
                    } else if (data.datas[i].IsFollowU == 1) {
                        view += `<div class="fol"><a href="#"> Follow U</a></div>`;
                    } else if (data.datas[i].IsUFollow == 1) {
                        view += `<div class="fol u-follow"><a href="#"> U Follow</a></div>`;
                    }

                    view += `<div class="ra-h">
                                                            <div class="rating">
                                                                <div class="ratng-block">`;
                    // if (data.datas[i].Rating) {
                    for (a = 1; a <= 5; a++) {

                        if (a <= data.datas[i].Rating) {
                            view += `<span class="fa fa-star checked"></span>`;
                        } else {
                            view += `<span class="fa fa-star"></span>`;
                        }
                    }
                    // }
                    view += ` </div>
                                                            </div>
                                                            <div class="shop-qwe">
                                                                <a href="#">` + data.datas[i].PostType.toUpperCase().replace(/^(.{4})(.{4})(.{4})(.*)$/, "   ") + `</a>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="write-price">
                                                    <div class="write-price-top">
                                                    <div class="sale-price"><p>
                                                    `;

                    for (var j = 0; j < data.datas[i].additionalinfo.length; j++) {
                        if (data.datas[i].additionalinfo[j].FieldName == 'currency') {
                            view += ` ` + data.datas[i].additionalinfo[j].FieldValue + ` ` + data.datas[i].SellPrice + ``;
                        }
                    }
                    view += `/-</p>
                                                        </div>
                                                        `;
                    if (data.datas[i].additionalinfo[0].FieldName == 'product_offer') {
                        view += ` <div class="product-price"><p>`;
                        for (var j = 0; j < data.datas[i].additionalinfo.length; j++) {
                            if (data.datas[i].additionalinfo[j].FieldName == 'currency') {
                                view += ` ` + data.datas[i].additionalinfo[j].FieldValue + ` ` + data.datas[i].MRP + ` `;
                            }
                        }
                        view += `/-</p>
                                                            <span>` + data.datas[i].additionalinfo[0].FieldValue + `% Off</span>
                                                        </div>`;
                    }

                    view += `</div>
                                                    <div class="write-price-bottom">
                                                        <h6>` + data.datas[i].Title.substr(0, 10) + `</h6>
                                                        <p>` + data.datas[i].ShortDescription.substr(0, 20) + `</p>
                                                    </div>
                                                    <div class="audio-play">`;
                    if (data.datas[i].audio != '') {
                        view += `
                                                            <audio controls>
                                                                <source src="` + data.datas[i].audio[0].MediaNormalPath + `" type="audio/mpeg">
                                                            </audio>`;
                    }
                    view += ` </div>
                                                </div>
                                                <div class="write-imgs">
                                                    <ul>

                                                        <li>`;
                    for (var k = 0; k < data.datas[i].images.length; k++) {
                        console.log();
                        view += ` <img src="` + data.datas[i].images[k].MediaPath + `" alt="img" class="img-fluid">
                                                                `;
                    }
                    view += `</li>
                                                    </ul>
                                                    <div class="upload-img" style="display:none">
                                                        <input type="file" id="real-file" hidden="hidden" />
                                                        <button type="button" id="custom-button"><img src="` + assets + `images/Icons/noun_Download_29074.png" alt=""></button>
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
                                                                <a href="#"><img src="` + assets + `images/Icons/icon-reply-grey.png" alt="" class="img-fluid replay-img"> <span>Reply</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="` + assets + `images/Icons/icon-reply-grey - Copy.png" alt="" class="img-fluid replay-img"> <span>` + data.datas[i].CommentCount + ` Replies</span></a>
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
            } else {
                $(".write-up-main").empty();
                $(".write-up-main").html('No WriteUp Found');
            }
        }
    });
};


$(".navbar_filter").click(function() {
    navbar = $(this).data("type");
    $('.navbar_filter').removeClass("active");
    $(this).addClass("active");
    WallPosts('');
});

function openWallNav() {
    document.getElementById("myWallSidenav").style.width = "360px";
    document.getElementById("myWallSidenav").style.display = "block";
    document.getElementById("myWallSidenav").style.opacity = 1;
}

function closeWallNav() {
    document.getElementById("myWallSidenav").style.width = "0";
    document.getElementById("myWallSidenav").style.display = "none";
}

function copyToClipboard(element) {
    alert(element);
    var copyText = $(element).val();
    navigator.clipboard.writeText(copyText);
    sa_alert("Success", "Copied!", 'success');
}

function copyTextToClipboard(element) {
    navigator.clipboard.writeText(element);
    sa_alert("Success", "Copied!", 'success');
}

$('.posts').multiSelect();
$(document).ready(function() {
    $('.loader_overlay').css('display', 'none');
});



$('#UtagUpCat').change(function() {

    var UtagUpCatId = $(this).val();
    var UtagUpCatName = $(this).find(':selected').data("slug");
    $.ajax({
        url: base_url + 'user/setUtagCat',
        type: 'GET',
        dataType: 'json',
        data: { UtagUpCatId: UtagUpCatId, UtagUpCatName: UtagUpCatName },
        success: function(data) {
            if (data.success == 1) {
                location.reload();
            }
        }
    });

});