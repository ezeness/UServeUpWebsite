<style>
    .used_color td{
        color:#b6b6b6;
    }
    .fa{
        cursor: pointer;
    }
</style>
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
                                    <table class="table" id="invitation_list">
                                    <thead>
                                           <tr style="display:none">
                                                <th>title-1</th>
                                                <th>title-2</th>
                                                <th>title-2</th>
                                                <th>title-2</th>
                                                <th>title-2</th>
                                            </tr>
                                           </thead>
                                           <tbody>
                                        <?php if(isset($invitation_codes)){
                                            
                                            foreach ($invitation_codes as $key) {
                                            ?>

                                          
                                            <tr class="<?=$key->IsUsed == 1 ? 'used_color' : ''?>">
                                                <td class="invitation_code"><?=$key->InvitationCode?></td> 
                                                <td class="person_name"><?=$key->PersonName?></td> 
                                                <?php 
                                                if($key->InvitationStatus == 0){
                                                    echo "<td></td><td></td><td><i class='fa fa-times-circle'></i></td>";
                                                }else{
                                                ?>
                                                <td data-toggle="modal" data-target="#exampleModalth<?=$key->InvitationCode?>" type="button" ><i class="fa fa-eye" aria-hidden="true"></i></td> 
                                                <td onclick="copyTextToClipboard('<?=$key->InvitationCode?>')"><i class="fa fa-copy"></i></td> 
                                                <td><?=$key->IsUsed == 1 ? '<i class="fa fa-check-circle" aria-hidden="true"></i>' : ''?></td> 
                                                <?php } ?>
                                             </tr>

                                             <div class="modal fade invation modal-p-bottom" id="exampleModalth<?=$key->InvitationCode?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelth" aria-hidden="true">
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

                                                                                    <!-- <div class="tooltip">
                                                                                        <button onclick="myFunction()" onmouseout="outFunc()">
                                                                                        <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                                                                        <img src="<?=$assets?>images/Icons/copy-link.svg" alt="">
                                                                                        </button>
                                                                                    </div> -->
                                                                                
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                        <textarea name="" id="myInput" cols="20" rows="7" disabled>Hey <?=$key->PersonName?> - U Have been Invited to U <?=$utagUpCCategory->UTagcategoryName?> UP, by Mr./Ms <?=$loggedInUser->Name?> Ur <?=$key->InvitationType?> Invitation Code is  <?=$key->InvitationCode?> Make sure to use the code to Register via link <?=base_url('signup')?>
                                                                                </textarea>
                                                                            <!-- <p id="myInput"></p>
                                                                            <input type="text" value="" > -->
                                                                        </div>
                                                                        <div class="soc-med">
                                                                            <ul>
                                                                                <li>
                                                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=whatsappphonenumber&text=Hey <?=$key->PersonName?> - U Have been Invited to U <?=$utagUpCCategory->UTagcategoryName?> UP, by Mr./Ms <?=$loggedInUser->Name?> Ur <?=$key->InvitationType?> Invitation Code is  <?=$key->InvitationCode?> Make sure to use the code to Register via link <?=base_url('signup')?>">
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
                                                             <div class="modal-footer">
                                                                <?php if($key->IsUsed == 0) {?>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancelInvite('<?=$key->Id?>' , '<?=$invite_type?>')">Cancel Invites</button>
                                                                <?php } ?>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                                                                
                                                        
                                                        </div>
                                                        <!-- Modal Content: ends -->
                                                        
                                                    </div>
                                                </div>
                                            
                                       <?php }  } ?>
                                       </tbody>
                                    </table>

                        </div>

                    </div>
                </div>

            </section>
            
<script>
$(document).ready( function () {
    $('#invitation_list').DataTable(
        {
        paging: true,
        ordering: false,
    }
    );
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
    
} );
// $("#signup_final").click(function(){
    cancelInvite = function(value,type){
    $.ajax({
            url:'<?php echo base_url('user/cancelInvite'); ?>',
            type: 'GET',
            dataType:'json',
            data:{
                InvitationId:value , 
                InvitationType:type , 
            },
            success:function(data){
                sa_alert("Success", data.ErrorMessege, 'success');
                location.reload();
            }
        });
    }
        // }); 
</script>
