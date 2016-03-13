<div class="slide">
    <img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/img2.jpg">
</div>

<div class="clearfix"></div>

<div class="content">
    <div class="container">
        <div class="ntv-pagination">
            <div class="col-lg-3"><p>Sắt thép</p></div>
            <div class="col-lg-5 p-l-c">
                <div class="l">
                    <div class="col-lg-1 line star"></div>
                    <div class="col-lg-10 line l-c"></div>
                    <div class="col-lg-1 line node"></div>
                </div>
            </div>
            <div class="col-lg-4 bc">
                <ul>
                    <li><a href="#">Trang chủ - </a></li>
                    <li><a href="#">Sản phẩm - </a></li>
                    <li class='last'><span>Sắt thép</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-3 content-left">
            <div class="block-left">
                <div class='heading list'><p>Danh mục giới thiệu</p> <span class='se'></span></div>
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