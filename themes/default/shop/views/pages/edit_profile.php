<style>
.pro-img{
    margin-top: -20px;
}
</style>
<section style="margin-top:15%;" id="edit_profile">
        <div class="container">
            <div class="row">
                <div class="col-12 edit_profile_heading">
                    <h6>Edit Profile</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 edit_profile_img">
                   <div class="pro-img">
                        <div class="left-pro">
                            <div class="avatar-upload">
                                <!-- <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div> -->
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(<?=$user_details->UserThumbImage?>);"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                        <div class="profile_right-pro">
                            <h5>Profile Details</h5>
                        </div>
                        <div class="banner_img">
                            <a href="#"> <img src="<?= $assets?>images/Banners/slider2.jpg" alt="" class="img-fluid" style="height:140 px;width:auto !important"> </a>
                        </div>
                </div> 
                <div class="col-12">
                    <div class="upload_banner">
                            <a href="#">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </a>
                    </div>
                </div>
            </div>
            <div class="row">
            <form style="width:100%">
                <div class="form-group">
                    <label for="gender">Gender</label>
                        <div class="gender-call">
                            <a href="#">Male</a>
                        </div>
                </div>
                <div class="form-group">
                    <label for="OwnerName">Owner Name</label>
                    <input type="text" class="form-control" id="OwnerName" placeholder="Owner Name">
                </div>
                <div class="form-group">
                    <label for="DOB">Date of Birth</label>
                    <input type="date" class="form-control" id="DOB" placeholder="Date of Birth">
                </div>
                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" id="Username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="accountcategory">Account Category</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="aboutu">About U</label>
                    <textarea class="form-control" id="aboutu" rows="2" name="aboutU"></textarea>
                </div>
                <div class="form-group">
                    <label for="Website">Website</label>
                    <input type="text" class="form-control" id="Website" placeholder="Website">
                </div>
                <div class="form-group">
                    <label for="Website">Contact No.</label>
                    <input type="text" name="phone_no" class="form-control" id="phonenumber" required>
                </div>
                     <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
      
    </section>

    <script>
    $(document).ready(function() {
        $("#phonenumber").intlTelInput({
                allowDropdown: false,
                autoHideDialCode: false,
                autoPlaceholder: "off",
                dropdownContainer: document.body,
                // excludeCountries: ["us"],
                formatOnDisplay: false,
                geoIpLookup: function(callback) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                    });
                },
                hiddenInput: "full_number",
                initialCountry: "auto",
                // localizedCountries: { 'de': 'Deutschland' },
                nationalMode: false,
                // onlyCountries: ['ae', 'gb', 'ch', 'ca', 'do'],
                placeholderNumberType: "MOBILE",
                preferredCountries: ['ae'],
                separateDialCode: true,
                utilsScript: "<?=$assets?>js/utils.js",
                });
        });
        </script>

