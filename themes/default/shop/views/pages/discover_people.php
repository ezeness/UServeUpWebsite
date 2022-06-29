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
.map {
  height: 700px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
#map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
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
                                                <div class="card-body p-md-12 map col-sm-12" style="float:left;padding: 0;">
                                                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                                
                                                    <div id="map-canvas"></div>
                                                        
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <?php if(isset($Profiles)) {?>
                                                <h6><b>#STORES</b></h6>
                                                <?php 
                                                foreach ($Profiles as $key) {
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
                                                      </a>
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

        
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnNWl12-v7vu22thJBz1Aq7yNLJC_ZZRo&Map&v=weekly&libraries=places"
    ></script>

    <script>
    $('#pac-input').change(function(){
       var lat=  $('.MapLat').val();
        var lon = $('.MapLon').val();
        getReverseGeocodingData(lat , lon);
    });

    $(document).ready(function() {
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
    }      
});

function successFunction(position) 
{
    var lats = position.coords.latitude;
    var longs = position.coords.longitude;
    $('#latitude').val(lats);
    $('#longitude').val(longs);
    getReverseGeocodingData(lats , longs);
}

function errorFunction(position) 
{
    // alert('Error!');
}
function initialize() {

  var markers = [];
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: 12
  });


  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(25, 55),
      new google.maps.LatLng(25.276987, 55.296249));
  map.fitBounds(defaultBounds);

  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });
 
	var latInput = document.getElementsByName('latitude')[0];
	var lngInput = document.getElementsByName('longitude')[0];
	latInput.value = place.geometry.location.lat()
	lngInput.value = place.geometry.location.lng();
	google.maps.event.addListener(marker, 'dragend', function (e) {
                latInput.value = e.latLng.lat();
                lngInput.value = e.latLng.lng();
            });
      markers.push(marker);

      bounds.extend(place.geometry.location);
    }
// This is needed to set the zoom after fitbounds, 
google.maps.event.addListener(map, 'zoom_changed', function() {
    zoomChangeBoundsListener = 
        google.maps.event.addListener(map, 'bounds_changed', function(event) {
            if (this.getZoom() > 15 && this.initialZoom == true) {
                // Change max/min zoom here
                this.setZoom(15);
                this.initialZoom = false;
            }
        google.maps.event.removeListener(zoomChangeBoundsListener);
    });
});


map.initialZoom = true;
map.fitBounds(bounds);
  });
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });
  const profiles = [
    <?php 
        foreach ($Profiles as $key) {
        ?>
        ["<?=$key['UserFullName']?>", <?=$key['Address']['Latitude']?>, <?=$key['Address']['Longitude']?>],
    <?php 
        }
    ?>
    ];
        for (let i = 0; i < profiles.length; i++) {
        const beach = profiles[i];

        new google.maps.Marker({
        position: { lat: beach[1], lng: beach[2] },
        map,
        title: beach[0],
        zIndex: beach[3],
        });
  }
}

google.maps.event.addDomListener(window, 'load', initialize);


//////////////////////////////Get Addresss///////////////////
function getReverseGeocodingData(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    // This is making the Geocode request
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': latlng },  (results, status) =>{
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
            var address = (results[0].formatted_address);
            // console.log(address);
            $('.formatted_address').val(address);
        }
    });
}

</script>