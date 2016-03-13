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
                    <?php } ?>

                </ul>
            </div>
        </div>

        <div class="col-lg-9 content-right">
            <div class="content-right-top">
                <div class='pull-left'>Trang 1 của 10 <strong>(112 sản phẩm)</strong></div>
                <div class="pull-right show-product">
                    <div class="show">xem</div>

                    <!--<label>12</label>-->
                    <div class="squard">
                        <div class="down"></div>
                        <ul class='range'>
                            <li>12</li>
                            <!--<li>13</li>-->
                        </ul>
                    </div>
                    <div>sản phẩm / trang</div>
                </div>
            </div>

            <div class="content-right-center">
                <!--item-->
                <?php foreach ($posts as $ps) {?>
                <div class="col-lg-6 p-item">
                    <div class="p-img">
                        <a href="#">
                            <img class='img-responsive' src="images/p2.jpg" alt="" />
                        </a>
                    </div>
                    <p><a href="<?php short_url('project-item', array($ps['alias_name']))?>"><?php echo $ps['post_title']?></a></p>
                </div>
                <?php } ?>
                <!--//item-->






                <div class="clearfix"></div>
                <div class="se"></div>
            </div>


            <!--pagination-->
            <div class="col-lg-12 pagination-area">
                <ul class="pull-right n-pagination">
                    <a href="?p=<?php echo $current_page == 1 ? 1 : $current_page-1?>"><li class="prev"></li></a>
                    <?php for($i = 1; $i <= $pages; $i++) { ?>
                        <a href="?p=<?php echo $i?>"><li class="<?php echo $current_page == $i ? 'active' : ''?>"><?php echo $i?></li></a>
                    <?php }?>

                    <li>...</li>
                    <a href="?p=<?php echo $current_page == $pages ? $current_page : $current_page+1?>"><li class="next"></li></a>

                </ul>
            </div>
            <!--pagination-->
        </div>

    </div>
</div>