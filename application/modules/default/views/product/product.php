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
        <div class="col-lg-3 content-left">
            <div class="block-left">
                <div class='heading list'><p>Danh m?c thép</p> <span class='se'></span></div>
                <ul class='menu-list'>
                    <?php foreach( $categories as $cs ) {?>
                    <li><a href="#"><?php echo $cs['category_title']?></a></li>
                    <?php }?>

                </ul>
            </div>

            <div class="block-left">
                <div class='heading'><p>Theo hình d?ng</p> <span class='se'></span></div>
                <div class="col-lg-6 tag-area">
                    <ul class='tag'>
                        <li><label></label><a href="#">Thép ?ng</a></li>
                        <li><label></label><a href="#">?ng ch? nh?t</a></li>
                        <li><label></label><a href="#">Thép ?ng</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 tag-area">
                    <ul class='tag'>
                        <li><label></label><a href="#">Thép ?ng</a></li>
                        <li class='active'><label></label><a href="#">Thép ?ng</a></li>
                        <li><label></label><a href="#">Thép ?ng</a></li>
                    </ul>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="block-left">
                <div class='heading'><p>Theo nhãn hi?u</p> <span class='se'></span></div>
                <div class="col-lg-12 tag-area">
                    <ul class='tag'>
                        <li><label></label><a href="#">Thép ?ng</a></li>
                        <li><label></label><a href="#">Thép ?ng</a></li>
                        <li><label></label><a href="#">Thép ?ng</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-9 content-right">


            <div class="content-right-center detail">
                <div class="col-lg-6 gallery">
                    <div class="col-lg-12"><img class='img-responsive' src="images/d-i-1.jpg"></div>
                    <div class="col-lg-3"><img class='img-responsive' src="images/d-i-t-1.jpg"></div>
                    <div class="col-lg-3"><img class='img-responsive' src="images/d-i-t-2.jpg"></div>
                    <div class="col-lg-3"><img class='img-responsive' src="images/d-i-t-3.jpg"></div>
                    <div class="col-lg-3"><img class='img-responsive' src="images/d-i-t-4.jpg"></div>
                </div>
                <div class="col-lg-6 no-padding-right">
                    <p class='detail-title'><?php echo $post['post_title']?></p>
                    <div class="detail-description">
                        <?php echo $post['post_description']?>
                    </div>

                    <div class='tech'>Thông s? k? thu?t <div class='d-se'></div></div>
                    <ul class='tech-list'>
                        <li>We are aiming to provide high</li>
                        <li>We are aiming to provide high</li>
                        <li>We are aiming to provide high</li>
                    </ul>

                    <div class='tech'>Tài li?u chi ti?t k? thu?t <div class='d-se'></div></div>
                    <div><a href="#"><img src="images/file.png"></a></div>
                </div>
                <div class="col-lg-12 no-padding-right">
                    <div class='tech'>Thông tin thêm <div class='d-se'></div></div>
                    <div class="description">
                        <?php echo $post['post_content']?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row detail-label-title">
                <div class="col-lg-4 left">
                    <div class="d-l-se"></div>
                </div>
                <div class="col-lg-4"><span>S?n ph?m cùng lo?i</span></div>
                <div class="col-lg-4 right">
                    <div class="d-l-se"></div>
                </div>
            </div>
        </div>

    </div>
</div>