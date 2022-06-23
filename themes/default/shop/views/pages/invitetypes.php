<section>
                <div class="invate-blo">
                    <div class="container">
                        <div class="invite-model">
                            <div class="modal-headers">
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                <h4 class="modal-title" id="gridSystemModalLabel"> <?=$invite_type?> Invitation
                                </h4>
                                <p> generate code</p>
                            </div>
                            <div class="invite-sta">
                                <ul>
                                    <li>
                                        <a href="#">
                                            
                                            <label class="containers"> INVITE <?=$invite_type?>
                                                <input type="radio"  name="invite_type" id="standardinvite_radio" checked>
                                                <span class="checkmark"></span>
                                               
                                            </label>
                                        </a>   
                                        <div class="line-d">
                                            <a href="#">
                                                <p>
                                                    <?php 
                                                    if($invite_type == 'special'){
                                                       echo isset($Invites->TotalSpecialInvitationCount)?>
                                                        / <?php 
                                                        if($IsAdmin == 1){
                                                            echo 'Unlimited';
                                                        }else{
                                                            echo $Invites->TotalSpecialInvitationLeft;
                                                        }
                                                             ?> 
                                                   <?php }else{
                                                            echo isset($Invites->TotalStandardInvitationCount);?> /
                                                        <?php    if($IsAdmin == 1){
                                                                echo 'Unlimited';
                                                            }else{
                                                                echo $Invites->TotalStandardInvitationLeft;
                                                            }
                                                        } ?>
                                                </p>
                                                <div class="lin">
                                                    <i class="line-1"></i>
                                                    <i class="line-1"></i>
                                                    <i class="line-1"></i>
                                                    <i class="line-1"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <?= form_open('user/sendInvitationCode', 'class="login"'); ?>
                            <input type="hidden" name="InvitationType" value="<?=$invite_type?>">
                                    <div class="form-group">
                                        <label for="person_name">Invite Persons's Name*</label>
                                        <input type="person_name" name="person_name" class="form-control" id="person_name" placeholder="Enter Person's Name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                        <div class="form-group">
                                             <label for="phonenumber">Contact No.*</label>
                                             <input type="text" name="phone_no" class="form-control" id="phonenumber" required>
                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <input type="radio" class="form-check-input" id="singleinvite" name="single_multipleinvite_type" checked>
                                                </div>
                                                <div class="col-9">
                                                    <label class="form-check-label" for="singleinvite">Single Invite</label>
                                                </div>
                                            </div>
                                          </div>
                                          <?php 
                                            if($InvitationType == 'special'){
                                            ?>
                                        <div class="form-group col-md-6">
                                            <div class="row">
                                                    <div class="col-3">
                                                        <input type="radio" class="form-check-input" id="multipleinvite" name="single_multipleinvite_type">
                                                    </div>
                                                   
                                                    <div class="col-9">
                                                        <label class="form-check-label" for="multipleinvite">Multiple Invite</label>
                                                    </div>
                                                  
                                                </div>
                                            </div> 
                                            <?php } ?>
                                        </div>
                                    <div class="form-group" style="display:none" id="totalinvite">
                                             <label for="totalinvites">Total Invites</label>
                                             <input type="number" class="form-control" id="totalinvites" name="totalinvites">
                                        </div>
                                        <div class="form-group" style="text-align: center;">
                                             <button type="submit" class="btn btn-primary invite_btn">Invite</button>
                                        </div>
                            </form>
                        </div>

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

                $("#multipleinvite").click(function(){
                    $('#totalinvite').css('display' , 'block')
                });
                $("#singleinvite").click(function(){
                    $('#totalinvite').css('display' , 'none')
                });
                $("#standardinvite_radio").click(function(){
                    $('#standard_invites').css('display' , 'block')
                    $('#special_invites').css('display' , 'none')

                });
                $("#specialinvite_radio").click(function(){
                    $('#special_invites').css('display' , 'block')
                    $('#standard_invites').css('display' , 'none')

                });

            </script>