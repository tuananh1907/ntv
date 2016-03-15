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
                    <li><a href="#">Trang chủ - </a></li>
<!--                    <li><a href="#">--><?php //echo $page['post_title']?><!-- - </a></li>-->
                    <li class='last'><span><?php echo $page['post_title']?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="row tab">
                <div class="col-lg-6 tab-label-header">
                    <div class="tab-label tab-label-left active">
                        <a href="#">Tin tức truyền thông</a>
                        <div class="background news"></div>
                    </div>
                </div>

                <div class="col-lg-6 tab-label-header">
                    <div class="tab-label tab-label-right active">
                        <a href="#">Hình ảnh/ video</a>
                        <div class="background video"></div>
                    </div>
                </div>
            </div>



            <div class="row tab-panel tab-panel-1">
                <div class="row contact-label">
                    Tin tức truyền thông
                </div>

                <div class="row panel-content">
                    <!--item-->
                    <?php
                    foreach($news as $n) {?>
                    <div class="col-lg-4 b-item">

                        <div class='b-img'><img class='img-responsive' src="<?php echo $n['post_featured_image']?>" alt="" />
                            <div class="b-date">
                                <span><?php echo date('d', $timestamp);?></span>
                                <div><?php echo date('m/Y',$timestamp);?></div>
                            </div>
                        </div>
                        <p class='title'><?php echo $n['post_title']?></p>
                        <p class='description'><?php echo $n['post_description']?></p>
                        <a class='d' href="<?php short_url('news-item', array($n['alias_name']) )?>">Chi tiết</a>

                    </div>
                    <?php }?>
                    <!--item-->
                </div>

                <div class="row">
                    <!--pagination-->
                    <div class="col-lg-12 pagination-area-center">
                        <ul class="pull-right n-pagination">
                            <a href="?p=<?php echo $current_page == 1 ? $current_page : "$current_page-1"?>">
                                <li class="prev"></li>
                            </a>
                            <?php
                            for($i = 1; $i <= $pages; $i++) {
                            ?>
                                <a href="?p=<?php echo $i ?>"><li class="<?php echo $current_page == $i ? 'active' : '' ?>"><?php echo $i?></li></a>
                            <?php }?>

                            <li>...</li>
                            <a href="?p=<?php echo $current_page == $pages ? $pages : $current_page+1 ?>"><li class="next"></li></a>

                        </ul>
                    </div>
                    <!--pagination-->
                </div>
            </div>



        </div>

    </div>
</div>