<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?= $template['title']?></title>

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
    
    <script type="text/javascript" src="<?= ADMIN_JS_PATH ?>/admin.js"></script>
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
        var CONFIRM_DELETE_MSG = 'Ban co muon xoa';
        var CONFIRM_TITLE_DIALOG= 'Xác nhận';
        /*CONFIRM_EXTEND = '';
        CONFIRM_MAILINFO = '';
        CONFIRM_MAILEXTEND = '';*/
        var CONFIRM_DELETE_ALL = '';
        var DIALOG_TITLE = 'Thông báo';
        var DIALOG_TITLE_CLOSE = 'Dong lai';
        var BTN_DIALOG_OK = 'Tiep tuc';
        var BTN_DIALOG_CANCEL = 'thoi';
        var TTL_GOTOTOP = '';
        var MENUNAME = '';

        var VALIDATE_REQUIRED = '<?php echo $this->lang->line('error_required');?>';
        var VALIDATE_MINLENGTH = '<?php echo $this->lang->line('error_minlength');?>';
        var VALIDATE_EMAIL = '<?php echo $this->lang->line('error_email');?>';
        var VALIDATE_EQUALTO = '<?php echo $this->lang->line('error_equalto');?>';

    </script>
</head>
<div id="header">
       <div id="top-menu">
            <div class="block-left logo"><img src="<?= ADMIN_IMAGE_PATH ?>/logo.png" /></div>
             <div class="float-right">
              <dl id="sample" class="dropdown right-item ">
                    <dt><a class="radius2" href="#"><span>Việt Nam</span></a></dt>
                    <dd>
                        <ul>
                            <li><a href="#">Việt Nam<span class="value">VN</span></a></li>
                            <li><a href="#">English<span class="value">EN</span></a></li>
                        </ul>
                    </dd>
                </dl>
                <a id="viewwebsite" class="radius2 right-item" href ="#" title="Website">Website</a>
                 <div id="userPanel" class="headercolumn block-right">
                <a href="" class="userinfo radius2">
                    <img src="<?= ADMIN_IMAGE_PATH ?>/avatar.png" alt="" class="radius2">
                    <span><strong>Administrator</strong></span> </a>
                <div class="userdrop" style="width: 151px;">
                    <ul>
                        <li><a href="">Profile</a></li>
                        <li><a href="">Account Settings</a></li>
                        <li><a href="index.html">Logout</a></li>
                    </ul>
                </div>
                <!--userdrop-->
            </div>
            </div>
        </div>
        <div id="smoothmenu1" class="ddsmoothmenu">
            <ul id="navigation" class="sf-navbar">
                <li><a href="/index.php/install/language">Language</a></li>
            </ul>
        </div>
    </div>