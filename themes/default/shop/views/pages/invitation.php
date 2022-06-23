
          <section>
                <div class="invate-blo">
                    <div class="container">
                        <div class="invite-model">
                            <div class="modal-headers">
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                <h4 class="modal-title" id="gridSystemModalLabel">Invitation
                                </h4>
                                <p> generate code</p>
                            </div>
                            <div class="invite-sta">
                                <ul>
                                    <li>
                                        <a href="<?=base_url('invite_type')?>?invite=standard">
                                            <label class="containers"> INVITE STANDARD
                                                <input type="text"  name="invite_type" id="">
                                                <span class="checkmark"></span>
                                            </label>
                                        </a>   
                                        <div class="line-d">
                                            <a href="<?=base_url('invitation_list')?>?invite=standard">
                                            <p><?=isset($standardInvites->TotalStandardInvitationCount)?>
                                            / <?php 
                                            if($IsAdmin == 1){
                                                echo 'Unlimited';
                                            }else{
                                                echo $standardInvites->TotalStandardInvitationLeft;
                                            }
                                            ?>        
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
                                    <?php 
                                    if($InvitationType == 'special'){
                                    ?>
                                    <li>
                                        <a href="<?=base_url('invite_type')?>?invite=special">
                                            <label class="containers"> INVITE SPECIAL
                                                <input type="text"  name="invite_type" id="specialinvite_radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </a>   
                                        <div class="line-d">
                                           <a href="<?=base_url('invitation_list')?>?invite=special">
                                                <p>
                                                    <?=isset($standardInvites->TotalSpecialInvitationCount)?>
                                            / <?php 
                                            if($IsAdmin == 1){
                                                echo 'Unlimited';
                                            }else{
                                                echo $standardInvites->TotalSpecialInvitationLeft;
                                            }
                                            ?>        
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
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </section>