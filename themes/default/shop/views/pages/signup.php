<script src="https://www.google.com/recaptcha/api.js?render=6LfY7IwfAAAAAGruict4TfZTNnfVMKFIVOlA20sJ"></script>
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
<section class="" style="background-color: #eee;">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-12">
        <div class="card text-black sign_up_margin" style="border-radius: 25px;margin-top: 100px;">
          <div class="card-body p-md-4">
            <div class="row justify-content-center">
            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 last_image">
                <!-- <img src="<?=base_url('assets/images/signup.jpg')?>" class="img-fluid banner_img" alt="Sample image"> -->
                <h1>We are very close to <b>U<span style="font-size: 34px;">!</span></b></h1>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 sign_up">Sign In</p>
                <p class="text-center" style="display:none ; color:orange;font-size:13px;" id="user_not_found">User not found please enter invitation code to continue.</p>
                          
               
                <!-----------------------Login Form ------------------------------>
                    <div class="login_check">
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="login_email">Enter Email</label>
                            <input type="text" id="login_email" class="form-control" name="login_email" checked />
                            </div>
                        </div>
                    
                    <div class="product-call align-items-right">
                        <a type="button" id="checklogin" class="" >Login</a>
                    </div>
                  </div>

                  
                  <!--------------------------------Login Form ------------------------------->
                  <div class="login_form" style="display:none">
                  <p style="font-size: 18px;padding-bottom: 20px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></p>
                  <?= form_open('user/login', 'class="login"'); ?>
                  <!-- <form class="login"  action="<?=base_url('user/login')?>" method="POST"> -->
                        <div class="d-flex flex-row align-items-center mb-1">
                                <div class="form-outline flex-fill mb-0">
                                      <label class="form-label" for="login_emai">Email</label>
                                        <input type="text" id="login_emai" class="form-control" name="email" required  value=/>
                                </div>
                            </div>
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="login_password">Password</label>
                                <input type="password" id="login_password" class="form-control" name="password" required />
                            </div>
                    </div>
                        <div class="product-call align-items-right">
                            <button type="submit" >Login</button>
                        </div>
                    </form>
                </div>
                    <!-- Check Invitation Code  -->
                <div class="invitation_code" style="display:none;margin-top: 30px;">
                <p style="font-size: 18px;padding-bottom: 20px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></p>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="invitecode">Enter Invitation Code</label>
                        <input type="text" id="invitecode" class="form-control" name="invitation_code" required />
                        </div>
                    </div>
                    
                    <div class="product-call align-items-right">
                        <a type="button" id="checkcode" class="">Verify Invitation</a>
                    </div>
                  </div>

                  <!-- Email Checking -->
                  <div class="email_verfication" style="display:none">
                  <form  id="email_to_user" action="" method="post">
                    <div class="d-flex flex-row align-items-center mb-1">
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="invitecode">Enter Email / Phone</label>
                        <input type="email" id="email_address" class="form-control" name="email_address" required />
                        </div>
                    </div>
                    
                    <div class="product-call align-items-right">
                        <a type="button" id="checkemail"  onClick="onClick()">Sign Up</a>
                    </div>
                 </form>
                  </div>
                     <!--Verify User  -->
                     <div class="verify_user" style="display:none">
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                             <label class="form-label" for="verify_email_address">Verification Code sent to</label>
                            <input value="" type="email" id="verify_email_address" class="form-control" name="verify_email_address" readonly />
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="verify_code">Enter Verification Code</label>
                            <input type="text" id="verify_code" class="form-control" name="verify_code" />
                            </div>
                        </div>
                    
                    <div class="product-call align-items-right">
                        <a type="button" id="verifyUser" class="product-call align-items-right">Verify</a>
                    </div>
                  </div>
                  <!--------------------------------Other Details -------------------------------------------->
                  <div class="add_user_details" style="display:none">
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="verify_code">Select Gender</label>
                            <select class="form-control" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <!-- <option value="Company">Company</option> -->
                            </select>
                            </div>
                        </div>
                    <div class="user_details">
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="first_name">Owner Full Name</label>
                                <input type="text" id="first_name" class="form-control" name="first_name" required/>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="dob">Date of Birth</label>
                                <input type="date" id="dob" class="form-control" name="dob" required />
                            </div>
                        </div>
                </div>
                        <div class="company_profile" style="display:none">
                            <div class="d-flex flex-row align-items-center mb-1">
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="company_name">Company Name</label>
                                    <input type="text" id="company_name" class="form-control" name="company_name" required/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-1">
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="company_date">How old is it?</label>
                                    <input type="date" id="company_date" class="form-control" name="company_date" required/>
                                </div>
                            </div>
                     </div>
                    <div class="product-call align-items-right">
                        <a type="button" id="details_next" class="">Next</a>
                    </div>
                  </div>

                            <!--------------------- Username ------------------------- -->

                    <div class="user_name" style="display:none">
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="user_name">Choose a Username</label>
                                <input type="text" id="user_name" class="form-control" placeholder="@_Username" name="user_name"/>
                                <p  style="display:none ; color:green;font-size:13px;" id="valid_username" >Username is valid.</p>
                                <p  style="display:none ; color:red;font-size:13px;" id="notvalid_username">Username not valid.</p>
                            </div>
                        </div>

                    <div class="product-call align-items-right">
                        <a type="button" id="signup_final" class="" disabled>SignUp</a>
                    </div>
                  </div> 
                        <!----------------------- Password Adding Form-------------------------------------- -->
                  <div class="create_password" style="display:none">
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="email_address_pass">Email / Phone</label>
                            <input value="" type="email" id="email_address_pass" class="form-control" name="email_address_pass" readonly />
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password">Password</label>
                                 <div class="input-group mb-3">
                                     <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        <div class="input-group-prepend">
                                           <span class="input-group-text" id="pass"><i class="fa fa-eye-slash" id="pass_eye" aria-hidden="true"></i></span>
                                        </div>
                                 </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-1">
                            <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password">Confirm Password</label>
                                 <div class="input-group mb-3">
                                     <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword">
                                        <div class="input-group-prepend">
                                           <span class="input-group-text" id="cPass"><i class="fa fa-eye-slash" id="cpass_eye" aria-hidden="true"></i></span>
                                        </div>
                                 </div>
                            </div>
                        </div>     
                        <div class="agree_terms">
                            <div class="d-flex flex-row align-items-center mb-1">
                                <div class="form-outline flex-fill mb-0">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="agree_terms">
                                            <label class="form-check-label" for="agree_terms">Agree To <b>U <?=$utagUpCCategory->UTagcategoryName?> Up</b> <a href="#">Terms & Conditions</a></label>
                                        </div>
                                </div>
                            </div>
                        </div>           
                        <input type="hidden" id="user_id" name="user_id">  
                        <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"></div>
                    <div class="product-call align-items-right">
                        <a type="button" id="pass_next" class="">Next</a>
                    </div>
                  </div>
              </div>
             
            </div>
          </div>
                <div class="col-sm-12 address_detials" style="display:none">
                <div class="card-body p-md-4 map col-sm-6" style="float:left">
                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                   
                    <div id="map-canvas"></div>
                        
                </div>
                <div class="card-body p-md-4 col-sm-6" style="float:left">
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
                                            <option value="<?=$key->Id?>" data-countrycode ="<?=$key->Phonecode?>"><?=$key->Name?></option>
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
                    <input type="hidden" id="user_id_foraddress" name="user_id_foraddress">  
                  </form>
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
    mapTypeId: google.maps.MapTypeId.ROADMAP
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

<script>

    /////////////////////////////Back Button////////////////////////
    $('.fa-arrow-left').click(function(){
        $('.login_form').slideUp("slow" , function(){});
        $('.login_check').slideDown("slow" , function(){});
        $('.invitation_code').slideUp("slow" , function(){});
        $('#user_not_found').slideUp("slow" , function(){});
        $('#login_emai').val($('#login_email').val());
    });
    ///////////////////////////////Password Hide Un Hide////////////////////////////////
$("#pass").click(function(){
    if($('#pass_eye').hasClass('fa-eye-slash')){
        $('#pass_eye').removeClass('fa-eye-slash');
        $('#pass_eye').addClass('fa-eye');
        $('#password').attr("type", "text");
    }else{
        $('#pass_eye').addClass('fa-eye-slash');
        $('#pass_eye').removeClass('fa-eye');
        $('#password').attr("type", "password");
    }
});
$("#cPass").click(function(){
    if($('#cpass_eye').hasClass('fa-eye-slash')){
        $('#cpass_eye').removeClass('fa-eye-slash');
        $('#cpass_eye').addClass('fa-eye');
        $('#cpassword').attr("type", "text");
    }else{
        $('#cpass_eye').addClass('fa-eye-slash');
        $('#cpass_eye').removeClass('fa-eye');
        $('#cpassword').attr("type", "password");
    }
});
////////////////////////gender change /////////////////////
// $('#gender').change(function(){
//     if($('#gender').val() == 'Company'){
//         $('.company_profile').slideDown("slow" , function(){});
//         $('.user_details').slideUp("slow" , function(){});
//     }else{
//         $('.user_details').slideDown("slow" , function(){});
//         $('.company_profile').slideUp("slow" , function(){});
//     }
// });
////////////////////////Check User Exist or Not ///////////////////////////////


$("#checklogin").click(function(){
var email = $('#login_email').val();
if(email == ""){
    sa_alert("Error",'Please Enter Email!', 'error');
    // alertMessage('Please Enter Email!', 'error');
    return;
}
$.ajax({
    url:'<?php echo base_url('user/emailValidate'); ?>',
    type: 'GET',
    dataType:'json',
    data:{   email : email },
    success:function(data){
        if(data.IsValid == 1){
            $('.login_form').slideDown("slow" , function(){});
            $('.login_check').slideUp("slow" , function(){});
            $('#login_emai').val($('#login_email').val());
            // alertMessage(data.Errormessege , 'error');

        }else{
            // alertMessage('Invitation Code is Valid!' , 'success');
            $('.invitation_code').slideDown("slow", function() {});
            $('#user_not_found').slideDown("slow" , function(){});
            $('.login_check').slideUp("slow", function() {});
            $('.sign_up').html('');
            $('.sign_up').html('Sign Up');
        }
    }
});
});
////////////////////Check Password and Confirm Password
    function checkPasswordMatch() {

        var password = $("#password").val();
        var confirmPassword = $("#cpassword").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").html("Passwords match.");
    }
    $(document).ready(function () {
       $("#cpassword").keyup(checkPasswordMatch);
    });
    
////////////////Validate Invitation Code///////////////////////

    $("#checkcode").click(function(){
    var code = $('#invitecode').val();
    $('#email_address').val($('#login_email').val());
$.ajax({
    url:'<?php echo base_url('validatecode'); ?>',
    type: 'GET',
    dataType:'json',
    data:{   code : code },
    success:function(data){
        if(data.IsValid == 0){
            sa_alert("Error", data.ErrorMessege, 'error');

        }else{
            sa_alert("Success", "Invitation Code is Valid!", 'success');
            // alertMessage('' , 'success');
            $('.invitation_code').slideUp("slow", function() {});
            $('#user_not_found').slideUp("slow", function() {});
            $('.email_verfication').slideDown("slow", function() {});
        }
    }
});
});
function onClick(e) {
        // e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfY7IwfAAAAAGruict4TfZTNnfVMKFIVOlA20sJ', {action: 'submit'}).then(function(token) {
////////////////// Validate email /////////////////////////
                // $("#checkemail").click(function(){
                    
                $('#user_not_found').slideUp("slow" , function(){});
                var invitation_code = $('#invitecode').val();
                var email_address = $('#email_address').val();
                $('#verify_email_address').val(email_address);
                $.ajax({
                    url:'<?php echo base_url('user/checkEmail'); ?>',
                    type: 'GET',
                    dataType:'json',
                    data:{   email_address : email_address , code: invitation_code},
                    success:function(data){
                        if(data.type == 1){
                            sa_alert("Error", data.data, 'error');
                            // alertMessage(data.data , 'error');
                        }else{
                        if(data.IsValid == 0){
                            sa_alert("Error", data.ErrorMessege, 'error');
                            // alertMessage(data.Errormessege , 'error');
                        }else{
                            sa_alert("Error", data.ErrorMessege, 'success');
                            // alertMessage(data.Errormessege , 'success');
                            $('.verify_user').slideDown("slow", function() {});
                            $('.email_verfication').slideUp("slow", function() {});
                        }
                    }
                    }
                });
                });
                // });
        });
      }
//////////////////////////////Verify User if exist ////////////////////
$("#verifyUser").click(function(){
var email_address = $('#email_address').val();
$('#email_address_pass').val(email_address);
var verification_code = $('#verify_code').val();
var invitation_code = $('#invitecode').val();
$('#verify_email_address').val(email_address);
$.ajax({
    url:'<?php echo base_url('user/verifyUser'); ?>',
    type: 'GET',
    dataType:'json',
    data:{   email_address : email_address , 
        invitation_code:invitation_code ,  
        verification_code :verification_code},
    success:function(data){
        if(data.Status == 0){
            sa_alert("Error", data.ErrorMessege, 'error');
            // alertMessage(data.ErrorMessege , 'error');
        }else{
            $('#user_id').val(data.User.Id);
            $('#user_id_foraddress').val(data.User.Id);
            $('.create_password').slideDown("slow", function() {});
            $('.verify_user').slideUp("slow", function() {});
        }
    }
});
});

//////////////Add Password
$("#pass_next").click(function(){
    if(!($('#agree_terms').is(':checked')) ){
        sa_alert("Error", 'Agree to the terms & conditions!', 'error');
        return;
    }
var user_id = $('#user_id').val();
var password = $('#password').val();
var confirmpassword = $('#cpassword').val();
        $.ajax({
            url:'<?php echo base_url('user/addpassword'); ?>',
            type: 'GET',
            dataType:'json',
            data:{user_id:user_id , password:password ,
                 confirmpassword : confirmpassword},
            success:function(data){
                if(data.Status == 0){
                      sa_alert("Error", data.ErrorMessege, 'error');

                    // alertMessage(data.Errormessege , 'error');
                }else{
                    $('.add_user_details').slideDown("slow" , function(){});
                    $('.create_password').slideUp("slow", function() {});
                }
            }
        });
});

$("#details_next").click(function(){
var gender  = $('#gender').val();
var first_name = $('#first_name').val();
var dob = $('#dob').val();
// var last_name = $('#last_name').val();
var company_name = $('#company_name').val();
var company_date = $('#company_date').val();


if(gender == 'Company' && compnay_name != ''){
    $('.add_user_details').slideUp("slow" , function(){});
    $('.user_name').slideDown("slow", function() {});
} else if ((gender == 'Male' || gender == 'Female')  && first_name != '' && last_name != ''){
    $('.add_user_details').slideUp("slow" , function(){});
    $('.user_name').slideDown("slow", function() {});
}else{
    sa_alert("Error", 'Please Fill data!', 'error');
    // alertMessage('Please fill data.' , 'error');
    return;
}
    
});
$("#signup_final").click(function(){
var gender  = $('#gender').val();
var first_name = $('#first_name').val();
var dob = $('#dob').val();
// var last_name = $('#last_name').val();
var company_name = $('#company_name').val();
var company_date = $('#company_date').val();
var user_id = $('#user_id').val();
var user_name = $('#user_name').val();
    $.ajax({
            url:'<?php echo base_url('user/checkUserProfile'); ?>',
            type: 'GET',
            dataType:'json',
            data:{gender:gender , 
                first_name:first_name ,
                dob : dob , 
                company_name: company_name , 
                company_date : company_date,
                user_id :user_id,
                user_name :user_name,
                
            },
            success:function(data){
                if(data.IsValid == 0){
                    sa_alert("Error", data.ErrorMessege, 'error');
                    // alertMessage(data.Errormessege , 'error');
                }else{
                    if(data.Status == 1){
                        sa_alert("Success", data.ErrorMessege, 'success');
                        // alertMessage(data.ErrorMessege , 'success');
                        $('.address_detials').slideDown("slow" , function(){});
                        $('.user_name').slideUp("slow", function() {});
                        $('.last_image').slideUp("slow", function() {});
                        $('.banner_img').css('display' , 'none')
                        $('.card').css('width' , '1024px')
                    }else{
                        sa_alert("Error", data.ErrorMessege, 'error');
                        // alertMessage(data.ErrorMessege , 'error');
                    }
                }
            }
        });
        });

$("#user_name").keyup(function(){
var gender  = $('#gender').val();
var first_name = $('#first_name').val();
var dob = $('#dob').val();
// var last_name = $('#last_name').val();
var company_name = $('#company_name').val();
var company_date = $('#company_date').val();
var user_id = $('#user_id').val();
var user_name = $('#user_name').val();
    $.ajax({
            url:'<?php echo base_url('user/checkUserProfile'); ?>',
            type: 'GET',
            dataType:'json',
            data:{
                gender:gender , 
                first_name:first_name ,
                dob : dob , 
                company_name: company_name , 
                company_date : company_date,
                user_id :user_id,
                user_name :user_name,
                
            },
            success:function(data){
                if(data.IsValid == 0){
                    $('#notvalid_username').css('display' , 'block')
                    $('#valid_username').css('display' , 'none');
                    // alertMessage(data.Errormessege , 'error');
                }else{
                    if(data.Status == 1){
                        $('#valid_username').css('display' , 'block');
                       $('#notvalid_username').css('display' , 'none');
                       $('#signup_final').removeAttr('disabled');

                    }else{
                        sa_alert("Error", data.ErrorMessege, 'error');
                        $('#notvalid_username').css('display' , 'none');
                        $('#valid_username').css('display' , 'none');
                        // alertMessage(data.ErrorMessege , 'error');
                    }
                }
            }
        });
        });
</script>
    