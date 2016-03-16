<div class="slide">
    <?php

    if (!empty($page['post_featured_image'])) {
    ?>
    <img class='img-responsive' src="<?php echo $page['post_featured_image'];?>">
    <?php } ?>
</div>

<div class="clearfix"></div>

<div class="content">
    <div class="container">
        <div class="ntv-pagination">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><p><?php echo $page['post_title']?></p></div>
            <div class="col-lg-5 col-md-5 visible-md visible-lg p-l-c">
                <div class="l">
                    <div class="col-lg-1 col-md-1 col-sm-1 line star"></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 line l-c"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 line node"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 hidden-xs bc">
                <ul>
                    <li><a href="#"><?php echo $this->lang->line('homepage');?> - </a></li>
                    <!--<li><a href="#"><?php /*echo $page['post_title']*/?> - </a></li>-->
                    <li class='last'><span><?php echo $page['post_title']?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-3 content-left">
            <div class="block-left">
                <div class='heading list'><p><?php echo $this->lang->line('category_project');?></p> <span class='se'></span></div>
                <ul class='menu-list'>
                    <?php

                    foreach ($categories as $cs) {
                        ?>
                        <li class="<?php echo isset($category['category_id']) && $cs['category_id'] == $category['category_id'] ? 'active' : ''?>"><a
                                href="<?php short_url('projectcat-item', array($cs['alias_name'])) ?>"><?php echo $cs['category_title'] ?></a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>

        <div class="col-lg-9 content-right">
            <div class="content-right-top">
                <div class='hidden-xs pull-left'><?php echo $this->lang->line('page');?> <?php echo $current_page?> <?php echo $this->lang->line('of');?> <?php echo $pages?> <strong>(<?php echo $count?> <?php echo $this->lang->line('product');?>)</strong></div>
                <div class="visible-xs pull-left"><?php echo $current_page?>/<?php echo $pages?></div>
                <div class="pull-right show-product">
                    <div class="hidden-xs show"><?php echo $this->lang->line('show');?></div>

                    <div class="squard">
                        <label class='range-choosen'>12</label>
                        <div class="down"></div>
                        <ul class='range'>
                            <li>12</li>
                            <li>13</li>
                        </ul>
                    </div>
                    <div class="hidden-xs"><?php echo $this->lang->line('product');?> / <?php echo $this->lang->line('page');?></div>
                </div>
            </div>

            <div class="content-right-center">
                <!--item-->
                <?php foreach ($posts as $ps) { ?>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 p-item">
                        <div class="p-item-img">
                            <?php
                            if (!empty($ps['post_featured_image'])) {
                            ?>
                            <img class='img-responsive' src="<?php echo $ps['post_featured_image']?>" alt=""/>
                            <?php }?>

                            <a href="<?php short_url('project-item', array($ps['alias_name'])) ?>">
                                <div class='bg'>
                                    <div class='bg-center'></div>
                                </div>
                            </a>
                        </div>
                        <p>
                            <a href="<?php short_url('project-item', array($ps['alias_name'])) ?>"><?php echo $ps['post_title'] ?></a>
                        </p>
                    </div>
                <?php } ?>
                <!--//item-->


                <div class="clearfix"></div>
                <div class="se"></div>
            </div>


            <!--pagination-->
            <div class="col-lg-12 pagination-area">
                <ul class="pull-right n-pagination">
                    <a href="?p=<?php echo $current_page == 1 ? 1 : $current_page - 1 ?>">
                        <li class="prev"></li>
                    </a>
                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
                        <a href="?p=<?php echo $i ?>">
                            <li class="<?php echo $current_page == $i ? 'active' : '' ?>"><?php echo $i ?></li>
                        </a>
                    <?php } ?>

                    <li>...</li>
                    <a href="?p=<?php echo $current_page == $pages ? $current_page : $current_page + 1 ?>">
                        <li class="next"></li>
                    </a>

                </ul>
            </div>
            <!--pagination-->
        </div>

    </div>
</div>