
<div class="slide">
    <?php

    if( !empty($page['post_featured_image']) ) {
    ?>
    <img class='img-responsive' src="<?php echo $page['post_featured_image']; ?>">
    <?php
    }
    ?>
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
                    <li class='last'><span><?php echo $page['post_title']?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-3 content-left">
            <div class="block-left">
                <div class='heading list'><p><?php echo $this->lang->line('category_about_us');?></p> <span class='se'></span></div>
                <ul class='menu-list'>
                    <?php
                    foreach($about_list as $ab) {
                    ?>
                    <li class="<?php echo $ab['post_title'] == $post['post_title'] ? 'active' : ''?>""><a href="<?php short_url('about-item', array($ab['alias_name']) ); ?>"><?php echo $ab['post_title']?></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>

        <div class="col-lg-9 content-right">
            <div class="about">
                <div class="about-label"><?php echo isset($post['post_title']) ? $post['post_title'] : ''?></div>
                <div class='about-content'>
                    <?php echo isset($post['post_content']) ? $post['post_content'] : ''?>
                </div>
            </div>
        </div>

    </div>
</div>