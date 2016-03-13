<?php
$class = $this->router->fetch_class();
?>
<!-- navi start -->
        <div id="navi" class="clearfix">
            <ul class="nav01">
                <?php
                foreach ($menu_list['current'] as $key => $m) {
                    $c =  ($class == $m['post_module']) ? 'atv' : '';
                    if($m['post_module']!='about' && $m['post_module'] !='product')  {                 
                ?>
                    <li class='<?php echo $c; ?>'><a href="<?php short_url($m['post_module']); ?>"><?php echo $m['post_title']?><span><?php echo $menu_list['sub'][$key]['post_title']?></span></a></li>
                <?php 
                    //menu about
                    }elseif($m['post_module'] == 'about') {
                ?>   
                    <li class="sub <?php echo $c; ?>"><a href="javascript:;"><?php echo $m['post_title']?><span><?php echo $menu_list['sub'][$key]['post_title']?></span></a>
                    <ul class="sublink">
                        <?php
                        foreach($about_list as $al) {
                        ?>
                            <li><a href="<?php short_url('about', array($al['alias_name'])); ?>"><?php echo $al['post_title']?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php
                    //menu product
                    }elseif($m['post_module'] == 'product') {
                        $c =  ($class == 'products') ? 'atv' : '';
                ?>
                    <li class="sub <?php echo $c; ?>"><a href="javascript:;"><?php echo $m['post_title']?><span><?php echo $menu_list['sub'][$key]['post_title']?></span></a>
                        <ul class="sublink">
                            <?php
                            foreach($products_list as $pl) {
                            ?>
                            <li><a href="<?php short_url('productcat', array($pl['alias_name'])); ?>"><?php echo $pl['category_title']?></a></li>
                            <?php }?>
                        </ul>
                    </li>
                <?php        
                    }
                }
                ?>
            </ul>
            <div class="navMap">
                <?php 
                echo ( isset( $config['_google_map_'])  ? $config['_google_map_'] : '');
                ?>
            </div>
            <?php 
                echo ( isset( $config['_address_'] )  ? $config['_address_'] : '');
            ?>
            <ul class="nav02">
                <?php
                foreach($ads as $r) {
                ?>
                    <li><a href="<?php echo ($r['a']) ? $r['a'] :'#' ; ?>"><img src="<?php echo $r['img']; ?>" alt="SMJ" /></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- navi end -->
    </div>
    <!-- main end -->