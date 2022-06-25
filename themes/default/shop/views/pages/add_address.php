<style>
	.header-bottom-block  {
display:none;
}
.hide_for_details{
/* display:none !important; */
}	  /* Set the size of the div element that contains the map */
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
      label{
        color: #393838;
      }
		  </style>
     
     <section class="section_top">
        <h4>Add Address</h4>
                    <div class="card-body p-md-6 map col-sm-6" style="float:left;padding: 0;">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                    
                        <div id="map-canvas"></div>
                            
                    </div>
                     <div class="card-body p-md-6 col-sm-6" style="float:left">
                     <div class="">
                <?= form_open('user/addAdress', 'class="AddAdress"'); ?>
                    <!-- <form  action="<?=base_url('user/addAdress')?>" method="POST" >  -->
                    <input type="hidden" name="latitude" class="MapLat" value="25.276987">
                    <input type="hidden" name="longitude" class="MapLon" value="55.296249">
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <div class="btn-group btn-group-md" role="group" aria-label="Basic example">
                                <input type="button" value="Home" onclick="appTitle('Home')" class="btn btn-secondary" style="margin: 10px;" placeholder="Home">
                                <input type="button" value="Work" onclick="appTitle('Work')" class="btn btn-secondary" style="margin: 10px;" placeholder="Work">
                                <input type="button" value="Other" onclick="appTitle('Other')" class="btn btn-secondary" style="margin: 10px;" placeholder="Other">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="login_email">Appartment Title</label>
                            <input type="text" id="appartment_title" class="form-control" name="appartment_title" required readonly />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="address_type">Address Type</label>
                            <select class="form-control" name="address_type">
                                     <?php 
                                        if($AddressTypes){
                                            foreach ($AddressTypes as $key) { ?>
                                             <option value="<?=$key->Name?>"><?=$key->Name?></option>
                                    <?php } }?>
                                </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="appartment">Appartment No</label>
                            <input type="text" id="appartment" class="form-control" name="appartment" required />
                        </div>
                        <div class="form-outline flex-fill mb-0" style="margin-left: 10px;">
                            <label class="form-label" for="floor">Floor</label>
                            <input type="text" id="floor" class="form-control" name="floor" required />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="building">Building Name</label>
                            <input type="text" id="building" class="form-control" name="building" required />
                        </div>
                        <div class="form-outline flex-fill mb-0" style="margin-left: 10px;">
                            <label class="form-label" for="street">Street</label>
                            <input type="text" id="street" class="form-control" name="street" required />
                        </div>
                    </div>
                    
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="country">Country</label>
                            <select class="form-control country" name="country">
                                    <?php 
                                        if($Countries){
                                            foreach ($Countries as $key) { ?>
                                            <option value="<?=$key->Id?>" <?=$key->Id == '229' ?'selected' : ''?> data-countrycode ="<?=$key->Phonecode?>"><?=$key->Name?></option>
                                <?php 
                                            }
                                        }
                                    ?>
                            </select>
                          </div>
                     </div>
                     <div class="d-flex flex-row align-items-center mb-1 states_list" style="display:none !important">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="">Estate</label>
                            <select class="form-control states" id="states" name="states">
                               
                            </select>
                        </div>
                        <div class="form-outline flex-fill mb-0" style="margin-left: 10px;">
                            <label class="form-label" for="city">City</label>
                            <input type="text" id="city" class="form-control" name="city" required />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="additiona_direction">Additional Direction(Optional)</label>
                            <input type="text" id="additiona_direction" class="form-control" name="additiona_direction" required />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="login_email">Contact No</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="country_code">+971</span>
                                </div>
                                <input type="number" class="form-control" name="phone_no">
                                <input type="hidden" class="form-control code_for_country" name="country_code">
                                </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="first_name">First & Middle Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" required />
                        </div>
                        <div class="form-outline flex-fill mb-0"  style="margin-left: 10px;">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name" required />
                        </div>
                    </div>
                    <div class="product-call align-items-right">
                        <button type="submit" id="checklogin" class="">Add Address</button>
                    </div>
                    <input type="hidden" name="formatted_address" class="formatted_address">
                    <input type="hidden" id="user_id_foraddress" name="user_id_foraddress" value="<?=$this->session->userdata('user_id')?>">  
                  </form>
            </div>
        </div>
    </section>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnNWl12-v7vu22thJBz1Aq7yNLJC_ZZRo&Map&v=weekly&libraries=places"
    ></script>
<script>
       
    appTitle = function(value){
       if( value == 'Home' || value == 'Work' ){
        $('#appartment_title').val(value);
        $('#appartment_title').attr('readonly' , 'true');
       }else if(value == 'Other'){
        $('#appartment_title').val('');
        $('#appartment_title').removeAttr('readonly');
       }
    };
    $('.country').change(function(){
        var country_id = $('.country').val();
        var country_code = $(this).find(':selected').data('countrycode'); 
            $('#country_code').html('+'+country_code);
            $('#code_for_country').val('+'+country_code);
            $.ajax({
                url:'<?php echo base_url('user/states'); ?>',
                type: 'GET',
                dataType:'json',
                data:{   country_id : country_id },
                success:function(data){
                    if(data.TotalRecord > 0 ){
                     view = ``;   
                     for(var i =0;i<data.States.length;i++){
                            view+=`<option value="`+data.States[i].Id+`">`+data.States[i].Name+`</option>`;
                        }
                        $(".states").empty();
                        $(".states").html(view); 
                        $(".states_list").slideDown("slow" , function(){}); 
                           
                    }
                }
            });
    });
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