<!-- main start -->
    <div id="main" class="clearfix">
        <!-- content start -->
        <div id="content" class="con">
            <h3><?php echo $page['post_title']?></h3>
            <div class="section">
                <div class="phoneBox treeview" id="navigation">
                    <ul>
                        <?php
                        foreach ($menu_list['current'] as $key => $m) {
                            $c =  ($key == 0) ? 'first' : ( ($key == count($menu_list['current']) - 1) ? 'last' : '');
                            if($m['post_module']!='about' && $m['post_module'] !='product')  {                 
                        ?>
                            <li class='<?php echo $c; ?>'><a href="<?php short_url($m['post_module']); ?>"><?php echo $m['post_title']?><span><?php echo $menu_list['sub'][$key]['post_title']?></span></a></li>
                        <?php 
                            //menu about
                            }elseif($m['post_module'] == 'about'){
                        ?>   
                            <li class="collapsable"><a href="javascript:;"><?php echo $m['post_title']?><span><?php echo $menu_list['sub'][$key]['post_title']?></span></a>
                            <ul>
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
                            }elseif($m['post_module'] == 'product'){
                        ?>
                            <li class="collapsable"><a href="javascript:;"><?php echo $m['post_title']?><span><?php echo $menu_list['sub'][$key]['post_title']?></span></a>
                                <ul>
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
                </div>
            </div>
        </div>
        <!-- content end -->