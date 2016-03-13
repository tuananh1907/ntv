<div id="page-wrapper">
    <form action='' method='post' id="changepassword">
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                     <?php echo $this->lang->line('txt_user');?> :: <?php echo $this->lang->line('txt_change_password');?>
                </h1>
            </div>
            <div class="block-right">
                <button type="submit" name="change" id="cmdUpdate" class="button "><?php echo $this->lang->line('txt_save');?></button>
                <button type="submit" data-href='<?php echo url_add_params($params, '/index.php/admin/user')?>' name="cancel"  id="cmdCancel" class="button "><?php echo $this->lang->line('txt_cancel');?></button>
            </div>
        </div>
        <div id="main-content">
            <!--notice-->
            <?php
            $notice = $this->session->flashdata('notice');
            if( isset( $notice ) && $notice ) {
                notice( $notice ); 
            }
            ?>
            <!--//notice-->
            <div id="content-outer">
                <div class="content-wrapper">
                    <div class="content full">
                            <div class='content-form-field'>
                                <div class='content-full-col'>
                                    <div class='form-field'>
                                        <label class="desc"><?php echo $this->lang->line('txt_old_password');?></label>
                                        <input name="old_password" type="password" value="" class="field text full">
                                    </div>
                                    
                                    <div class='form-field'>
                                        <label class="desc"><?php echo $this->lang->line('txt_new_password');?></label>
                                        <input id="new_password" name="new_password" type="password" value="" class="field text full">
                                    </div>
                                    
                                    <div class='form-field'>
                                        <label class="desc"><?php echo $this->lang->line('txt_confirm_password');?></label>
                                        <input name="new_password_confirm" type="password" value="" class="field text full">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
            
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div class="clearfix"></div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#changepassword').validate({
            rules  : {
                old_password: {
                    required: true    
                },
                new_password: {
                    required: true,
                    minlength: 6
                },
                new_password_confirm: {
                    required: true,
                    equalTo: "#new_password"
                }
            },
            messages : {
                old_password: {
                    required: VALIDATE_REQUIRED
                },
                new_password: {
                    required: VALIDATE_REQUIRED,
                    minlength: VALIDATE_MINLENGTH
                },
                new_password_confirm: {
                    required: VALIDATE_REQUIRED,
                    equalTo: VALIDATE_EQUALTO
                }
            }
        });
    });
</script>