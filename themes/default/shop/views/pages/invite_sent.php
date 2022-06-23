<section>
                <div class="invate-blo">
                    <div class="container">
                        <div class="invite-model">
                            <div class="modal-headers send">
                                <!-- <button type="button" class="close" user_data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                <h4 class="modal-title" id="gridSystemModalLabel"> Thank U
                                </h4>
                                <p> Ur Invite is Sent</p>
                            </div>
                            <div class="invite-t send">
                                <p>Invite Person: <?=$user_data->PersonName?></p>
                                <p>Mobile No: <?=$user_data->PersonPhone?></p>
                                <p>Email: <?=$user_data->PersonEmail?></p>
                                <p>Total Number of Invite <?=$result->TotalCode?></p>
                              </div>
                              <div class="stdne send">
                                    <h1><?=$invitation_code?></h1>
                                    <div class="mes">
                                        <ul>
                                            <li>
                                                <p>Message</p>
                                            </li>
                                            <li>
    
                                                <div class="tooltip">
                                                    <button onclick="myFunction()" onmouseout="outFunc()">
                                                      <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                                      <img src="<?=$assets?>images/Icons/copy-link.svg" alt="">
                                                    </button>
                                                </div>
                                               
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <textarea name="" id="myInput" cols="20" rows="7" disabled>Hey <?=$user_data->PersonName?> - U Have been Invited to U <?=$utagUpCCategory->UTagcategoryName?> UP, by Mr./Ms <?=$loggedInUser->Name?> Ur <?=$user_data->InvitationType?> Invitation Code is  <?=$invitation_code?> Make sure to use the code to Register via link <?=base_url('signup')?>
                                        </textarea>
                                        <!-- <p id="myInput"></p>
                                        <input type="text" value="" > -->
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                             <button data-toggle="modal" data-target="#exampleModalth" type="button" class="btn btn-primary invite_btn">Other Sharing Options</button>
                                        </div>
                              </div>

                        </div>

                    </div>
                </div>

            </section>
            <script>

    /* copy text javascript*/
    function myFunction() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copied" ;
    }
    
    function outFunc() {
      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copy to clipboard";
    }
    $(".header-top-icon .dropdown-toggle ").click(function () {
        $('.overlays').toggleClass('active');
    });

    $(".overlays ").click(function () {
        $('.overlays').toggleClass('');
    });
    </script>

    
<div class="modal fade invation modal-p-bottom" id="exampleModalth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelth" aria-hidden="true">
            <div class="modal-dialog">
              
                <!-- Modal Content: begins -->
                <div class="modal-content">
                  
                  <!-- Modal Header -->
                  <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                
                  <!-- Modal Body -->  
                  <div class="modal-body">
                    <div class="body-message">
                      <div class="invite-model">
                          <div class="invite-t">
                            <div class="stdne send">
                                <div class="mes">
                                    <ul>
                                        <li>
                                            <p>Message</p>
                                        </li>
                                        <li>

                                            <div class="tooltip">
                                                <button onclick="myFunction()" onmouseout="outFunc()">
                                                  <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                                  <img src="<?=$assets?>images/Icons/copy-link.svg" alt="">
                                                </button>
                                            </div>
                                           
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                <textarea name="" id="myInput" cols="20" rows="7" disabled>Hey <?=$user_data->PersonName?> - U Have been Invited to U <?=$utagUpCCategory->UTagcategoryName?> UP, by Mr./Ms <?=$loggedInUser->Name?> Ur <?=$user_data->InvitationType?> Invitation Code is  <?=$invitation_code?> Make sure to use the code to Register via link <?=base_url('signup')?>
                                        </textarea>
                                    <!-- <p id="myInput"></p>
                                    <input type="text" value="" > -->
                                </div>
                                <div class="soc-med">
                                    <ul>
                                        <li>
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone=whatsappphonenumber&text=Hey <?=$user_data->PersonName?> - U Have been Invited to U <?=$utagUpCCategory->UTagcategoryName?> UP, by Mr./Ms <?=$loggedInUser->Name?> Ur <?=$user_data->InvitationType?> Invitation Code is  <?=$invitation_code?> Make sure to use the code to Register via link <?=base_url('signup')?>">
                                                <img src="<?=$assets?>images/Icons/whats-app.png" alt="">
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                                <img src="<?=$assets?>images/Icons/Facebook_logo-019abde1a9544571bdd079f83653851b.jpg" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="<?=$assets?>images/Icons/telegram-logo-icon-voronezh-russia-january-light-blue-round-soft-shadow-171161253.jpg" alt="">
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                          </div>
                          </div>
                          
                      </div>
                    </div>
                  </div>
                
                  
                
                </div>
                <!-- Modal Content: ends -->
                
              </div>
          </div>