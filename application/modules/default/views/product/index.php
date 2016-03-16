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
                    <?php
                    foreach ($categories as $c) {
                        ?>
                        <li class="<?php echo  isset($category) && $c['category_id'] == $category['category_id'] ? 'active' : '' ?>">
                            <a href="<?php short_url('productcat-item', array($c['alias_name'])) ?>"><?php echo $c['category_title'] ?></a>
                        </li>
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

            <div class="content-right-top">
                <div class='hidden-xs pull-left'><?php echo $this->lang->line('page');?> <?php echo $current_page?> <?php echo $this->lang->line('of');?> <?php echo $pages?> <strong>(<?php echo $count?> <?php echo $this->lang->line('product');?>)</strong></div>
                <div class="visible-xs pull-left"><?php echo $current_page?>/<?php echo $pages?></div>
                <div class="pull-right show-product">
                    <div class="hidden-xs show"><?php echo $this->lang->line('show');?></div>

                    <div class="squard">
                        <label class='range-choosen'>12</label>

                        <div class="down"></div>
                        <ul class='range'>
                            <li>12</li>
                            <li>13</li>
                        </ul>
                    </div>
                    <div class="hidden-xs"><?php echo $this->lang->line('product');?> / <?php echo $this->lang->line('page');?></div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="content-right-center product">

                <?php
                foreach ($posts as $ps) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p">
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