<?php
$r = ceil( count($shape) /2 );
?>
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
                    <li><a href="#"><?php echo $this->lang->line('homepage');?> - </a></li>
                    <li><a href="#"><?php echo $page['post_title']?> - </a></li>
                    <li class='last'><span><?php echo $this->lang->line('iron_steel');?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-3 content-left">
            <div class="block-left">
                <div class='heading list'><p><?php echo $this->lang->line('cat_pro');?></p> <span class='se'></span></div>
                <ul class='menu-list'>
                    <?php foreach ($categories as $cs) { ?>
                        <li><a href="<?php short_url('productcat-item', array($cs['alias_name']))?>"><?php echo $cs['category_title'] ?></a></li>
                    <?php } ?>

                </ul>
            </div>

            <div class="block-left">
                <div class='heading'><p><?php echo $this->lang->line('shape');?></p> <span class='se'></span></div>
                <div class="col-lg-6 tag-area">
                    <ul class='tag'>
                        <?php
                        for($i=0; $i< $r; $i++) {
                            ?>
                            <li><label></label><a href="<?php echo $shape[$i]['tag_id']?>"><?php echo $shape[$i]['title']?></a></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="col-lg-6 tag-area">
                    <ul class='tag'>
                        <?php
                        for($i=$r; $i< count($shape); $i++) {
                            ?>
                            <li><label></label><a href="<?php echo $shape[$i]['tag_id']?>"><?php echo $shape[$i]['title']?></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="block-left">
                <div class='heading'><p><?php echo $this->lang->line('labels');?></p> <span class='se'></span></div>
                <div class="col-lg-12 tag-area">
                    <ul class='tag'>
                        <?php
                        foreach($brand as $b) {
                            ?>
                            <li><label></label><a href="<?php echo $b['tag_id']?>"><?php echo $b['title']?></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-9 content-right">


            <div class="content-right-center detail">
                <div class="col-lg-6 gallery">
                    <div class="col-lg-12"><img class='img-responsive' src="<?php echo $gallery[0]['img']?>"></div>
                    <?php
                    if ( !empty($gallery) ) {
                    foreach($gallery as $g) {?>
                    <div class="col-lg-3"><img class='img-responsive' src="<?php echo $g['img']?>"></div>
                    <?php } }?>
                </div>
                <div class="col-lg-6 no-padding-right">
                    <p class='detail-title'><?php echo $post['post_title'] ?></p>

                    <div class="detail-description">
                        <?php echo $post['post_description'] ?>
                    </div>

                    <div class='tech'>Thông số kĩ thuật <div class='d-se'></div></div>
                    <ul class='tech-list'>
                        <li>Bảng chủng loại ống công nghiệp tròn</li>
                        <li>Thông số mức độ chống rỉ sét</li>
                        <li>Thành phần hoá học của inox</li>
                    </ul>

                    <div class='tech'>Tài liệu chi tiết kĩ thuật <div class='d-se'></div></div>
                    <div><a href="#"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/file.png"></a></div>
                </div>
                <div class="col-lg-12 no-padding-right">
                    <div class='tech'>Thông tin thêm
                        <div class='d-se'></div>
                    </div>
                    <div class="description">
                        <?php echo $post['post_content'] ?>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row detail-label-title p-ex">
                <div class="col-lg-4 left">
                    <div class="d-l-se"></div>
                </div>
                <div class="col-lg-4"><span>Sản phẩm cùng loại</span></div>
                <div class="col-lg-4 right">
                    <div class="d-l-se"></div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="jcarousel jcarousel-3">
                    <ul>

                        <?php
                        foreach($posts_category as $pc) {?>

                        <!--item-->
                        <li>
                            <div class='p-item-img'>
                             <img class='img-responsive' src="<?php echo $pc['post_featured_image']?>" alt="" />

                                <a href="<?php short_url('product-item',array($pc['alias_name']))?>"><div class='bg'>
                                    <div class='bg-center'></div>
                                </div>
                                </a>
                            </div>
                            <p><a href="<?php short_url('product-item',array($pc['alias_name']))?>"><?php echo $pc['post_title']?></a></p>
                        </li>
                        <!--//item-->
                        <?php }?>






                    </ul>
                </div>
                <div class="clearfix"></div>
                <ul class='jcarousel-control jcarousel-control-3'>
                    <li><a href="#" class="jcarousel-control-prev"></a></li>
                    <li><a href="#" class="jcarousel-control-next"></a></li>
                </ul>
            </div>

            <div class="clearfix"></div>
            <div class="row detail-label-title p-ex">
                <div class="col-lg-3 left">
                    <div class="d-l-se"></div>
                </div>
                <div class="col-lg-6"><span>Thương hiệu cùng loại sản phẩm</span></div>
                <div class="col-lg-3 right">
                    <div class="d-l-se"></div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="jcarousel jcarousel-5">
                    <ul>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br1.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br2.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br1.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br2.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br1.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br2.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br1.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br2.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br1.jpg" alt="" /></a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#"><img class='img-responsive' src="<?php echo DEFAULT_IMAGE_PATH; ?>/br2.jpg" alt="" /></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <ul class='jcarousel-control jcarousel-control-5'>
                    <li><a href="#" class="jcarousel-control-prev"></a></li>
                    <li><a href="#" class="jcarousel-control-next"></a></li>
                </ul>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript" src="<?php echo DEFAULT_JS_PATH; ?>/jcarousel.responsive3.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_JS_PATH; ?>/jcarousel.responsive5.js"></script>