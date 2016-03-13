<div class="slide">
    <img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/slide.jpg">
</div>

<div class="clearfix"></div>

<div class="content">

    <div class="container">
        <div class="slogan">
            <div class="slogan-area">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 sa sa-l"><p>Nhật trường vinh</p></div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 sa sa-r"><p>Tin cậy - đồng hành - phát triển</p></div>
            </div>
            <div class="slogan-se"></div>
        </div>
    </div>


    <div class="container">
        <div class="category-intro">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ci c-left">
                <img src="<?php echo DEFAULT_IMAGE_PATH; ?>/st.jpg" class='img-responsive' alt="" />
                <div class="c-hover hidden-sm hidden-xs"></div>
                <div class='ci-title'>Sắt thép</div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ci c-right">
                <img src="<?php echo DEFAULT_IMAGE_PATH; ?>/gs.jpg" class='img-responsive' alt="" />
                <div class="c-hover hidden-sm hidden-xs"></div>
                <div class='ci-title'>Gốm sứ</div>
            </div>
        </div>
    </div>


    <div class="row product">
        <div class="container">
            <h3>Công trình tiêu biểu</h3>
            <div class="sp-lg">
                <div class="sp-lg-center"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="jcarousel">
            <ul>
                <!--item-->
                <?php
                    foreach($post_index as $pi) {
                        if($pi['post_highlight'] == 1) {
                 ?>
                <li>
                    <div class="carousel-item">
                        <div class='carousel-item-img'>
                            <img class='img-responsive' src="<?php echo $pi['post_featured_image']?>" alt="" />

                            <a href="<?php short_url('project-item', array($pi['alias_name']))?>"><div class="border"></div></a>
                            <div class="background"></div>
                        </div>
                        <p><a href=""><?php echo $pi['post_title']?></a></p>
                    </div>
                </li>
                            <?php } ?>
                <?php } ?>
                <!--//item-->

            </ul>
        </div>
        <div class="clearfix"></div>

        <ul class='jcarousel-control'>
            <li><a href="#" class="jcarousel-control-prev"></a></li>
            <li><a href="#" class="jcarousel-control-next"></a></li>
        </ul>


    </div>

    <div class="row client">
        <div class="container">
            <h3>Đối tác</h3>
            <div class="sp-sm">
                <div class="sp-sm-center"></div>
            </div>
        </div>


        <div class="container client-area">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 c"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/i1.jpg" alt="" /></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 c"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/i2.jpg" alt="" /></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 c"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/i3.jpg" alt="" /></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 c"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/i4.jpg" alt="" /></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 c"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/i5.jpg" alt="" /></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 c"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/i6.jpg" alt="" /></div>
        </div>
    </div>

</div>