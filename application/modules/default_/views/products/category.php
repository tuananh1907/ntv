<!-- main start -->
    <div id="main" class="clearfix">
                <!-- content start -->
        <div id="content" class="con">
           
            <h3><?php echo $category['category_title']?></h3>
           
            <ul class="pageListTop <?php echo ($pages > 1) ? '':'hide'; ?>">            
                <?php
                for($i = 1; $i <=$pages; $i++) {
                    if( $i == $current_page ) {
                    ?>
                    <li><?php echo $i?></li>
                    <?php    
                    }else{
                ?>
                    <li><a href="?p=<?php echo $i?>"><?php echo $i?></a></li>
                <?php
                    }
                }
                ?>
                    <?php 
                    if($current_page < $pages && $pages > 1) {
                    ?>
                    <li><a href="?p=<?php echo $current_page+1;?>">&gt;</a></li>
                    <?php 
                    }
                    ?>
            </ul>
            <div class="section">
                <ul class="list_products biggerlink">
                    <?php
                    foreach($products as $ps) {
                            $pc = resize($ps['post_featured_image'], 'pc_', array(175, 130));
                            $pc = substr($pc, 1);
                            $sp = resize($ps['post_featured_image'], 'sp_', array(292, 220));
                            $sp = substr($sp, 1);
                    ?>
                    <li>
                        <img src="<?php echo $pc ?>" alt="<?php echo $ps['post_seo_title']?>" class="hide-sp" /> 
                        <img src="<?php echo $sp ?>" alt="<?php echo $ps['post_seo_title']?>" class="hide-pc" /> 
                        <a href="<?php short_url('product', array($ps['alias_name']) );?>">
                            <?php echo $ps['post_title']?>
                        </a> 
                    </li>
                    <?php }?>
                </ul>
            </div>
            <ul class="pageListBtm hide-pc <?php echo ($pages > 1) ? '':'hide'; ?>">

                <?php 
                if($current_page > 1) {
                ?>
                <li><a href="?p=<?php echo $current_page-1;?>">&lt; <?php echo $this->lang->line('txt_prev');?></a></li>
                <?php }?>

                <?php
                for($i = 1; $i <=$pages; $i++) {
                    if( $i == $current_page ) {
                    ?>
                        <li><?php echo $i?></li>
                    <?php    
                    }else{
                ?>
                        <li><a href="?p=<?php echo $i?>"><?php echo $i?></a></li>
                <?php
                    }
                }
                ?>

                <?php 
                if($current_page < $pages) {
                ?>
                <li><a href="?p=<?php echo $current_page+1;?>"><?php echo $this->lang->line('txt_next');?> &gt;</a></li>
                <?php }?>
                
            </ul>
        </div>
        <!-- content end -->