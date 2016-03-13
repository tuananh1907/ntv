<?php //$template['title'] ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= ADMIN_IMAGE_PATH ?>/favicon.ico">
    <title><?= WEBSITE ?> | <?= $template['title']?></title>

    <link href="<?= ADMIN_CSS_PATH ?>/style.css" rel="stylesheet" media="all" />
    <link href="<?= ADMIN_CSS_PATH ?>/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" media="all" />

    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/tooltip.js"></script>
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/custom.js"></script>
    
    
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/jquery.validate.js"></script>
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/jquery.easy-confirm-dialog.js"></script>

    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/ckeditor/ckeditor.js"></script>

    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/admin.js"></script>
    
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/plugins.js"></script>
    <!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	<script src="js/pngfix.js"></script>
	<script>
	  /* EXAMPLE */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');
	</script>
	<![endif]-->
    <!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->

    <script type="text/javascript">
		var WEBROOT = '';
		var CONFIRM_DELETE_MSG = '<?php echo $this->lang->line('confirm_delete_msg');?>';
        var CONFIRM_TITLE_DIALOG= '<?php echo $this->lang->line('confirm_title_dialog');?>';
		var CONFIRM_DELETE_ALL = '<?php echo $this->lang->line('confirm_delete_all_msg');?>';
		var DIALOG_TITLE = '<?php echo $this->lang->line('dialog_title');?>';
		var DIALOG_TITLE_CLOSE = '<?php echo $this->lang->line('dialog_close');?>';
		var BTN_DIALOG_OK = '<?php echo $this->lang->line('dialog_ok');?>';
		var BTN_DIALOG_CANCEL = '<?php echo $this->lang->line('dialog_cancel');?>';
		var TTL_GOTOTOP = '';
		var MENUNAME = '';

        var VALIDATE_REQUIRED = '<?php echo $this->lang->line('error_required');?>';
        var VALIDATE_MINLENGTH = '<?php echo $this->lang->line('error_minlength');?>';
        var VALIDATE_EMAIL = '<?php echo $this->lang->line('error_email');?>';
        var VALIDATE_EQUALTO = '<?php echo $this->lang->line('error_equalto');?>';

        var VALIDATE_TITLE = '<?php echo $this->lang->line('txt_input_title');?>';
        var VALIDATE_ALIAS = '<?php echo $this->lang->line('txt_input_alias');?>';
        var VALIDATE_PAGE = '<?php echo $this->lang->line('txt_input_page');?>';

	</script>
</head>
<div id="header">
       <div id="top-menu">
            <div class="block-left logo"><img src="<?= ADMIN_IMAGE_PATH ?>/logo.png" /></div>
             <div class="float-right">
                <a id="viewwebsite" class="radius2 right-item" href ="/#" target='_blank' title="Website">Website</a>
                 <div id="userPanel" class="headercolumn block-right">
                <a href="" class="userinfo radius2">
                    <img src="<?= ADMIN_IMAGE_PATH ?>/avatar.png" alt="" class="radius2">
                    <span><strong><?php echo $user_entity['fullname'];?></strong></span> </a>
                <div class="userdrop" style="width: 151px;">
                    <ul>
                        <li><a href="/admin/user/edit?userid=<?php echo $user_entity['user_id'];?>"><?php echo $this->lang->line("txt_profile"); ?></a></li>
                        <li><a href="/admin/user/password?userid=<?php echo $user_entity['user_id'];?>"><?php echo $this->lang->line("txt_change_password"); ?></a></li>
                        <li><a href="/admin/login/logout"><?php echo $this->lang->line("txt_logout"); ?></a></li>
                    </ul>
                </div>
                <!--userdrop-->
            </div>
            </div>
        </div>
        <div id="smoothmenu1" class="ddsmoothmenu">
            <ul id="navigation" class="sf-navbar">
                <?php
                foreach($module_list as $m) {
                    $pid = $m['module_parent'];
                    if( ( check_permission($m['module_code'], VIEW) ) ) {
                ?>
                    <li>
                        <a href="<?php echo ($m['module_link'] =='/#')?'javascript:;':$m['module_link'] ; ?>"><?php echo $m['module_name']; ?></a>
                        <?php 
                        if( count($m['children']) > 0) {
                        ?>
                        <ul>
                            <?php 
                            foreach($m['children'] as $c) {
                                if( ( check_permission($c['module_code'], VIEW) ) ) {
                            ?>
                            <li>
                                <a href="<?php echo $c['module_link']; ?>"><?php echo $c['module_name']; ?></a>
                            </li>
                            <?php 
                                }
                            }
                            ?>
                        </ul>
                        <?php 
                        }
                        ?>
                    </li>
                <?php 
                    }
                }
                ?>
            </ul>
        </div>
    </div>