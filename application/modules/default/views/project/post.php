<div class="slide">
    <img class='img-responsive' src="images/img2.jpg">
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
                    foreach($categories as $cs) {
                    ?>
                    <li><a href="<?php short_url('project-category-item', array($cs['alias_name']))?>"><?php echo $cs['category_title']?></a></li>
                    <?php }?>

                </ul>
            </div>
        </div>

        <div class="col-lg-9 content-right">
            <div class="about">
                <div class="about-label"><?php echo $post['post_title']?></div>
                <div class='about-content'>
                    <?php if(!empty($post['post_featured_image'])) {?>
                    <img src="<?php echo $post['post_featured_image']?>" alt="" />
                    <?php }?>
                    <div class="clearfix"></div>
                    <div>
                        <?php echo $post['post_content']?>
                    </div>
                </div>
            </div>

            <div class="row detail-label-title">
                <div class="col-lg-4 left">
                    <div class="d-l-se"></div>
                </div>
                <div class="col-lg-4"><span><?php echo $category['category_title']?></span></div>
                <div class="col-lg-4 right">
                    <div class="d-l-se"></div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="jcarousel">
                    <?php
                    foreach($posts_category as $psc) {
                    ?>
                    <ul>
                        <li>
                            <div>
                                <?php if( !empty($pcs['post_featured_title']) ) {?>
                                <a href="<?php short_url('project-category-item', array($psc['alias_name']))?>"><img class='img-responsive' src="<?php echo $psc['post_featured_title']?>" alt="" /></a>
                                <?php }?>
                            </div>
                            <p><a href="<?php short_url('project-item', array($psc['alias_name']))?>"><?php echo $psc['post_title']?></a></p>
                        </li>


                    </ul>
                    <?php }?>


                </div>
                <div class="clearfix"></div>
                <ul class='jcarousel-control'>
                    <li><a href="#" class="jcarousel-control-prev"></a></li>
                    <li><a href="#" class="jcarousel-control-next"></a></li>
                </ul>
            </div>
        </div>

    </div>
</div>