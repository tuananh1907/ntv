<!-- js carousel responsive BEGIN -->
<link  href="<?php echo DEFAULT_CSS_PATH ?>/slick.css" rel="stylesheet" type="text/css" />
<script charset="UTF-8" src="<?php echo DEFAULT_JS_PATH ?>/slick.min.js" type="text/javascript"></script>
<script charset="UTF-8" src="<?php echo DEFAULT_JS_PATH ?>/slick_fn.js" type="text/javascript"></script>
<!-- js carousel responsive END -->
<!-- main start -->
    <div id="main" class="clearfix">
        <!-- content start -->
        <div id="content" class="con">
            <h3><?php echo $product['post_title']?></h3>
            <div class="section">
                <p class="img_visual"><img src="<?php echo $product['post_featured_image']?>" alt="<?php echo $product['post_seo_title']?>" /></p>
            </div>
            <h4><?php echo $this->lang->line('txt_detail');?></h4>
            <div class="section">
                <div><?php echo $product['post_content']?></div>
            </div>
            <h4><?php echo $this->lang->line('txt_related');?></h4>
            <div class="section">
                <ul class="slick list_detail">
                    <?php 
                    $LENGTH = count($related_products);
                    for( $i = 0; $i<$LENGTH; $i++ ) {
                        if($related_products[$i]['post_id'] != $product['post_id']) {
                    ?>
                    <li><a href="<?php short_url('product', array($related_products[$i]['alias_name']) );?>">
                            <img src="<?php echo $related_products[$i]['post_featured_image']?>" alt="<?php echo $related_products[$i]['post_seo_title']?>" />
                            <span><?php echo $related_products[$i]['post_title']?></span>
                        </a>
                    </li>
                    <?php 
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- content end -->