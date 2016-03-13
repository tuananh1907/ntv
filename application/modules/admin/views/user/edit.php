<div id="page-wrapper">
    <form action='' method='post' id="formuser">
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                    <?php echo $this->lang->line('txt_user');?> :: <?php echo $this->lang->line('txt_edit');?>
                </h1>
            </div>
            <div class="block-right">
                <input type="submit" name="update" value=<?php echo $this->lang->line('txt_save');?> id="cmdEdit" class="button " />
                <input data-href="/index.php/admin/user" type="submit" name="cmdCancel" value=<?php echo $this->lang->line('txt_cancel');?> id="cmdCancel" class="button " />
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
                    <div class="content">
                        <div id="tabs" class="tabs">
                            <ul class='tabs-heading'>
                                <li>
                                    <a href="#tabs-1">
                                        <img src="<?php echo FLAGS_PATH ?>/<?php echo ADMIN_LANGUAGE . '.png'; ?>" />
                                    </a>
                                </li>
                            </ul>
                            <div id="tabs-1">
                                <div class="form">
                                    <div class="block-left">
                                        
                                        <div class='form-field'>
                                            <label class="desc"><?php echo $this->lang->line('txt_username');?></label>
                                            <input name="username" type="text" value="<?php echo $list['username'];?>" class="field text full">
                                        </div>
                                        
                                         <div class='form-field'>
                                            <label class="desc"><?php echo $this->lang->line('txt_fullname');?></label>
                                            <input name="fullname" type="text" value="<?php echo $list['fullname'];?>" class="field text full">
                                        </div>
                                        
                                        <!--<div class='form-field'>
                                            <label class="desc"><?php echo $this->lang->line('txt_password');?></label>
                                            <input name="password" type="password" value="<?php echo $list['password'];?>" class="field text full">
                                        </div>
                                        
                                        <div class='form-field'>
                                            <label class="desc"><?php echo $this->lang->line('txt_confirm_password');?></label>
                                            <input name="password" type="password" value="<?php echo $list['password'];?>" class="field text full">
                                        </div>-->
                                        
                                        <div class='form-field'>
                                            <label class="desc">Email</label>
                                            <input name="email" type="text" value="<?php echo $list['email'];?>" class="field text full">
                                        </div>
                                        
                                        <div class='form-field'>
                                            <label class="desc"><?php echo $this->lang->line('txt_gender');?></label>
                                            <select name="gender">
                                                <option value="0" <?php echo $list['gender'] == 0 ? 'selected' : '' ?> ><?php echo $this->lang->line('txt_male');?></option>
                                                <option value="1" <?php echo $list['gender'] == 1 ? 'selected' : '' ?> ><?php echo $this->lang->line('txt_female');?></option>
                                            </select>
                                        </div>
                                        
                                         <div class='form-field'>
                                            <label class="desc"><?php echo $this->lang->line('txt_address');?></label>
                                            <input name="address" type="text" value="<?php echo $list['address'];?>" class="field text full">
                                        </div>
                                        
                                         <div class='form-field'>
                                            <label class="desc"><?php echo $this->lang->line('txt_phone');?></label>
                                            <input name="phone" type="text" value="<?php echo $list['phone'];?>" class="field text full">
                                        </div>
                                        
                                        
                                        
                                    </div><!--//block-left -->
                                    <div class='clearfix'></div>
                                    <div class="form-control">
                                        <input type="submit" name="update" value=<?php echo $this->lang->line('txt_save');?> id="cmdEdit" class="button " />
                                        <input type="submit" name="cmdCancel" value=<?php echo $this->lang->line('txt_cancel');?> id="cmdCancel" class="button " />
                                    </div>
                                </div>
                            </div><!--//tab -->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="block-left sidebar">
                <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                    <div class="portlet-header ui-widget-header">
                        <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $this->lang->line('txt_group');?></div>
                    <div class="portlet-content">
                        <?php 
                            my_select(
                                $list_group, 
                                $option = array('title' => 'group_name', 'value' => 'group_id'),
                                $attributes = array('name' => "group_id", 'id' => 'lstCate', 'class' => 'listbox lstCate', 'size' => 4),
                                $selected = array($list['group_id']), 
                                $no_choice = array('title' => $this->lang->line('txt_all'), 'value' => 0)
                            );
                        ?>
                    </div>
                </div>
                
                <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                    <div class="portlet-header ui-widget-header">
                        <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $this->lang->line('txt_active');?></div>
                    <div class="portlet-content">
                        <?php 
                            my_select(
                                array(array('title' => $this->lang->line('txt_active'), 'value' => 1), array('title' => $this->lang->line('txt_deactive'), 'value' => 0)), 
                                $option = array('title' => 'title', 'value' => 'value'),
                                $attributes = array('name' => "active", 'id' => 'lstActive', 'class' => 'listbox lstActive'),
                                $selected = array($list['active'])
                            );
                        ?>
                    </div>
                </div>
                
            </div>
            
            <div class="clearfix">
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div class="clearfix">
    </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#formuser').validate({
            rules: {
                username: {
                    required: true,
                    minlength: 6
                },
                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                username: {
                    required: VALIDATE_REQUIRED,
                    minlength:VALIDATE_MINLENGTH
                },
                fullname: {
                    required: VALIDATE_REQUIRED
                },
                email: {
                    required: VALIDATE_REQUIRED,
                    email: VALIDATE_EMAIL   
                }
            }
        });
    });
</script>
