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
                    <li><a href="#"><?php echo $page['post_title']?> - </a></li>
                    <li class='last'><span>Sắt thép</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row tab">

            <div class="col-lg-4 tab-label-header">
                <div class="tab-label tab-label-left">
                    <a href="<?php short_url('library')?>">Thư viện hình ảnh</a>
                    <div class="background">
                        <div class="icon photo"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 tab-label-header">
                <div class="tab-label tab-label-center ">
                    <a href="<?php short_url('video')?>">Thư viện Video</a>
                    <div class="background">
                        <div class="icon video"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 tab-label-header">
                <div class="tab-label tab-label-right active">
                    <a href="#">Catalogue sản phẩm</a>
                    <div class="background">
                        <div class="icon pdf"></div>
                    </div>
                </div>
            </div>

        </div>



        <div class="row tab-panel tab-panel-1">
            <div class="row contact-label">
                Catalogue Sản phẩm
            </div>

            <div class="col-lg-12 panel-content">
                <div class="col-lg-6 catalogue st">
                    <p>Catalogue</p>
                    <div>Săt thép</div>
                </div>
                <div class="col-lg-6 catalogue gs">
                    <p>Catalogue</p>
                    <div>Gốm sứ</div>
                </div>
            </div>


        </div>
    </div>
</div>