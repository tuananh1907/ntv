<div id="page-wrapper">
  <form method='post'>
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                    <?php echo $this->lang->line('txt_config_website')?>
                </h1>
            </div>
            <div class="block-right">
                <input type="submit" name="add" value="<?php echo $this->lang->line('txt_save')?>" id="cmdAdd" class="button " />
                <input type="submit" name="cancel" value="<?php echo $this->lang->line('txt_cancel')?>" id="cmdDel" class="button " />
            </div>
        </div>
        <div id="main-content">
			<div class="divTab">
                            <div class="tab-item">
							                  <a class="atab tab-icon email" title="tab0">Email</a>
                                <a class="atab tab-icon ga" title="tab1">Ga</a>
                                <a class="atab tab-icon seo" title="tab2"><?php echo $this->lang->line('txt_config_website')?></a>
                            </div>
                    
                            <div class="tab0 tabcontent ui-corner-all">
                                <label class="desc">
                                    SMTP
                                </label>
                                   <input name='config[_smtp_]' type="text" class="full" value='<?php echo config('_smtp_'); ?>' />
                                <label class="desc" >
                                    <?php echo $this->lang->line('txt_port')?>
                                </label>
                                   <input name='config[_port_]' type="text" class="full" value='<?php echo config('_port_'); ?>' />
                                 <label class="desc" >
                                    <?php echo $this->lang->line('txt_auth')?>
                                </label>
                                    <select name='config[_auth_]' class="select">
                                    <option <?php echo (int)config('_auth_') == 1 ? 'selected': ''; ?> value="1"><?php echo $this->lang->line('txt_yes')?></option>
                                    <option <?php echo (int)config('_auth_') == 0 ? 'selected': ''; ?> value="0"><?php echo $this->lang->line('txt_no')?></option>
                                </select>
                                 <label class="desc" >
                                    SSL
                                </label>
                                   <select name='config[_ssl_]' class="select">
                                    <option <?php echo (int)config('_ssl_') == 1 ? 'selected': ''; ?> value="1"><?php echo $this->lang->line('txt_yes')?></option>
                                    <option <?php echo (int)config('_ssl_') == 0 ? 'selected': ''; ?> value="0"><?php echo $this->lang->line('txt_no')?></option>
                                </select>
                                 <label class="desc" >
                                    <?php echo $this->lang->line('txt_smtp_account')?>
                                </label>
                                   <input name='config[_smtp_account_]' type="text" class="full" value='<?php echo config('_smtp_account_'); ?>' />
                                <label class="desc" >
                                    <?php echo $this->lang->line('txt_smtp_password')?>
                                </label>
                                   <input name='config[_smtp_password_]' type="text" class="full" value='<?php echo config('_smtp_password_'); ?>' />
                                <label class="desc" >
                                    <?php echo $this->lang->line('txt_smtp_email_sender')?>
                                </label>
                                   <input name='config[_smtp_sender_]' type="text" class="full" value='<?php echo config('_smtp_sender_'); ?>' />
                                <label class="desc" >
                                    <?php echo $this->lang->line('txt_smtp_email_receiver')?>
                                </label>
                                   <input name='config[_smtp_receiver_]' type="text" class="full" value='<?php echo config('_smtp_receiver_'); ?>' />
                            </div>
                            <div class="tab1 tabcontent ui-corner-all">
                                 <label class="desc">Gmail</label>
                                   <input name='config[_gmail_]' type="text" class="full" value='<?php echo config('_gmail_'); ?>'/>
                                <label class="desc" >Password</label>
                                   <input name='config[_password_]' type="text" class="full" value='<?php echo config('_password_'); ?>'/>
                                <label class="desc">Profile ID</label>
                                   <input name='config[_profileID_]' type="text" class="full" value='<?php echo config('_profileID_'); ?>'/>
                                <label class="desc" >Tracking Code</label>
                                   <textarea name='config[_tracking_code_]' class="full" rows="10"><?php echo config('_tracking_code_'); ?></textarea>
                            </div>
                            <div class="tab2 tabcontent ui-corner-all">
                                <label class="desc">Google Map</label>
                                   <textarea name='config[_google_map_]' class="full" rows="10"><?php echo config('_google_map_'); ?></textarea>
                                <label class="desc" >Địa chỉ</label>
                                   <textarea name='config[_address_]' class="full" rows="7"><?php echo config('_address_'); ?></textarea>
                            </div>
                </div>
          
            <div class="widget none">
                <div class="whead">
                    <div class="block-left control">
                    </div>
                    <div class="block-right control">
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                abcd
                <div class="fg-toolbar tableFooter">
                    <input type="submit" name="cmdAdd" value="Lưu" id="cmdAdd" class="button " />
                    <input type="submit" name="cmdAdd" value="Áp dụng" id="cmdAdd" class="button " />
                    <input type="submit" name="cmdDel" value="Hủy" id="cmdDel" class="button " />
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </form>
</div>
<div class="clearfix"></div>