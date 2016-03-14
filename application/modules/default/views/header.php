<?php
$count = count($menu_list);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title><?php echo $seo_title; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_CSS_PATH; ?>/reset.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_CSS_PATH; ?>/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_CSS_PATH; ?>/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_CSS_PATH; ?>/jcarousel.responsive.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_CSS_PATH; ?>/font-awesome/css/font-awesome.css"/>

    <script src="<?php echo DEFAULT_JS_PATH; ?>/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src='<?php echo DEFAULT_JS_PATH; ?>/bootstrap.min.js'></script>
    <script type="text/javascript" src="<?php echo DEFAULT_JS_PATH; ?>/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="<?php echo DEFAULT_JS_PATH; ?>/jcarousel.responsive.js"></script>
    <script type="text/javascript" src="<?php echo DEFAULT_JS_PATH; ?>/custom.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>/jquery.validate.js"></script>
    <script type="text/javascript" src='<?php echo DEFAULT_JS_PATH; ?>/bootstrap.youtubepopup.min.js'></script>
</head>
<body>
<!--header-->
<div class='header'>
    <div class="container">
        <div class="block-top language col-lg-5 col-md-5 pull-left">
            <span class='hidden-xs'>Ngôn ngữ :</span>
            <a href="#" id="eng"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/eng.png"/></a>
            <a href="#" id="viet"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/viet.png"/></a>
        </div>
        <div class="block-top hotline col-lg-5 col-md-5 pull-right">
            <div class='pull-right'>
                <i class="phone-hotline"></i>
                <span><span class="hidden-xs">HOTLINE:</span>  <strong>08 383456789</strong></span>
            </div>
        </div>


        <div class="nav-block nav-left col-lg-5 col-md-6 pull-left hidden-xs hidden-sm">
            <div class="nav-block-t pull-left">
                <!--menu left-->

                <ul>
                    <?php for ($i = 0; $i <= 3; $i++) { ?>
                        <?php if ($menu_list[$i]['post_module'] == 'index') { ?>
                            <li class="first"><a href="<?php short_url('index') ?>"><i class="fa fa-home fa-lg"></i></a>
                            </li>
                        <?php
                        } else { ?>
                            <li>
                                <a href="<?php short_url($menu_list[$i]['post_module'], array()) ?>"><?php echo $menu_list[$i]['post_title'] ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>

            </div>
        </div>

        <h1 class="logo"></h1>

        <div class="nav-block nav-right col-lg-5 col-md-6 pull-right hidden-xs hidden-sm">
            <div class='search pull-right'><a href="#"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/s.png"></a></div>
            <div class="nav-block-t pull-right">
                <!--menu right-->
                <ul>
                    <?php
                    for ($i = 4; $i < $count; $i++) {
                        ?>
                        <li>
                            <a href="<?php short_url($menu_list[$i]['post_module']) ?>"><?php echo $menu_list[$i]['post_title'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--//header-->