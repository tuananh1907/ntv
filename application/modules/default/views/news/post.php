<div class="slide">
    <img class='img-responsive' src="images/img2.jpg">
</div>

<div class="clearfix"></div>

<div class="content">
    <div class="container">
        <div class="ntv-pagination">
            <div class="col-lg-3"><p>S?t thép</p></div>
            <div class="col-lg-5 p-l-c">
                <div class="l">
                    <div class="col-lg-1 line star"></div>
                    <div class="col-lg-10 line l-c"></div>
                    <div class="col-lg-1 line node"></div>
                </div>
            </div>
            <div class="col-lg-4 bc">
                <ul>
                    <li><a href="#">Trang ch? - </a></li>
                    <li><a href="#">S?n ph?m - </a></li>
                    <li class='last'><span>S?t thép</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="row tab">
                <div class="col-lg-6 tab-label-header">
                    <div class="tab-label tab-label-left active">
                        <a href="#">Tin t?c truy?n thông</a>
                        <div class="background news"></div>
                    </div>
                </div>

                <div class="col-lg-6 tab-label-header">
                    <div class="tab-label tab-label-right active">
                        <a href="#">Hình ?nh/ video</a>
                        <div class="background video"></div>
                    </div>
                </div>
            </div>



            <div class="row tab-panel tab-panel-1">
                <div class="row contact-label">
                    <?php echo $posts['post_title']?>
                </div>



                <div class="row panel-content">

                    <div class="date">Ngày ??ng: <?php echo date('d/m/y', $timestamp);?></div>
                    <div class="content">
                        <img src="<?php echo $posts['post_featured_image']?>" alt="" />
                        <?php echo $posts['post_content']?>
                    </div>
                    <div class="row detail-label-title">
                        <div class="col-lg-5 left">
                            <div class="d-l-se"></div>
                        </div>
                        <div class="col-lg-2"><span>Tin t?c khác</span></div>
                        <div class="col-lg-5 right">
                            <div class="d-l-se"></div>
                        </div>
                    </div>

                    <div class="row">
                        <!--item-->
                        <?php
                        for ($i = 0; $i <=2; $i++) {
                        ?>
                        <div class="col-lg-4 b-item">
                            <div class='b-img'><img class='img-responsive' src="<?php echo $new_posts[$i]['post_featured_image']?>" alt="" />
                                <div class="b-date">
                                    <span><?php echo date('d', $timestamp)?></span>
                                    <div><?php echo date('m/y', $timestamp)?></div>
                                </div>
                            </div>
                            <p class='title'><?php echo $new_posts[$i]['post_title']?></p>
                            <p class='description'><?php echo $new_posts[$i]['post_description']?></p>
                            <a class='d' href="<?php short_url('news-item', array($new_posts[$i]['alias_name']) )?>">Chi ti?t</a>
                        </div>
                        <?php }?>
                        <!--item-->
                    </div>
                </div>


            </div>



        </div>

    </div>
</div>