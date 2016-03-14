<div class="slide">
    <img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/img2.jpg">
</div>

<div class="clearfix"></div>

<div class="content">
    <div class="container">
        <div class="ntv-pagination">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><p>Sắt thép</p></div>
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
                    <li><a href="#">Sản phẩm - </a></li>
                    <li class='last'><span>Sắt thép</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-3 content-left">
            <div class="block-left">
                <div class='heading list'><p>Danh mục thép</p> <span class='se'></span></div>
                <ul class='menu-list'>
                    <?php
                    foreach ($categories as $c) {
                        ?>
                        <li>
                            <a href="<?php short_url('category-item', array($c['alias_name'])) ?>"><?php echo $c['category_title'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="block-left">
                <div class='heading'><p>Theo hình dạng</p> <span class='se'></span></div>
                <div class="col-lg-6 tag-area">
                    <ul class='tag'>
                        <li><label></label><a href="#">Thép ống</a></li>
                        <li><label></label><a href="#">Ống chữ nhật</a></li>
                        <li><label></label><a href="#">Thép ống</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 tag-area">
                    <ul class='tag'>
                        <li><label></label><a href="#">Thép ống</a></li>
                        <li class='active'><label></label><a href="#">Thép ống</a></li>
                        <li><label></label><a href="#">Thép ống</a></li>
                    </ul>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="block-left">
                <div class='heading'><p>Theo nhãn hiệu</p> <span class='se'></span></div>
                <div class="col-lg-12 tag-area">
                    <ul class='tag'>
                        <li><label></label><a href="#">Thép ống</a></li>
                        <li><label></label><a href="#">Thép ống</a></li>
                        <li><label></label><a href="#">Thép ống</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-9 content-right">

            <div class="content-right-top">
                <div class='pull-left'>Trang 1 của 10 <strong>(112 sản phẩm)</strong></div>
                <div class="pull-right show-product">
                    <div class="show">xem</div>

                    <div class="squard">
                        <label class='range-choosen'>12</label>

                        <div class="down"></div>
                        <ul class='range'>
                            <li>12</li>
                            <li>13</li>
                        </ul>
                    </div>
                    <div>sản phẩm / trang</div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="content-right-center product">

                <?php
                foreach ($posts as $ps) { ?>
                    <div class="col-lg-4 p">
                        <div class='p-item-img'>
                            <img src="<?php echo $ps['post_featured_image'] ?>" class='img-responsive' alt=""/>
                            <a href="<?php short_url('product-item', array($ps['alias_name'])) ?>">
                                <div class='bg'>
                                    <div class='bg-center'></div>
                                </div>
                            </a>
                        </div>
                        <p>
                            <a href="<?php short_url('product-item', array($ps['alias_name'])) ?>"><?php echo $ps['post_title'] ?></a>
                        </p>
                    </div>
                <?php } ?>



                <div class="clearfix"></div>
                <div class="se"></div>
            </div>


            <!--pagination-->
            <div class="col-lg-12 pagination-area">
                <ul class="pull-right n-pagination">
                    <a href="?p=<?php echo $current_page > 1 ? $current_page - 1 : 1 ?>">
                        <li class="prev"></li>
                    </a>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) { ?>
                        <a href="?p=<?php echo $i ?>">
                            <li class="<?php echo $current_page == $i ? 'active' : '' ?>"><?php echo $i ?></li>
                        </a>
                    <?php } ?>
                    <li>...</li>
                    <a href="?p=<?php echo $current_page == $pages ? $pages : $current_page + 1 ?>">
                        <li class="next"></li>
                    </a>

                </ul>
            </div>
            <!--pagination-->
        </div>

    </div>
</div>